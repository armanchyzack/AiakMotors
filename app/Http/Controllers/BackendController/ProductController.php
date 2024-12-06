<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Car;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    function singleImage($request){
        $exten = $request->thumbnail_image->extension();
        $name =  'Car-' . Str::slug($request->name). uniqid(). '.'.$exten;
        $path = $request->thumbnail_image->storeAs('CarImage', $name , 'public');
        $url = config('app.url') . '/storage/' . $path;
        return [
        'image' => $name,
        'image_url' =>$url
        ];
    }

    function imagedelete($cars){
        $path = 'CarImage/' . $cars->image;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        return true;
    }
    function dataStore($request, $cars , $imagestore= null){
        $cars->category_id = $request->parent_category;
        $cars->name = $request->name;
        $cars->slug = $request->slug;
        $cars->price = $request->price;
        $cars->discount_price = $request->discount_price;
        $cars->start_date = $request->discount_price_start_date;
        $cars->end_date = $request->discount_price_end_date;
        $cars->description = $request->desc;
        if($request->hasFile('thumbnail_image')){

            $cars->image = $imagestore['image'];
            $cars->image_url = $imagestore['image_url'];
        }
        $cars->save();

        if($request->hasFile('car_images')){

            $this->multipleImage($request, $cars);
        }
    }

    function multipleImage($request,$cars){
        foreach($request->car_images as $image){
            $exten = $image->extension();
            $name =  'Car-'.  Str::slug($request->name) . uniqid(). '.'.$exten;
            $path = $image->storeAs('CarImage', $name , 'public');
            $url = config('app.url') . '/storage/' . $path;

            $images = new Image();
            $images->car_id = $cars->id;
            $images->image = $name;
            $images->image_url = $url;
            $images->save();

        }
    }


    function view(){
        $categories = Category::select('id','title')->get();
        return view('Backend.Product.add', compact('categories'));
    }


    function insert(Request $request){
    //? product validation
        $request->validate([
            'name' => 'required|unique:cars,name',
            'slug' => 'string|unique:cars,slug',
            'parent_category' => 'required',
            'desc' => 'required',
            'status' => 'required',
            'price' => 'required',
            'thumbnail_image' => 'required|mimes:png,jpg',
        ]);
    //? product store
    //?single image store

        $imagestore = $this->singleImage($request);
        $cars = new Car();
        $this->dataStore($request,$cars,$imagestore);
        if($request->hasFile('car_images')){
            $this->multipleImage($request,$cars);
        }

        return redirect()->route('product.all')->with('success', 'Car Product Add Successfully');


    }

    function allProduct(){
        $cars = Car::select('id' , 'name' , 'image_url' , 'category_id','price', 'status')->simplePaginate(15);

        return view('Backend.Product.all' , compact('cars'));
    }

    function editProduct(Car $cars){
        $images = Image::get();
        $categories = Category::select('id','title')->get();
        return view('Backend.Product.edit', compact('cars', 'categories', 'images'));
    }

    function updateProduct(Request $request, Car $cars){



        if ($request->hasFile('thumbnail_image')) {
            $imgdelete = $this->imagedelete($cars);

            if($imgdelete){
                $imagestore = $this->singleImage($request);
                $this->dataStore($request,$cars,$imagestore);
            }
        } else {
            // data store
            $this->dataStore($request,$cars);
        }

        return back();
    }





    function GallarydeleteImage(Image $images){
        $path = 'CarImage/' . $images->image;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        $images->delete();
        return redirect()->back()->with('deletesuccess', 'Product image delete Successfully');

    }





    function statusUpdate(Car $cars){
        if($cars->status == 0){
            $cars->update([
                'status' => $cars->status = 1,
            ]);
        }else{
            $cars->update([
                'status' => $cars->status = 0,
            ]);
        }

        return back()->with('success', 'you status update successfully');
    }


    function deleteCar(Car $cars, Image $images){

        $isDelete = $this->imageDelete($cars);
        $path = 'CarImage/' . $images->image;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        $images->delete();
        if($isDelete){
            $cars->delete();
        }
        return redirect()->route('product.all')->with('deletesuccess', 'Category delete Successfully');
    }
}

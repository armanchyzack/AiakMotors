<?php

namespace App\Http\Controllers\BackendController;

use App\Models\Image;
use App\Models\Category;
use App\Models\Accessory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Accessoryimage;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{



    function singleImage($request){
        $exten = $request->thumbnail_image->extension();
        $name =  'AsseccoryImage-' . Str::slug($request->name). uniqid(). '.'.$exten;
        $path = $request->thumbnail_image->storeAs('AsseccoryImage', $name , 'public');
        $url = config('app.url') . '/storage/' . $path;
        return [
        'image' => $name,
        'image_url' =>$url
        ];
    }

    function imagedelete($accessories){
        $path = 'AsseccoryImage/' . $accessories->image;
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        return true;
    }
    function dataStore($request, $accessories , $imagestore= null){
        $accessories->category_id = $request->parent_category;
        $accessories->name = $request->name;
        $accessories->slug = $request->slug;
        $accessories->price = $request->price;
        $accessories->discount_price = $request->discount_price;
        $accessories->start_date = $request->discount_price_start_date;
        $accessories->end_date = $request->discount_price_end_date;
        $accessories->description = $request->desc;
        if($request->hasFile('thumbnail_image')){

            $accessories->image = $imagestore['image'];
            $accessories->image_url = $imagestore['image_url'];
        }
        $accessories->save();
    }






    function view(){
        $categories = Category::select('id','title')->get();
        return view('Backend.Accessory.add_accessory', compact('categories'));
    }

    function allAccessory(){
        $accessories = Accessory::select('id' , 'name' , 'image_url' , 'category_id','price', 'status')->simplePaginate(15);
        return view('Backend.Accessory.all_accessory', compact('accessories'));
    }

    function insert(Request $request){
        //? product validation
            $request->validate([
                'name' => 'required|unique:accessories,name',
                'slug' => 'string|unique:accessories,slug',
                'parent_category' => 'required',
                'desc' => 'required',
                'status' => 'required',
                'price' => 'required',
                'thumbnail_image' => 'required|mimes:png,jpg',
            ]);



        //? product store
    //?single image store

    $imagestore = $this->singleImage($request);
    $accessories = new Accessory();
    $this->dataStore($request,$accessories,$imagestore);
    return redirect()->route('accessory.all')->with('success', 'Accessory Product Add Successfully');
    }


    function statusUpdate(Accessory $accessories){
        if($accessories->status == 0){
            $accessories->update([
                'status' => $accessories->status = 1,
            ]);
        }else{
            $accessories->update([
                'status' => $accessories->status = 0,
            ]);
        }

        return back()->with('success', 'you status update successfully');
    }

    function editAccessory(Accessory $accessories){
        $categories = Category::select('id','title')->get();
        return view('Backend.Accessory.edit_accessory', compact('accessories', 'categories'));
    }

    function updateAccessory(Request $request, Accessory $accessories){



        if ($request->hasFile('thumbnail_image')) {
            $imgdelete = $this->imagedelete($accessories);

            if($imgdelete){
                $imagestore = $this->singleImage($request);
                $this->dataStore($request,$accessories,$imagestore);
            }
        } else {
            // data store
            $this->dataStore($request,$accessories);
        }

        return back();
    }

    function deleteAccessory(Accessory $accessories){
        $isDelete = $this->imageDelete($accessories);

        if($isDelete){
            $accessories->delete();
        }
        return redirect()->route('accessory.all')->with('deletesuccess', 'Category delete Successfully');
    }


}

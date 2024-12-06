<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Support\Str;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountCodeController extends Controller
{


    function view(){
        return view('Backend.Discount.add_discount_code');
    }



    function insert(Request $request){
        $request->validate([
        'name' => 'required|unique:discountcodes,name',
        'slug' => 'required|unique:discountcodes,slug',
        'percentage' => 'required|numeric|regex:/^\d{1,2}(\.\d{1,2})?$/|max_digits:2',
        ]);

        $discounts = new DiscountCode();
        $discounts->name = $request->name;
        $discounts->slug = Str::slug($request->slug);
        $discounts->percentage = $request->percentage;
        $discounts->status = $request->status;
        $discounts->save();

    }



    function allDiscountCode(){
        $discounts = DiscountCode::simplePaginate(10);
        return view('Backend.Discount.all_discount', compact('discounts'));
    }


    function statusUpdate(DiscountCode $discounts){

        if($discounts->status == 0){
            $discounts->update([
                'status' => $discounts->status = 1,
            ]);
        }else{
            $discounts->update([
                'status' => $discounts->status = 0,
            ]);
        }

        return back()->with('success', 'you status update successfully');

    }


    function editdiscountCode(DiscountCode $discounts){
        return view('Backend.Discount.edit_discount_code', compact('discounts'));
    }

    function updateDiscountCode(Request $request, DiscountCode $discounts){
        $request->validate([
            'name' => 'required|unique:discountcodes,name,' . $discounts->id,
            'slug' => 'required|unique:discountcodes,slug,'. $discounts->id,
            'percentage' => 'required|numeric|regex:/^\d{1,2}(\.\d{1,2})?$/|max:99,'. $discounts->id,
            ]);


        $discounts->name = $request->name;
        $discounts->slug = Str::slug($request->slug);
        $discounts->percentage = $request->percentage;
        $discounts->save();


        return back();


    }

    function deleteDiscountCode(DiscountCode $discounts){
        $discounts->delete();
        return redirect()->route('discount.code.all')->with('deletesuccess', 'Category delete Successfully');
    }

}

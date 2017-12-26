<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use Image;
use File;


class PartnerController extends Controller
{
    public function index(){

    }

    public function showregister(){
       return view('register_company');
    }

    public function register(Request $request){
    	if($request->hasFile('file'))
    	{
           
    	    $img = $request->file('file');
    	    $filename = time() . '_' . $img->getClientOriginalName();
    	    Image::make($img)->save( public_path('/img/partner/' . $filename) );

    	    $partner = new Partner;
    	    $partner->name = $request->name;
    	    $partner->description = $request->description;
    	    $partner->imgpath = $filename;
    	    $partner->save();

    	    return redirect()->back();
    	}
        
    	return redirect()->back();
    }

    public function showupdate($id){

    }

    public function update($id, Request $request){
    	if($request->hasFile('file'))
    	{
    	    $img = $request->file('file');
    	    $filename = time() . '_' . $img->getClientOriginalName();
    	    Image::make($img)->save( public_path('/img/partner/' . $filename) );

    	    $partner = new Partner;
    	    $partner->name = $request->name;
    	    $partner->description = $request->description;
    	    $partner->img = $filename;
    	    $partner->save();

    	    return redirect()->back()->with('success', 'Successfully updated partner');
    	}else{
    		$partner = new Partner;
    	    $partner->name = $request->name;
    	    $partner->description = $request->description;
    	    $partner->save();
    	    return redirect()->back()->with('success', 'Successfully updated partner');
    	}

    	return redirect()->back()->with('error', 'Failed to update partner');
    }

    public function delete($id){
    	$company = Guest::find($id);
    	$company->delete();
    	return redirect()->back()->with('success', 'Successfully deleted company');
    }
}

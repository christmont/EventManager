<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
use Image;
use File;
use App\Access;
use Auth;


class PartnerController extends Controller
{
    public function __construct(){
        $access = Access::where('job_id', Auth::user()->job_id)->where('module', 'Sponsor Module')->first();
        if($access->read == 0){
            return redirect()->back()->with('error', 'Please contact system administrator for read permision')
        }else if($access->write == 1){
            return view('sponsor_register');
        }
        $this->middleware('auth');
    }

    public function api(){
        $data = Partner::all();
        $access = Access::where('job_id', Auth::user()->job_id)->where('module', 'Partner Module')->first();
        return Datatables::of($data)
        ->editColumn('imgpath', function($data){
            return '
                  <img src="'. asset('img/partner/' . $data->imgpath) .'" style="height: 150px; width: 100%;">
            ';
        })
        ->addColumn('action', function($data) use ($access){
            $buttons = '';
            if($access->modify == 1){
                $buttons .= '
                    <a href="/partner/edit/'+ $data->id +'" class="btn btn-primary">Edit</a>
                    ';
            }else if($access->delete == 1){
                $buttons .= '
                <form action="/partner/delete/' . $data->id . '" method="post">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="'. csrf_token() . '">
                    <button type="submit" class="btn btn-danger"></button>
                </form>
                ';
            }
            return $buttons;
        })
        ->make(true);
    }


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

    	    return redirect()->back()->with('success','Register successful!');
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

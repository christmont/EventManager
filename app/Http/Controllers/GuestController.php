<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;
use App\Access;
use Auth;

class GuestController extends Controller
{
    public function __construct(){
        $access = Access::where('job_id', Auth::user()->job_id)->where('module', 'Guest Module')->first();
        if($access->read == 0){
            return redirect()->back()->with('error', 'Please contact system administrator for read permision');
        }else if($access->write == 1){
            return view('guest_register');
        }
        $this->middleware('auth');
    }

    public function api(){
        $data = Guest::all();
        $access = Access::where('job_id', Auth::user()->job_id)->where('module', 'Guest Module')->first();
        return Datatables::of($data)
        ->addColumn('action', function($data) use ($access){
            $buttons = '';
            if($access->modify == 1){
                $buttons .= '
                    <a href="/guest/edit/'+ $data->id +'" class="btn btn-primary">Edit</a>
                    ';
            }else if($access->delete == 1){
                $buttons .= '
                <form action="/guest/delete/' . $data->id . '" method="post">
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
        return view('register_guest');
    }

    public function register(Request $request){
    	$guest = new Guest;
    	$guest->lastname = $request->lastname;
        $guest->firstname = $request->firstname;
        $guest->gender = $request->gender;
        $guest->address = $request->address;
        $guest->email = $request->email;
        $guest->mobile = $request->mobile;
        $guest->department = $request->department;
        $guest->designation = $request->designation;
        $guest->company = $request->company;
        $guest->idcard = $request->idcard;
        $guest->save();
    	return redirect()->back()->with('success','Register successful!');
    }

    public function showupdate($id){
        
    }

    public function update($id, Request $request){
    	$guest = Guest::find($id);
    	$guest->lastname = $request->lastname;
    	$guest->firstname = $request->firstname;
        $guest->gender = $request->gender;
        $guest->address = $request->address;
        $guest->email = $request->email;
        $guest->mobile = $request->mobile;
        $guest->department = $request->department;
        $guest->designation = $request->designation;
        $guest->company = $request->company;
        $guest->idcard = $request->idcard;
    	
        $guest->save();
    	
    	return redirect()->back();
    }

    public function delete($id){
    	$guest = Guest::find($id);
    	$guest->delete();
    	return redirect()->back()->with('success', 'Successfully deleted guest');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guest;

class GuestController extends Controller
{
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
    	return redirect()->back();
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

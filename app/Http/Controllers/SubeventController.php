<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subevent;
use App\Event;
use File;
use Image;

class SubeventController extends Controller
{
    public function index(){

    }

    public function showregister(){
        $events = Event::all(['id', 'name', 'start', 'end']);
      return view('register_subevent')->withEvents($events);
    }

    public function register(Request $request){
    	if($request->hasFile('file'))
    	{
    	    $img = $request->file('file');
    	    $filename = time() . '_' . $img->getClientOriginalName();
    	    Image::make($img)->save( public_path('/img 3/subevent/' . $filename) );

    	    $subevent = new Subevent;
    	    $subevent->name = $request->name;
    	    $subevent->description = $request->description;
    	    $subevent->type = $request->type;
    	    $subevent->count = $request->count;
    	    $subevent->event_id = $request->event;
    	    $subevent->imgpath = $filename;

    	   $scheduleinput = explode(" - ", $request->schedule);
            $startinput = $scheduleinput[0];
            $endinput = $scheduleinput[1];

            $startinputsplit = explode(" ", $startinput);
            $startdate = $startinputsplit[0];
            $starttime = $startinputsplit[1] . ' ' . $startinputsplit[2];

            $startwrongdateformat = explode("/",$startdate);
            $vardaystart = $startwrongdateformat[0];
            $varmonthstart = $startwrongdateformat[1];
            $varyearstart = $startwrongdateformat[2];
            $startdatefinalformat = "$varyearstart-$vardaystart-$varmonthstart"; 
            $starttimefinalformat = date("H:i:s", strtotime($starttime));

            
            $endinputsplit = explode(" ",  $endinput);
            $enddate = $endinputsplit[0];
            $endtime = $endinputsplit[1] . ' ' . $endinputsplit[2];

            $endwrongdateformat = explode("/",$enddate);
            $vardayend = $endwrongdateformat[0];
            $varmonthend = $endwrongdateformat[1];
            $varyearend = $endwrongdateformat[2];
            $enddatefinalformat = "$varyearend-$vardayend-$varmonthend"; 
            $endtimefinalformat = date("H:i:s", strtotime($endtime));


            $subevent->start = $startdatefinalformat . ' ' . $starttimefinalformat;
            $subevent->end = $enddatefinalformat . ' ' . $endtimefinalformat;


    	    $subevent->save();

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
    		Image::make($img)->save( public_path('/img 3/subevent/' . $filename) );

    		$subevent = Subevent::find($id);
    		$subevent->name = $request->name;
    		$subevent->description = $request->description;
    		$subevent->type = $request->type;
    		$subevent->count = $request->count;
    		$subevent->event = $request->event;
    		$subevent->imgpath = $filename;

    		$scheduleinput = explode(" - ", $request->schedule);
    		
    		$subevent->start = array_shift($scheduleinput);
    		$subevent->end = implode(" - ", $scheduleinput);

    		$subevent->save();

    		return redirect()->back()->with('success', 'Successfully updated subevent');
    	}else{
    	    $subevent = Subevent::find($id);
    	    $subevent->name = $request->name;
    	    $subevent->description = $request->description;
    	    $subevent->type = $request->type;
    	    $subevent->count = $request->count;
    	    $subevent->event = $request->event;

    	    $scheduleinput = explode(" - ", $request->schedule);
    	    
    	    $subevent->start = array_shift($scheduleinput);
    	    $subevent->end = implode(" - ", $scheduleinput);

    	    $subevent->save();

    	    return redirect()->back()->with('success', 'Successfully updated subevent');
    	}

    	return redirect()->back()->with('success', 'Failed to update subevent');
    }

    public function delete($id){

    }
}

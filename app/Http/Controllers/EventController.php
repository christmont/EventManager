<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use File;
use Image;

class EventController extends Controller
{
    public function index(){

    }

    public function showregister(){
       return view('register_event');
    }

    public function register(Request $request){
        if($request->hasFile('file'))
        {
            $img = $request->file('file');
            $filename = time() . '_' . $img->getClientOriginalName();
            Image::make($img)->save( public_path('/img 2/event/' . $filename) );

            $event = new Event;
            $event->name = $request->name;
            $event->description = $request->description;
            $event->imgpath = $filename;


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


            $event->start = $startdatefinalformat . ' ' . $starttimefinalformat;
            $event->end = $enddatefinalformat . ' ' . $endtimefinalformat;

            $event->save();

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
            Image::make($img)->save( public_path('/img 2/event/' . $filename) );

            $event = Event::find($id);
            $event->name = $request->name;
            $event->description = $request->description;
            $event->imgpath = $filename;


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


            $event->start = $startdatefinalformat . ' ' . $starttimefinalformat;
            $event->end = $enddatefinalformat . ' ' . $endtimefinalformat;

            $event->save();

            return redirect()->back();
        }else{
            $event = Event::find($id);
            $event->name = $request->name;
            $event->description = $request->description;


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


            $event->start = $startdatefinalformat . ' ' . $starttimefinalformat;
            $event->end = $enddatefinalformat . ' ' . $endtimefinalformat;

            $event->save();

            return redirect()->back();
        }

        return redirect()->back()->with('success', 'Failed to update event');
    }

    public function delete($id){
        $event = Event::find($id);
        $event->delete();
        return redirect()->back()->with('success', 'Successfully deleted event');
    }
}

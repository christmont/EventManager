<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use File;
use Image;
use App\Access;
use Auth;



class EventController extends Controller
{
   // public function __construct(){
        //$access = Access::where('job_id', Auth::user()->job_id)->where('module', 'Event Module')->first();
       // if($access->read == 0){
       //     return redirect()->back()->with('error', 'Please contact system administrator for read permision');
      //  }else if($access->write == 1){
      //      return view('event_register');
      //  }
     //   $this->middleware('auth');
   // }

    public function api(){
        $data = Event::all();
        $access = Access::where('job_id', Auth::user()->job_id)->where('module', 'Partner Module')->first();
        return Datatables::of($data)
        ->editColumn('imgpath', function($data){
            return '
                  <img src="'. asset('img/event/' . $data->imgpath) .'" style="height: 150px; width: 100%;">
            ';
        })
        ->addColumn('action', function($data) use ($access){
            $buttons = '';
            if($access->modify == 1){
                $buttons .= '
                    <a href="/event/edit/'+ $data->id +'" class="btn btn-primary">Edit</a>
                    ';
            }else if($access->delete == 1){
                $buttons .= '
                <form action="/event/delete/' . $data->id . '" method="post">
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
       return view('register_event');
    }

    public function register(Request $request){
        if($request->hasFile('file'))
        {
            $img = $request->file('file');
            $filename = time() . '_' . $img->getClientOriginalName();
            Image::make($img)->save( public_path('/img/event/' . $filename) );

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

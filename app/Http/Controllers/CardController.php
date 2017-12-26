<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\User;
use App\Guest;
use App\Guestlog;

class CardController extends Controller
{
    public function checkrfid(Request $request){
    	$users = User::all();
    	$guests = Guest::all();
    	$type = 0;
    	$idcardinput = $request->idcard;

    	foreach ($users as $key => $user) {
    		if($user->idcard == $idcardinput){
    			$type = 1;
    		}
    	}

    	foreach ($guests as $key => $guest) {
    		if ($guest->idcard == $idcardinput) {
    			$type = 2;
    		}
    	}

    	switch ($type) {
    		case '1':
    			$myuser = User::where('idcard', $idcardinput)->first();
    			Auth::login($myuser);
    			return redirect()->to('/dashboard'); 
    			break;

    		case '2':
    			$myguest = Guest::where('idcard', $idcardinput)->first();
    			$name = $myguest->firstname . ' ' . $myguest->lastname;

                $guestlogs = Guestlog::where('guest_id', $myguest->id)->first();
                if (count($guestlogs) == 0) {
                    $guestlog = new Guestlog;
                    $guestlog->guest_id = $myguest->id;
                    $guestlog->time_in = date('Y-m-d H:i:s');
                    $guestlog->time_out = null;
                    $guestlog->save();
                    return view('welcomeguest')->withName($name);
                }else{
                    $guestlog = Guestlog::where('guest_id', $myguest->id)->first();
                    $guestlog->time_out = date('Y-m-d H:i:s');
                    $guestlog->save();
                    return view('goodbyeguest')->withName($name);
                }
    			break;
    		
    		default:
    			return "<h1>ERROR PAGE HERE</h1>";
    			break;
    	}

    }
}

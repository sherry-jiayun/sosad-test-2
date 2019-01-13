<?php

namespace App;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    public static function addFriend($userfrom, $userto){
    	$record = DB::table('friends')->where('user_from','=',$userfrom)->where('user_to','=', $userto)->get();
    	if ($record->count() == 0){
    		DB::table('friends')->insert([
    			'user_from' => $userfrom,
    			'user_to' => $userto,
    			'created_at' => now()
    		]);
    		return 1;
    	}else{
    		return 0;
    	}
    }

    public static function removeFriend($userfrom, $userto){
    	$record = DB::table('friends')->where('user_from','=',$userfrom)->where('user_to','=', $userto)->get();
    	if($record->count() == 0){
    		return 0; // record not exist;
    	}else{
    		# do the remove 
    		DB::table('friends')->where('user_from','=',$userfrom)->where('user_to','=',$userto)->delete();
    		return 1;
    	}
    }

    public static function getFriendList($userfrom){
    	$record = DB::table('friends') -> where('user_from','=', $userfrom)->get();
    	$friendsid = array();
    	foreach ($record as $r) {
    		# code...
    		$friendsid[$r->user_to] = 1;
    	}
    	return $friendsid;
    }
}

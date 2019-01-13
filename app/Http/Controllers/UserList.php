<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use App\Friends;

class UserList extends Controller
{
    //
    public function addfriend($userto){
    	$userfrom = \Auth::user()->id;
    	if ($userfrom == $userto){
    		echo "Cannot add yourself as a friend";
    		return $this->index();
    	}
    	$insertresult = Friends::addFriend($userfrom, $userto);
    	if ($insertresult == 0){
    		echo "record already exist";
    	}
    	return $this->index();
    }

    // 
    public function removefriend($userto){
    	$userfrom = \Auth::user()->id;
    	if ($userfrom == $userto){
    		echo "Cannot remove yourself";
    		return $this->index();
    	}
    	$removeresult = Friends::removeFriend($userfrom, $userto);
    	if ($removeresult == 0){
    		echo "record doesn't exist";
    	}
    	return $this->index();
    }
    //
    public function index()
    {
    	$currentid = \Auth::user()->id; // get current user's id 
    	$users = User::get_user_list($currentid); // get user list
    	$isfriendarr = array(); // the array pass to the page 
    	$friendsid = Friends::getFriendList($currentid); // get user's friend 
    	foreach ($users as $user) {
    		if (array_key_exists($user->id, $friendsid)){
    			$isfriendarr[$user->id] = 1;
    		}else{
    			$isfriendarr[$user->id] = 0;
    		}
    	}
    	
        return view('userlist', ['users' => $users, 'isfriend' => $isfriendarr]);
    }
}

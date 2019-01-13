<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    //
    public static function addPost($userid, $content){
    	DB::table('posts')->insert([
    		'userid' => $userid,
    		'content' => $content,
    		'vote' => 0,
    		'created_at' => now(),
    		'updated_at' => now()
    	]);
    }

    public static function removePost($postid){
    	$record = DB::table('posts')->where('id','=',$postid)->get();
    	if($record->count() == 0){
    		return 0; // record not exist;
    	}else{
    		# do the remove 
    		DB::table('posts')->where('id','=',$postid)->delete();
    		return 1;
    	}
    }

    public static function updatePost($postid, $content){
    	$record = DB::table('posts')->where('id','=',$postid)->get();
    	if($record->count() == 0){
    		return 0; // record not exist;
    	}else{
    		# do the remove 
    		DB::table('posts')->where('id','=',$postid)->update(['content'=>$content, 
    			'updated_at' => now()]);
    		return 1;
    	}

    }

    public static function voteup($postid){

    }

    public static function getuserpost($userid){

    	$posts = DB::table('posts')->where('userid','=',$userid) -> orderBy('created_at')->get();
    	return $posts;

    }
}

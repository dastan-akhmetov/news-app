<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
	public $timestamps = TRUE;
    //
    public function article()
    {
    	return $this->belongsTo('App\Author');
    }

    public function post($title, $body, $photo_url, $author_id)
    {
    	DB::table('articles')->insert(
		    [
		    'title' => $title, 
		    'body' => $body, 
		    'photo_url' => $photo_url, 
		    'author_id' => $author_id,
		    'created_at' => date("Y-m-d H:i:s")
		    ]
		);
    }

    public function get_news()
    {
    	//$news = DB::table('articles')->select()->get();

    	$news = DB::table('articles')
            ->leftJoin('users', 'users.id', '=', 'articles.author_id')
            ->get();


    	return $news;
    }
}

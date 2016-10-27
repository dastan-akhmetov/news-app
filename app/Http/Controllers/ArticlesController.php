<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{

    public function post(Request $request)
    {

    	$parameters = $request->all();

    	$image = $request->file('photo_url');

    	foreach($parameters as $key => $value) {

    		if ($key == 'author_id')
    			$author_id = (int) $value;

    		if ($key == 'title')
    			$title = filter_var($value, FILTER_SANITIZE_STRING);

    		if ($key == 'body')
    			$body = filter_var($value, FILTER_SANITIZE_STRING);

    	}

    	// Upload an image

        $image_renamed = hash('sha256', time() . $image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');

        $image->move($destinationPath, $image_renamed);

        $photo_url = 'images/' . $image_renamed;

        $article = new Article;

        $article->post($title, $body, $photo_url, $author_id);

        return back()->with('success','Image Upload successful');

    }

    public function get_news()
    {
    	$article = new Article;

    	$news = $article->get_news();

    	return view('articles/news', array('news' => $news));
    }
}

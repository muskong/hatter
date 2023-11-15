<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class TagController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function __invoke($tag='')
	{
		$obj = Tag::with('articles.tags')->firstWhere(['name' => $tag]);

		$articles = $obj->articles;
		$article = $articles[0];

		return view('welcome', [
			'tagName'=>$tag,
			'tags' => Tag::tags(),
			'keywords' => implode(",", array_column($article->tags->toArray(), 'name')),
			'articles' => $articles,
			'article' => $article,
		]);
	}

}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;

class WelcomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function __invoke($udid = '', $tag = '')
	{
		$all = Article::orderByDesc('created_at');
		if ($tag) {
			$all->whereHas('tags', function ($query) use ($tag) {
				$query->where('name', '=', $tag);
			});
		}
		$articles = $all->get(['udid', 'title']);
		if (!$udid) {
			$udid = $articles[0]->udid;
		}
		$article = Article::with('tags')->firstWhere(['udid' => $udid]);

		return view('welcome', [
			'tagName'=>$tag,
			'tags' => Tag::tags(),
			'keywords' => implode(",", array_column($article->tags->toArray(), 'name')),
			'articles' => $articles,
			'article' => $article,
		]);
	}
}

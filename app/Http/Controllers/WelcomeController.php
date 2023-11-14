<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function __invoke($udid = '')
	{
		$articles = Article::orderByDesc('updated_at')->get(['udid', 'title']);

		$cacheTagName = 'tags';
		$tags = Cache::get($cacheTagName);
		if (!$tags) {
			$tags = Tag::get(['id', 'name']);
			Cache::put($cacheTagName, $tags, 24 * 60 * 60);
		}

		if (!$udid) {
			$udid = $articles[0]->udid ?? '';
		}

		$article = Article::with('tags')->firstWhere(['udid' => $udid]);
		return view('welcome', [
			'articles' => $articles,
			'tags' => $tags,
			'article' => $article
		]);

	}

}

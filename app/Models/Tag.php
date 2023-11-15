<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Tag extends Model
{
	public $timestamps = false;
	protected $fillable = [
		"name"
	];

	public function articles()
	{
		return $this->belongsToMany(Article::class);
	}

	public static function tags(){
		$cacheTagName = 'tags';
		$tags = Cache::get($cacheTagName);
		if (!$tags) {
			$tags = Tag::get(['id', 'name']);
			Cache::put($cacheTagName, $tags, 24 * 60 * 60);
		}
		return $tags;
	}
}

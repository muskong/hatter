<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $timestamps = false;
	protected $fillable = [
		'udid',
		'title',
		'body',
	];

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
}

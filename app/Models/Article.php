<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	public $timestamps = false;

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
}

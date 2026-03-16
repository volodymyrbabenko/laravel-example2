<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
	
class Genres extends Model
{
    /** @use HasFactory<\Database\Factories\GenresFactory> */
    use HasFactory;
	use SoftDeletes;

	public function goods() {
		return $this->hasMany(Goods::class);
	}
}

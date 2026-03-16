<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    /** @use HasFactory<\Database\Factories\GoodsFactory> */
    use HasFactory;
	use SoftDeletes;

	public function genre() {
		return $this->belongsTo(Genres::class);
	}

	public function cart() {
		return $this->belongsTo(Cart::class);
	}
}

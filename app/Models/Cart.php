<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;


class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

	public function good() {
		// return $this->hasMany(Goods::class); //так было раньше, чат написал, что это неправильно, https://chatgpt.com/c/683f0f51-2a74-8009-8db4-e63d5e658d36
		return $this->belongsTo(Goods::class, 'good_id');
	}
}

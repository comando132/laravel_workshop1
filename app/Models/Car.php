<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'year', 'model', 'price', 'user_id', 'brand_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function scopeFilter($query, $request) {
        if ($request['mycar'] ?? false) {
            $query->where('user_id', '=', auth()->user()->id);
        }
    }
}

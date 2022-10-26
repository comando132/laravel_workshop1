<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class Car extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public static function countBrand() {
        return Car::select('brands.name', DB::raw('count(*) as total'))
            ->join('brands', 'cars.brand_id', '=', 'brands.id')
            ->groupBy('brands.name')
            ->orderBy('total', 'desc')
            ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{

    protected $fillable =['name', 'pricce', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 's lug';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($product) {
            $product->slug=Str::slug($product->name);
        });
}
}
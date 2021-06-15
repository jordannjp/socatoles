<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
  protected $fillable =['name'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

     public function getRouteKeyName()
    {
        return "slug";
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function($category) {
            $category->slug=Str::slug($category->name);
        });
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock', 'category_id', 'path_image'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->whereBetween('status',[1,9]);
    }

    public function transactions_onprogress()
    {
        return $this->transactions()->where('status','!=','0');
    }
}

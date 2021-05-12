<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['full_name', 'no_telpon', 'email', 'alamat', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costume extends Model
{
    use HasFactory;

    protected $primaryKey = 'costume_id';

    protected $fillable = [
        'name',
        'character',
        'size',
        'stock',
        'price',
        'description',
        'image',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'costume_id');
    }
}
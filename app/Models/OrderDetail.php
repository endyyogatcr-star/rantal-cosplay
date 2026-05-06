<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_id';

    protected $fillable = [
        'order_id',
        'costume_id',
        'start_date',
        'end_date',
        'total_price',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function costume()
    {
        return $this->belongsTo(Costume::class, 'costume_id');
    }
}
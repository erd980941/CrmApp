<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesOpportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'title', 'description', 'value', 'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

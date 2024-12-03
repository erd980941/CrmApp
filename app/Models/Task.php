<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        // 'customer_id', 
        'sales_opportunity_id', 
        'title', 
        'description', 
        'status', 
        'due_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function customer()
    // {
    //     return $this->belongsTo(Customer::class);
    // }

    public function salesOpportunity()
    {
        return $this->belongsTo(SalesOpportunity::class);
    }
}

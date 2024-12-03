<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company',
    ];

    public function salesOpportunities()
    {
        return $this->hasMany(SalesOpportunity::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function interactions()
    {
        return $this->hasMany(Interaction::class);
    }
}

<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];
}

<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class PlanProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];

    /**
     * plan_details
     *
     * @return void
     */
    public function plan_details()
    {
        return $this->belongsToMany(PlanDetail::class);
    }
}

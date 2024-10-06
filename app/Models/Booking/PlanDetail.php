<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class PlanDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'plan_id'];

    /**
     * plan_products
     *
     * @return void
     */
    public function plan_products()
    {
        return $this->belongsToMany(PlanProduct::class);
    }
}

<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class PlanDetailPlanProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['plan_detail_id', 'plan_product_id', 'quantity'];

    /**
     * plan_detail
     *
     * @return void
     */
    public function plan_detail()
    {
        return $this->belongsTo(PlanDetail::class);
    }

    /**
     * plan_product
     *
     * @return void
     */
    public function plan_product()
    {
        return $this->belongsTo(PlanProduct::class);
    }
}

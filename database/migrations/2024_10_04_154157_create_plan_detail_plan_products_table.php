<?php

use App\Models\Booking\PlanDetail;
use App\Models\Booking\PlanProduct;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_detail_plan_products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(PlanDetail::class)->constrained()->cascadeOnUpdate()->onDelete(null);
            $table->foreignIdFor(PlanProduct::class)->constrained()->cascadeOnUpdate()->onDelete(null);
            $table->integer('quantity')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_detail_plan_products');
    }
};

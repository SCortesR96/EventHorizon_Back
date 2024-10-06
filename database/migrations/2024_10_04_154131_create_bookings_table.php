<?php

use App\Models\Booking\BookingStatus;
use App\Models\Booking\Plan;
use App\Models\User;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->timestamp('start_at')->default(now());
            $table->timestamp('end_at')->default(now());
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->onDelete(null);
            $table->foreignIdFor(Plan::class)->constrained()->cascadeOnUpdate()->onDelete(null);
            $table->foreignIdFor(BookingStatus::class)->constrained()->cascadeOnUpdate()->onDelete(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

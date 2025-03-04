<?php

use App\Models\GymPackage;
use App\Models\Membership;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Membership::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(GymPackage::class)->constrained()->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_memberships');
    }
};

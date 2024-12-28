<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('transaction_id')->autoIncrement(); // Custom primary key
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount', 10, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->unsignedBigInteger('reference_id')->nullable(); // Nullable if not always applicable

            // Foreign key constraints
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

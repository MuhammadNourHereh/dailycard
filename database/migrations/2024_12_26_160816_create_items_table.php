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
        Schema::create('items', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->autoIncrement();
            $table->string('item_name', 255);
            $table->text('description');
            $table->decimal('item_price', 10, 2);
            $table->unsignedInteger('item_quantity');
            $table->boolean('item_availability')->default(true);
            $table->unsignedInteger('minimum_amount')->default(1);
            $table->boolean('check_player_name_avilability')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

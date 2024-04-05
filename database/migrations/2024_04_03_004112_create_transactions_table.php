<?php

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('card_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('transaction_type')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->bigInteger('recipient_rib')->nullable();
            $table->string('service_name')->nullable();
            $table->string('from_card')->nullable();
            $table->string('to_card')->nullable();
            $table->timestamps();
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

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
        Schema::create('receipt_mode', function (Blueprint $table) {
            $table->id();
            $table->integer('receipt_detail_id');
            $table->integer('mode');
            $table->integer('bank_name');
            $table->string('instrument_no');
            $table->string('instrument_date');
            $table->string('total_amount')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->string('created_ip')->nullable();
            $table->string('updated_ip')->nullable();
            $table->string('deleted_ip')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_mode');
    }
};

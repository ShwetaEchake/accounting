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
        Schema::create('mapping_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('voucher_template_entry_id')->constrained('voucher_template_entry');
            $table->integer('account_type');
            $table->integer('dr_cr');
            $table->integer('mode');
            $table->integer('account_head');
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
        Schema::dropIfExists('mapping_details');
    }
};

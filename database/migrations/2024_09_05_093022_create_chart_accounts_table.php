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
        Schema::create('chart_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('component_id')->constrained('component_names');
            $table->string('number_of_level');
            $table->string('level_one_description')->nullable();
            $table->string('digit_of_level_one')->nullable();
            $table->string('level_two_description')->nullable();
            $table->string('digit_of_level_two')->nullable();
            $table->boolean('default_flag')->nullable()->comment('0-false,1-true');
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
        Schema::dropIfExists('chart_accounts');
    }
};

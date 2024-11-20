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
        Schema::create('grant_details', function (Blueprint $table) {
            $table->id();
            $table->string('grant_type');
            $table->string('grant_name');
            $table->string('grant_date');
            $table->string('nature_of_the_grant');
            $table->string('grant_from_period');
            $table->string('grant_to_period');
            $table->string('sanction_number');
            $table->string('sanction_amount');
            $table->string('sanction_date');
            $table->string('sanctioning_authority');
            $table->string('received_amount');
            $table->string('fund');
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
        Schema::dropIfExists('grant_details');
    }
};

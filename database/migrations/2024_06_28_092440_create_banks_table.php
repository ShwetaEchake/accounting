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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('bank_branch');
            $table->string('ifsc_code');
            $table->string('micr_code')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('branch_address');
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->string('contact_details')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};

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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('department');
            $table->integer('child_department');
            $table->string('name');
            $table->string('regional');
            $table->string('short_code');
            $table->unsignedTinyInteger('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->string('checklist_verification_applicable');
            $table->string('challan_validity')->nullable();
            $table->string('checklist_approval_applicable')->nullable();
            $table->string('approval')->nullable();
            $table->string('rejection')->nullable();
            $table->string('printing_responsibility');
            $table->string('remark')->nullable();
            $table->enum('fee_schedule', ['free_service', 'chargeable']);
            $table->string('select_applicable_option')->nullable();
            $table->string('bpm_process');
            $table->string('sla')->nullable();
            $table->string('units')->nullable();
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
        Schema::dropIfExists('services');
    }
};

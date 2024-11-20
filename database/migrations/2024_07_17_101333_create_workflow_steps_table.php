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
        Schema::create('workflow_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workflow_id')->constrained('workflow');
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('organization_id')->constrained('organizations');
            $table->foreignId('department_id')->constrained('departments');
            $table->integer('role_id');
            $table->string('details');
            $table->string('sla')->nullable();
            $table->foreignId('unit_id')->constrained('units');
            $table->string('no_of_approvers');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->string('created_ip')->nullable();
            $table->string('updated_ip')->nullable();
            $table->string('deleted_ip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workflow_steps');
    }
};

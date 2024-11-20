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
        Schema::create('taxes', function (Blueprint $table) {
            $table->id();
            $table->string('tax_name');
            $table->string('department');
            $table->string('applicable_at');
            $table->string('calculation_method');
            $table->string('parent_tax_code');
            $table->string('tax_group');
            $table->string('tax_category');
            $table->string('tax_sub_category');
            $table->string('services');
            $table->string('print_on');
            $table->string('collection_sequence');
            $table->string('display_sequence');
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
        Schema::dropIfExists('taxes');
    }
};

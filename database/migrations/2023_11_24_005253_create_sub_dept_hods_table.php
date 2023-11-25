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
        Schema::create('sub_dept_hods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_dept_staff_id');
            $table->bigInteger('dept_id');
            $table->bigInteger('sub_dept_id');
            $table->bigInteger('admin_id');
            $table->bigInteger('admin_office_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_dept_hods');
    }
};

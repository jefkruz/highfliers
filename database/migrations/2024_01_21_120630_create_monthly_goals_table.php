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
        Schema::create('monthly_goals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id');
            $table->bigInteger('sub_department_id');
            $table->bigInteger('yearly_id');
            $table->bigInteger('staff_id')->nullable();
            $table->text('name');
            $table->text('achievement');
            $table->string('timeline')->nullable();
            $table->string('end_date')->nullable();
            $table->string('score')->nullable();
            $table->string('supervisor_score')->nullable();
            $table->string('hr_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_goals');
    }
};

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
        Schema::create('admin_offices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('admin_id');
            $table->string('company');
            $table->string('organization_id');
            $table->string('station_id');
            $table->string('department_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_offices');
    }
};

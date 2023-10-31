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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('role_id');
            $table->string('company');
            $table->bigInteger('organization_id')->nullable();
            $table->bigInteger('station_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('avatar')->nullable();
            $table->string('kc_token')->nullable();
            $table->string('status')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $a = new \App\Models\Admin();
        $a->name = 'Joseph Ugbeva';
        $a->username = 'jefkruz';
        $a->company = 'amdl';
        $a->phone = '2349034443250';
        $a->role_id = '1';
        $a->organization_id = '3';
        $a->email = 'josephugbeva@gmail.com';
        $a->kc_token = '436311de04ba831a1ec36a8d7dacb793';
        $a->status = 'verified';

        $a->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};

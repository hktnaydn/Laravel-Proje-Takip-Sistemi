<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role',['admin','ogrenci','ogretmen']);
            $table->string('password');
            $table->integer('ogrno')->unique()->nullable();
            $table->string('fakulte')->nullable();
            $table->string('bolum')->nullable();
            $table->string('sinif')->nullable();
            $table->integer('cepno')->unique()->nullable();
            $table->string('ppimage')->nullable();
            $table->string('ogretmenid')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};

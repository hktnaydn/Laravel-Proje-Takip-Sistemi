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
        Schema::create('raporlars', function (Blueprint $table) {
            $table->id();
            $table->string("projerapor");
            $table->integer("ogretmenid");
            $table->integer("ogrno");
            $table->integer("onerino");
            $table->integer("status")->default(0);
            $table->integer("yuklendistatus")->default(0);
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
        Schema::dropIfExists('raporlars');
    }
};

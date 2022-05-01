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
        Schema::create('projekonularıs', function (Blueprint $table) {
            $table->id();
            $table->string("projename")->unique();
            $table->longText("icerik");
            $table->longText("olanak");
            $table->integer("ogretmenid");
            $table->integer("ogrno");
            $table->integer("status")->default(0);
            $table->integer("tezstatus")->default(0);
            $table->string('tezraporu')->nullable();
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
        Schema::dropIfExists('projekonularıs');
    }
};

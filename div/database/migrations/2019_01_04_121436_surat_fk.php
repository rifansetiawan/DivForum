<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SuratFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat', function (Blueprint $table) {
            //
             $table->foreign("id_pengirim")->references("id_user")->on("users")->onUpdate("cascade")->onDelete("cascade");
              $table->foreign("id_penerima")->references("id_user")->on("users")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat', function (Blueprint $table) {
            //
        });
    }
}

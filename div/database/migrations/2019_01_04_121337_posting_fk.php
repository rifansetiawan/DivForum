<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PostingFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posting', function (Blueprint $table) {
            //
             $table->foreign("id_user")->references("id_user")->on("users")->onUpdate("cascade")->onDelete("cascade");
              $table->foreign("id_thread")->references("id_thread")->on("thread")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posting', function (Blueprint $table) {
            //
        });
    }
}

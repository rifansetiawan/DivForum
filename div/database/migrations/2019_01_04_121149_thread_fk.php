<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThreadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('thread', function (Blueprint $table) {
            //
            $table->foreign("id_user")->references("id_user")->on("users")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("id_kategori")->references("id_kategori")->on("kategori")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('thread', function (Blueprint $table) {
            //
        });
    }
}

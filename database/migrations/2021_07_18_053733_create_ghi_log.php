<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGhiLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ghi_log', function (Blueprint $table) {
            $table -> increments('id');
            $table -> string('ISP',100);
            $table -> string('IP_ISP',100);
            $table -> string('Device',100);
            $table -> string('Protocol',100);
            $table -> integer('Port');
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
        Schema::dropIfExists('ghi_log');
    }
}

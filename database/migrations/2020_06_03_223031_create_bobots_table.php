<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bobots', function (Blueprint $table) {
            $table->id();
            $table->float('jenisPekerjaan');
            $table->string('JenisBobotPekerjaan');
            $table->float('kondisiJalan');
            $table->string('JenisBobotKondisi');
            $table->float('umurJalan');
            $table->string('JenisBobotUmur');
            $table->float('luasKerusakan');
            $table->string('JenisBobotLuas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobots');
    }
}

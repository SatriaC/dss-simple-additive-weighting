<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jalan_id')->index()->nullable();
            $table->unsignedBigInteger('kriteria_id')->index()->nullable();
            $table->float('nilai_alt')->unsigned()->nullable();
            
            // $table->timestamps();
            $table->foreign('jalan_id')
            ->references('id')
            ->on('jalans')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('kriteria_id')
                ->references('id')
                ->on('kriterias')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}

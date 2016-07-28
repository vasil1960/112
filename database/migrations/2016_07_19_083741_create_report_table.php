<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('result')->nullable();
            $table->dateTime('onsignalplace_date')->nullable();

            $table->integer('signal_id')->index('signal_id')->unique()->unsigned();

            //signali za nezakonen:
            $table->boolean('s_dobiv')->default(0)->nullable();
            $table->boolean('s_transport')->default(0)->nullable();
            $table->boolean('s_store')->default(0)->nullable();
            $table->boolean('s_hunt')->default(0)->nullable();
            $table->boolean('s_fire')->default(0)->nullable();

            //konstatirani  narushenia
            $table->boolean('n_dobiv')->default(0)->nullable();
            $table->boolean('n_transport')->default(0)->nullable();
            $table->boolean('n_store')->default(0)->nullable();
            $table->boolean('n_hunt')->default(0)->nullable();
            $table->boolean('n_fire')->default(0)->nullable();

            //sustaveni actove
            $table->boolean('a_dobiv')->default(0)->nullable();
            $table->boolean('a_transport')->default(0)->nullable();
            $table->boolean('a_store')->default(0)->nullable();
            $table->boolean('a_hunt')->default(0)->nullable();
            $table->boolean('a_fire')->default(0)->nullable();

            $table->boolean('otcheten')->default(0)->nullable();

            $table->integer('slujitel_id')->default(0)->nullable();

            $table->boolean('proveren')->default(0)->nullable();

            $table->boolean('falshiv')->default(0)->nullable();


            $table->longText('note')->nullable();

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
        Schema::drop('reports');
    }
}

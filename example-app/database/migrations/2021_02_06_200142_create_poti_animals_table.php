<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotiAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table poti_animaux
         */
        Schema::create('poti_animals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->bigInteger('types_id')->unsigned();
            $table->foreign('types_id')
                ->references('id')
                ->on('poti_animaux_types')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poti_animaux');
    }
}

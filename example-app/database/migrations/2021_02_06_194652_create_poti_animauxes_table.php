<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotiAnimauxesTable extends Migration
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
        Schema::create('poti_animaux', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->foreign('type_id')
                ->references('id')
                ->on('poti_animaux_type')
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

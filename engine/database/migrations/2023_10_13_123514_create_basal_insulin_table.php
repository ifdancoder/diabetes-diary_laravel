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
        Schema::create('basal_insulin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('period');
            $table->unsignedBigInteger('user_id')->index('basal_insulin_user_id_foreign');
            $table->double('value', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basal_insulin');
    }
};

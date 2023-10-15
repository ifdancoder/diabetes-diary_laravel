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
        Schema::create('records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->index('records_user_id_foreign');
            $table->timestamp('datetime')->useCurrent();
            $table->decimal('basal_insulin', 5)->default(0);
            $table->decimal('long_chs', 3, 1)->default(0);
            $table->decimal('middle_chs', 3, 1)->default(0);
            $table->decimal('fast_chs', 3, 1)->default(0);
            $table->decimal('bolus_insulin', 3)->default(0);
            $table->decimal('physical_activity_time', 3, 1)->default(0);
            $table->integer('physical_activity_intensity')->default(0);
            $table->integer('stress_level')->default(0);
            $table->decimal('sleep_time', 3, 1)->default(0);
            $table->timestamp('time_since_cannula_change');
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
};

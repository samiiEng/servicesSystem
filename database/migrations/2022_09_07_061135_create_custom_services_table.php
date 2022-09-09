<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customServices', function (Blueprint $table) {
            $table->id('custom_service_id');
            $table->unsignedBigInteger('server_ref_id');
            $table->unsignedBigInteger('customer_ref_id');
            $table->string('details')->comment('If there is more details to add.');
            $table->string('cost');
            $table->string('installment_details');
            $table->boolean('is_used')->default(0);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customServices');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('client_name');
            $table->string('client_company');
            $table->text('client_address');
            $table->string('client_state');
            $table->string('client_gst');
            $table->string('client_mobile');
            $table->string('client_pincode');
            $table->string('client_email');
            $table->string('client_other_state');
            $table->string('client_country');
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
       Schema::dropIfExists('clients');
    }
}

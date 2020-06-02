<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Errormessage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('errormessage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('message');
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")
                ->references("id")
                ->on("users")
                ->onDelete('cascade');
            $table->timestamp("created_at");
            $table->timestamp("updated_at");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}

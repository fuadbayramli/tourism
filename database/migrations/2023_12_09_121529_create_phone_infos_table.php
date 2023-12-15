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
        Schema::create('phone_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('surname', 20);
            $table->string('phone', 15);
            $table->string('address', 50);
            $table->string('email', 50);
            $table->tinyText('notes');
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
        Schema::dropIfExists('phone_infos');
    }
};

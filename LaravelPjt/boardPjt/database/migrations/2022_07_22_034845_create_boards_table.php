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
        //p.160
        Schema::create('boards', function (Blueprint $table) {
            //PK값 + 오토인크리먼트도 같이 적용
            $table->id();
            //string : varchar
            $table->string('title', 30);
            $table->string('ctnt');
            $table->integer('hits');
            //created_at, updated_at이 자동으로 만들어짐
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
        Schema::dropIfExists('boards');
    }
};

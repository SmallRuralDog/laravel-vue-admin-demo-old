<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtkSuperCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtk_super_categories', function (Blueprint $table) {
            $table->id();
            $table->integer("cid")->nullable();
            $table->string("cname")->nullable();
            $table->string("cpic")->nullable();
            $table->integer("subcid")->nullable();
            $table->string("subcname")->nullable();
            $table->string("scpic")->nullable();
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
        Schema::dropIfExists('dtk_super_categories');
    }
}

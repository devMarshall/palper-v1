<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('name')->unique();
            $table->string('slogan')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('avatar')->default("http://res.cloudinary.com/devmarshall/image/upload/c_limit,h_100,w_150/v1526327003/default-avatar_brand_sh1gzz.png");
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
        Schema::dropIfExists('brands');
    }
}

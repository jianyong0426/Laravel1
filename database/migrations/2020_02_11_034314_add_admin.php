<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function (Blueprint $table){
            $table->boolean('is_admin')->default(false);
            $table->string('image_url')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
        }
        //
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('users',function (Blueprint $table){
        $table->dropColumn('is_admin');
        $table->dropColumn('gender');
        $table->dropColumn('city');
        $table->dropColumn('country');
        $table->dropColumn('postcode');
        $table->dropColumn('address');
        $table->dropColumn('phone');
        }
        //
    );
    }
}

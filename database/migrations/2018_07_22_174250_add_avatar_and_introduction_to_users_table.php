<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvatarAndIntroductionToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//    	Schema::table('users', function (Blueprint $table) {
//			$table->string('introduction')
//				->nullable()
//			    ->after('password')
//				->comment('个人简介');
//		    $table->string('avatar')
//			    ->nullable()
//			    ->after('password')
//			    ->comment('头像');
//	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        	$table->dropColumn('introduction');
        	$table->dropColumn('avatar');
        });
    }
}

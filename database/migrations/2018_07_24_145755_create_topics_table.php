<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
	        $table->increments('id')
		        ->comment('主键ID');
	        $table->string('title')
		        ->index('idx_title')
		        ->comment('标题');
	        $table->text('content')
		        ->comment('内容');
	        $table->integer('user_id')
		        ->index('idx_user_id')
		        ->comment('用户ID');
	        $table->integer('category_id')
		        ->index('idx_category_id')
		        ->comment('分类ID');
	        $table->integer('reply_count')
		        ->default(0)
		        ->comment('回复数量');
	        $table->integer('view_count')
		        ->default(0)
		        ->comment('查看数量');
	        $table->integer('last_reply_user_id')
		        ->comment('最后回复用户ID');
	        $table->integer('order')
		        ->default(0)
		        ->comment('排序');
	        $table->text('excerpt')
		        ->nullable()
		        ->comment('摘要');
	        $table->integer('slug')
		        ->nullable()
		        ->comment('SEO 友好的 URI');
	        $table->timestamp('created_at')
	            ->nullable()
		        ->comment('创建时间');
	        $table->timestamp('update_at')
		        ->nullable()
		        ->comment('修改时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}

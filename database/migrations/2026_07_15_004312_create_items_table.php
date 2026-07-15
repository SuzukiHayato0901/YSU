<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();                                       // 主キー
            $table->string('name');                             // 物品名
            $table->unsignedInteger('quantity')->default(0);    // 保管個数
            $table->string('tag')->nullable();                  // タグ
            $table->string('registered_email');                 // 登録者メールアドレス
            $table->timestamps();                               // created_at=初回登録日時, updated_at=最終更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}

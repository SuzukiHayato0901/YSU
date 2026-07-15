<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained()->cascadeOnDelete();     // 対象itemsレコード（items側が削除されたら履歴も連動削除）
            $table->string('action');                                           // 変更種別（登録／更新／削除）
            $table->unsignedInteger('quantity_before')->nullable();             // 変更前の個数
            $table->unsignedInteger('quantity_after')->nullable();              // 変更後の個数
            $table->string('changed_email');                                    // 変更した人のメールアドレス
            $table->timestamps();                                               // created_at=変更日時, updated_at=最終更新日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_logs');
    }
}

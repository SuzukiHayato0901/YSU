<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // 一括代入（mass assignment）を許可するカラム
    protected $fillable = [
        'name',             // 物品名
        'quantity',         // 保管個数
        'tag',              // タグ（カテゴリ）
        'registered_email', // 最終登録・更新者のメールアドレス
    ];
}

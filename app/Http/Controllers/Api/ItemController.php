<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;    // itemsテーブルに対応するモデル
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // 一覧取得・検索
    public function index(Request $request)
    {
        // itemsテーブルへのクエリの組み立て
        $query = Item::query();

        // keywordパラメータがあれば、物品名の部分一致で絞り込む
        if ($request->filled('keyword')) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // tagパラメータがあれば、タグの完全一致で絞り込む
        if ($request->filled('tag')) {
            $query->where('tag', $request->tag);
        }

        // 新しい順（更新日時が新しいもの順）で全件取得して返す
        return $query->orderByDesc('updated_at')->get();
    }
}

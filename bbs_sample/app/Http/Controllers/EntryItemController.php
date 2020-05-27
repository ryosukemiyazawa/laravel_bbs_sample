<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntryItemController extends Controller
{
	//一覧を表示する
    public function index() {

		//記事を全件とってきて、bbs_topを表示する
		$items = \App\EntryItem::all();

		// return view('bbs_top', [
		// 	"items" => $items
		// ]);

		return view('bbs_top2', [
			"items" => $items
		]);
	}

	//投稿を行う
	public function add(Request $request){
		
		//値を受け取る
		$entry = $request->get("Entry");
		$title = $entry["title"];
		$body = $entry["body"];
		
		//モデルを作成して保存する
		$item = new \App\EntryItem();
		$item->title = $title;
		$item->body = $body;
		$item->save();

		//完了画面にリダイレクトする
		return redirect('entryitem/complete');
	}

	public function complete(){
		return view('bbs_complete');
	}
}

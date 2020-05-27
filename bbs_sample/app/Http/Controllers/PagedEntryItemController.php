<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagedEntryItemController extends Controller
{
	//一覧を表示する
    public function index() {

		//記事を3件取得
		$items = \App\EntryItem::orderBy('created_at', 'desc')
			->paginate(3);

		return view('bbs_top_paged', [
			"items" => $items
		]);
	}

	
}

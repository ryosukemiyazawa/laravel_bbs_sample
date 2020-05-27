フォームの投稿
========================

## 参考URL

- Bladeテンプレートの書き方
	- https://qiita.com/sola-msr/items/a128f4e0900f3541690c

## 投稿用フォームの作成

- ``resources/views``以下に``part``ディレクトリを作成する
- ``resources/views/part/bbs_form.blade.php``を作成する

```
#resources/views/part/bbs_form.blade.php
<form method="post" action="{{ url('/entryitem/create') }}">
	{{ csrf_field() }}

	Title=<input type="text" name="Entry[title]" value="" />
	Body=<input type="text" name="Entry[body]" value="" />
	<input type="submit" value="投稿" />
</form>
```

action部分はヘルパー関数と呼ばれるurl関数を使います。自動的にURLを完成させてくれるので呼び出しパスなどを意識する必要はありません。

### 投稿用フォームの読み込み

トップページのテンプレートから@include命令を使ってbbs_formを読み込みます。

```
#resources/views/bbs_top.blade.php
@include('part.bbs_form')
```

変更後にトップページをブラウザで見て動作を確認してください。

### ルーティングの設定を追加する

routes/web.phpを編集してフォームの受け取り先を設定します。

```
Route::get('/', 'EntryItemController@index');
Route::post('/entryitem/create', 'EntryItemController@add'); // <- 追加
```

### Controllerを修正してフォームの値の受け取りを確認します。


```
class EntryItemController extends Controller
{
	//一覧を表示する
    public function index() {

		//記事を全件とってきて、bbs_topを表示する
		$items = \App\EntryItem::all();

		return view('bbs_top', [
			"items" => $items
		]);
	}

	//投稿を行う
	public function add(){
		var_dump($_POST);
		exit;
	}
}
```

ブラウザのフォームから送信して値が表示されることを確認します。


### add()メソッドを完成させます。

```
class EntryItemController extends Controller
{
	//一覧を表示する
    public function index() {

		//記事を全件とってきて、bbs_topを表示する
		$items = \App\EntryItem::all();

		return view('bbs_top', [
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
```

完了画面を表示するために```routes/web.php```に次を追加します。

```
Route::get('/entryitem/complete', 'EntryItemController@complete');
```

完了画面用のテンプレートファイルを作成します。

```
# resources/views/bbs_complete.blade.php
投稿しました

<a href="{{ url('/') }}">戻る</a>
```

投稿完了が出来ることを確認してください。
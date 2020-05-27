コントローラー
========================

## 参考URL

- Controllerの作成とViewの表示
	- https://qiita.com/yukibe/items/7bab0d596ae9a0930f18
- Viewへの変数の渡し方
	- https://qiita.com/pipiox/items/af3e2c765677d5db8b4c

## コントローラーの作成

以下のコマンドを実行してコントローラーを作成します

```
php artisan make:controller EntryItemController
```

```bbs_sample/app/Http/Controllers/EntryItemController.php```が作成されます。

ここに投稿一覧を表示するためのindex()関数を追加します。

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
}
```

ControllerからViewに変数を渡す方法はいくつかあります。（参考URLに記載）


## ルーティングの変更

``routes/web.php``を変更して、「/」にアクセスした時にEntryItemControllerが起動するように修正します。

```
Route::get('/', function () {
    return view('bbs_top');
});
↓
Route::get('/', 'HelloController@index');
```

ブラウザでリロードして確認します。


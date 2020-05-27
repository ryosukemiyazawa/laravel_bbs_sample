追加課題
========================

## 表示順を変更する

書き込んだものが下に来るのを上にする

```
$items = \App\EntryItem::all();
↓
$items = \App\EntryItem::orderBy('created_at', 'desc')->get();
```

## ページング

- 参考URL http://cly7796.net/wp/php/try-to-implement-pagination-in-laravel/


``PagedEntryItemController.php``をサンプルとして作成

取得部分をEloquentの機能を使ってページングを行います。

```
//記事を3件取得
$items = \App\EntryItem::orderBy('created_at', 'desc')
	->paginate(3);

return view('bbs_top_paged', [
	"items" => $items
]);
```
モデル
========================

## トップページを編集する

```routes/web.php```を編集する

```
return view('welcome');
```

```resouces/views/welcome.blade.php```がトップページにアクセスした時に表示されるファイルです。

## モデルを作る

```php artisan``というコマンドを使います。これらのコマンドはLaravelのプロジェクト内に移動してから実行します

書き込みを管理するための「EntryItem」を作成します。

```
cd bbs_sample
php artisan make:model EntryItem
```

``app/EntryItem.php``が作成されました。


## テーブルを作成する

```
php artisan make:migration EntryItem
-> Created Migration: 2020_05_27_074832_entry_item
```

※ マイグレーションファイルは実行時間などが入るのでファイル名はわかります。

``database/migrations/2020_05_27_074832_entry_item.php``を編集します。

テーブルの作成はup()メソッドに記載します。（down()メソッドにはテーブルの削除）

```
public function up()
{
	Schema::create('bbs_item', function (Blueprint $table) {
		$table->increments('id');
		$table->string('title');
		$table->string('body');
		$table->timestamps();
	});
}
```

マイグレーションを実行します。

```
php artisan migrate
```

エラーが出る（既に作成済など）場合はfreshで再作成します。

※ これを実行するとデータが全部消えるので注意

```
php artisan migrate:fresh
```

実行後にphpMyAdminでどんなテーブルが出来ているか確認しましょう。

## モデルとテーブルを関連付ける

app/EntryItem.phpを編集します。

```
class EntryItem extends Model
{
	
	protected $table = 'bbs_item';
}
```

## 全件表示する

- ``routes/web.php``を変更し、自分で作った``bbs_top.blade.php``を表示する

```
# routes/web.php
Route::get('/', function () {
	//return view('welcome');
    return view('bbs_top');
});
```

```
# resources/views/bbs_top.blade.php
<?php
$items = \App\EntryItem::all();
echo "COUNT=" . count($items);
echo "<ul>";
foreach($items as $item){
	echo "<li>";
	echo $item->title . "<br />" . $item->body;
	echo "</li>";
}
echo "</ul>";
```

エラーにならなければOK

## Appendix

Seederの作成

```
php artisan make:seeder EntryItemSeeder
```
database/seeds/EntryItemSeeder.phpが作成されます。

※ EntryItemSeederのコードは省略


seederの実行は下記です。

```
php artisan db:seed --class=EntryItemSeeder
```

``--class=``をつけなくでも良いようにするには``database/seeds/DatabaseSeeder.php``を編集する必要があります。

```
public function run()
{
	$this->call([
		EntryItemSeeder::class
	]);
}
```

実行ごとに２件レコードを作成します。




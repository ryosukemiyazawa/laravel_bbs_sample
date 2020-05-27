デザイン
========================

## 参考URL

- Bladeテンプレートの書き方
	- https://qiita.com/sola-msr/items/a128f4e0900f3541690c
- レイアウトを共通化する
	- https://nodoame.net/archives/10756
- ビューをレイアウトと個別ビューに分ける
	- https://qiita.com/sutara79/items/438dc5fbd56f4c1ac9dd

## レイアウト

Bladeテンプレートはレイアウト機能があります。

``resources/view/layout``ディレクトリを新規に作成し、commonレイアウトファイルを作成します。

- https://getbootstrap.com/docs/4.4/examples/album/ をベースにサンプルのレイアウトを作成します。

ポイント

- ``resources/view/layout/common.blade.php``から別のファイルを呼び出す時はviewsディレクトリからのパスを指定する

common.blade.phpとheader.blade.php

```
@include('layout.header')
```


## トップページのレイアウトをキレイにする

bbs_top.blade.phpをコピーしてbbs_top2.blade.phpを作成しました。

bootstrapのクラスを使ってレイアウトしています。
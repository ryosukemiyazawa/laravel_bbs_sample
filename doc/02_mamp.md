MAMPの設定
==================================

## 参考サイト

- https://qiita.com/PKunito/items/6a3bb187ca3c67de4519


## 基本

- Laravelアプリは基本的に「/」に入れて動かすことを前提としているが、ディレクトリを切ることも考える
- 開発環境と本番環境どちらも「/lbbs」で実行するとする

## シンボリックリンクを追加する

```
ln -s $(pwd)/bbs_sample/public /Applications/MAMP/htdocs/lbbs 
```

これで``http://localhost:8888/lbbs/``でLaravelのスターターページが表示されます

### Laravelの設定を変更

``bbs_sample/.env``を編集します。

```
APP_URL=http://localhost
↓
APP_URL=http://localhost:8888
```

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bbs_sample
DB_USERNAME=root
DB_PASSWORD=root
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
```

※ DB_SOCKETは元のファイルに存在しないので追加する
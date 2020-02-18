# Argon Dashboard Start Up Kit 

A repository for quickly building a website using [Argon Dashboard](https://github.com/creativetimofficial/argon-dashboard-laravel) templates.

## Clone and Install 

- Git clone from Repository

```bash 
# via SSH
$ git clone git@github.com:TanisukeGoro/laravel-argon-starter.git

# via HTTP
$ git clone https://github.com/TanisukeGoro/laravel-argon-starter.git

```

- The First Install Step

```bash
make first-install
```

## 注意点

- public/argonがないのでインストールする必要がある点に注意すること
  - これは `php artisan preset argon`を実行すると入る
- リンクの読み込みが`asset()`なのでSSL下で正常にソースが読み込めない場合がある。
`asset()`を`secure_asset()`に置き換えるといいかもしれない


### `php artisan preset argon`でargonのvendorがインストールできなかった場合

以前HerokuにArgon Dashboardを使ったWebアプリをデプロイした際にargonがインストールできなくて詰んでいた

その場合は自前で`public/`以下に`argon`のアセットを追加する必要があった。

単にローカルで`public/`に`argon`を追加してアップロードすれ良さそうだが、ファイルが巨大で`vendor`ファイルであることから`.gitignore`しているためあまりやりたくない。

そのため次の手法によってHeroku上に必要なファイルをインストール・展開した

1. 該当になる`argon`フォルダを`zip`化する
2. [transfer.sh](https://transfer.sh/)を使ってファイルをアップロード
    - curl --upload ./argon.zip https://transfer.sh/
    - アップロードが完了すると、ファイルが保存されているURLが表示されるので控える
3. HerokuのアプリにSSHログインする
4. `public`ディレクトリに移動して`2.`でアップロードしたファイルをダウロード・展開する
    - wget https://transfer.sh/3j4r0s/argon.zip みたいな感じ
    - unzip ./argon.zip　みたいな感じで展開する


結論として`public/argon`ができていればいいので他にも方法があればやればいい

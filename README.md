# Sales Email Automation

営業メールを自動化するための WebApp

以下ドキュメント(量が増えたらいつか Wiki に移す)  
他にも何かこうした方がいいと思ったら直して欲しい。

## Clone and Install

- Git clone from Repository

```bash
# via SSH
$ git clone git@github.com:TanisukeGoro/sales_email_automation.git

# via HTTP
$ git clone https://github.com/TanisukeGoro/sales_email_automation.git

```

## 🚀 The First Install Step

### 半 Docer dependent

```bash
# copy environment management file
cp dotenv.sample .env
# docker start-up ( option -d )
docker-compose -f docker-compose.noapp.yml up
# composer optimization
make composer-optimization
# composer install
composer install
# install argon and import preset
php artisan preset argon
# composer autoload dumping
composer dump-autoload
# add commit template
git config commit.template .commit_template
```

### completely docker dependent

```bash
# copy environment management file
cp dotenv.docker.sample .env
# docker start-up ( option -d )
docker-compose up
# composer optimization
make docker-composer-optimization
# composer install
docker-compose exec app composer install
# install argon and import preset
docker-compose exec app php artisan preset argon
# composer autoload dumping
docker-compose exec app composer dump-autoload
# add commit template
git config commit.template .commit_template
```

## 🚛 Start-up Container

```bash
# 半Docker
docker-compose -f docker-compose.noapp.yml up

# フルDocker
docker-compose up
```

## 🔧 Required Tools (特に半 docker)

- [ ] mysql
- [ ] php
- [ ] composer
- [ ] node

## プロジェクトの運用に関して

### Git の管理は基本的に`Gitflow`に従います。

- PR (Pull Request) は`develop`に
- ※ PR を投げる際に`Reviewers`を本人以外につけて欲しい
  - 批判とかが目的ではない
  - 課題感とか実装の内容とか把握しておきたいので(この辺共有ないと後々認識の乖離が生まれて辛くなる)
  - 阿部はすぐ対応できるように頑張るので気兼ねなく PR 投げて

ブランチの種類は以下のような感じでやってくれればいい  
(ぶっちゃけ`develop`と`master`に直 push しなければ適当でいい)

- develop : [develop]
  - 基本的な開発はここで行う。最新の develop から feature ブランチを切って開発を行うこと。
  - develop ブランチ上では直接データの修正・変更を行ってはならない。
- feature : [feature/#00_内容(スネークケース)]
  - 開発に関するブランチはこちら
- hotfix : [hotfix]
  - 緊急のバグ修正など
- release : [release]
  - リリース前の微細な調整を行うブランチ
- master : [master]
  - 本番環境にデプロイするためのブランチ

### タスク管理

タスクは渡くんの作ってくれたタスク管理表を元に`Zenhub`を使って`issue`の管理を行いたいと思う  
`Zenhub`を使うのは一目で`誰がどのタスクに着手しているのか`や`タスクの進捗状態`が分かりやすいため。

[Zenhub](https://chrome.google.com/webstore/detail/zenhub-for-github/ogcgkffhplmphkaahpmffcafajaocjbd)は Github でタスク管理をより楽にする Chrome 拡張機能  
↑ リンクから各自インストールしておくこと。

タスクは`Project > Epic > Issue`といった感じで管理されている。  
とりあえず、Project は`一次開発`としてその中に大枠のタスク(`Epic`)を設けて、タスクを実装ベースに区切ったのを`Issue`としている。

> 基本的に要求される機能って、`企業一覧を検索したり、サジェストする機能欲しい`とか結構ざっくりとしているので、そのまま`issue`にすると粒度が大きすぎて大変。  
> そこで`Epic`という大きなタスクを作り、その中に細かい粒度の`issue`を複数作成するとやりやすいと思う。  
> 慣れるまでよくわからんけど、正直半日、1 日使ってれば慣れるので頑張って。

- Zenhub はスクラムに合わせて作られているが、現状の体制では、完全にスクラムのルールに準拠するのは運用が難しく、かえって効率が悪い
- 略式の独自ルールを下記に定めた

#### ルール (ざっくり)

- Epic は気づいた人が、Issue・PR は各自が切る形とする
- 要件定義のタスクも Epic 化し、作業結果を Issue で紐づけとく
- 慣れない作業が多いと混乱するので Estimate は一旦使用しない。ただし、入れたい人は入れても良い

## 注意点

- public/argon がないのでインストールする必要がある点に注意すること
  - これは `php artisan preset argon`を実行すると入る
- リンクの読み込みが`asset()`なので SSL 下で正常にソースが読み込めない場合がある。
  `asset()`を`secure_asset()`に置き換えるといいかもしれない

### `php artisan preset argon`で argon の vendor がインストールできなかった場合

以前 Heroku に Argon Dashboard を使った Web アプリをデプロイした際に argon がインストールできなくて詰んでいた

その場合は自前で`public/`以下に`argon`のアセットを追加する必要があった。

単にローカルで`public/`に`argon`を追加してアップロードすれ良さそうだが、ファイルが巨大で`vendor`ファイルであることから`.gitignore`しているためあまりやりたくない。

そのため次の手法によって Heroku 上に必要なファイルをインストール・展開した

1. 該当になる`argon`フォルダを`zip`化する
2. [transfer.sh](https://transfer.sh/)を使ってファイルをアップロード
   - curl --upload ./argon.zip https://transfer.sh/
   - アップロードが完了すると、ファイルが保存されている URL が表示されるので控える
3. Heroku のアプリに SSH ログインする
4. `public`ディレクトリに移動して`2.`でアップロードしたファイルをダウロード・展開する
   - wget https://transfer.sh/3j4r0s/argon.zip みたいな感じ
   - unzip ./argon.zip 　みたいな感じで展開する

結論として`public/argon`ができていればいいので他にも方法があればやればいい

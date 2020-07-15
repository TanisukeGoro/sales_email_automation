# DB構築用のPythonプロジェクト

## 環境構築

ここではローカルの依存を減らすために、pipenvを用いたパッケージ管理を行います。

pipenvのインストール

```bash
brew install pipenv
```

```bash
cp dotenv.sample .env
pipenv install
pipenv shell # これをしないとちゃんと実行できないので要注意
```

インストールされたパッケージの一覧表示

```bash
pip list
```

パッケージのインストール

```bash
pipenv insatll [packege-name]
```

## Atomで使う際

AtomのHydrogenを使う場合は以下の設定が必要

```
pipenv run python -m ipykernel install --user --name python-playground
```
そんで起動する際に、設定した`name`でKernelを起動する

https://qiita.com/pillyshi/items/6febfde0ec3c3f5d64b2

TODO: flake8, autopep8の設定
TODO: CircleCIで回せるようにする
TODO: Dockerfileを修正

## IPアドレスの匿名化

著作権やサーバー負荷の問題でスクレイピングを規約上禁止しているサイトは多くある。  
特にその様なサイトにおいてはリクエスト制限など設けることで対策を講じていることが多い。  
そこでリクエスト制限から逃れスクレイピングを行う手法としてIPアドレスの匿名化があり、`Tor`を用いることで容易に実現することができる。


### Tor のインストール

Macユーザーであれば`brew`でインストールできる。  
また`brew services start`を用いてデーモンを起動することができる

```bash
brew install tor
brew services start tor
```

torを停止・再起動する場合は以下のコマンドを用いる

```bash
$ brew services stop tor
$ brew services reload tor
```




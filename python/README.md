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

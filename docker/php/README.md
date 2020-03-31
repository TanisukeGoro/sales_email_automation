## Dockerfileの解説

```dockerfile
FROM php:7.3-fpm-alpine
LABEL maintainer "okita_kamegoro"

ARG TZ
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -eux && \
  apk add --update-cache --no-cache --virtual=.build-dependencies tzdata \
  nodejs postgresql-client && \
  cp /usr/share/zoneinfo/${TZ} /etc/localtime && \
  apk del .build-dependencies && \
  docker-php-ext-install bcmath pdo pdo_pgsql && \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
  composer config -g repos.packagist composer https://packagist.jp && \
  composer global require hirak/prestissimo
```

### RUN set -eux

RUNを実行する際にシェルオプションを追加する

- -e オプションによって実行したコマンドが1つでもエラーになれば直ちに終了するようにし、
- -u オプションで未定義の変数などを使おうとすればエラーにするようにしている。
- -x オプションでは実行コマンドとその引数をトレースとして出力するようにしている。

これで処理が途中で失敗した場合に原因調査がしやすいようにする


### `\`で改行

Dockerは`RUN`を実行するたびにイメージのレイヤーを作成してしまう。  
したがって`\`で繋げてワンライナーにしたほうがいい。

```Dockerfile
# ex
RUN apk update && \
  apk add git
```

### `apk add --update-cache --no-cache`

lpine Linuxは3.3から`apk`で`--no-cache`というオプションが使える。  
従来は`--updateadd`でインストールした後にrm-rf/var/cache/apk/*で
不要なゴミファイルを削除していたようだが、いまや`--no-cache`でOK

### `apk add --virtual=hogehoge`

`--virtual`オプションを利用することで、インストールするパッケージ群に`alias`をつけることができ、`apk del <alias>`でパッケージ群を一括削除できる

### `docker-php-ext-install`

`docker-php-ext-xxx`はPHPの拡張機能をインストールするためのスクリプトである。これらはコンテナイメージに事前に圧縮されており、インストールが可能になっている。[公式リポジトリ内](https://github.com/docker-library/php/tree/master/7.3/stretch/apache)で用意されている。  
基本的に`docker-php-ext-install`を使うが、設定をカスタマイズする必要がある場合は`docker-php-ext-configure`で指定をして後からinstallを実行する必要がある。

[Dockerfileに書けるPHP Extensionsメモ](https://qiita.com/saken649/items/8597bfce389958feea81)
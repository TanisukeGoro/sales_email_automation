from sqlalchemy import *
from sqlalchemy.orm import *
from sqlalchemy.ext.declarative import declarative_base
from config import environment

# mysqlのDBの設定
DATABASE = '{}://{}:{}@{}:{}/{}'.format(
    environment.CONNECTION,
    environment.USERNAME,
    environment.PASSWORD,
    environment.HOST,
    environment.PORT,
    environment.DATABASE)

ENGINE = create_engine(
    DATABASE,
    encoding = "utf-8",
    echo=False
)
# Sessionの作成
session = scoped_session(
# ORM実行時の設定。自動コミットするか、自動反映するなど。
    sessionmaker(
        autocommit = False,
        autoflush = False,
        bind = ENGINE
    )
)

# modelで使用する
Base = declarative_base()
Base.query = session.query_property()

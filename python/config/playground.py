import sqlalchemy
import sqlalchemy.ext.declarative
import json
from config.database import Base
from config.database import ENGINE
Base = sqlalchemy.ext.declarative.declarative_base()
tables = { name: sqlalchemy.Table(name, Base.metadata, autoload=True, autoload_with=ENGINE)
        for name in ENGINE.table_names()
    }
# テーブルの定義を取得
# https://qiita.com/arc279/items/09aaf042d4a0e65cec91
globals().update(tables)

 'company_categories'
    : Table('company_categories', MetaData(bind=None),
        Column('id', BIGINT(), table=<company_categories>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113acb390>, for_update=False)),
        Column('name', VARCHAR(length=255), table=<company_categories>, nullable=False),
        Column('code', VARCHAR(length=255), table=<company_categories>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<company_categories>),
        Column('updated_at', TIMESTAMP(precision=0), table=<company_categories>), schema=None),
 'companies'
    : Table('companies', MetaData(bind=None),
        Column('id', BIGINT(), table=<companies>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x111314390>, for_update=False)),
        Column('name', VARCHAR(length=255), table=<companies>, nullable=False),
        Column('code', VARCHAR(length=255), table=<companies>),
        Column('listing_stock_id', INTEGER(), ForeignKey('listing_stocks.id'), table=<companies>, nullable=False),
        Column('company_category_id', BIGINT(), ForeignKey('company_categories.id'), table=<companies>),
        Column('address', VARCHAR(length=255), table=<companies>),
        Column('n_employees', INTEGER(), table=<companies>),
        Column('top_url', VARCHAR(length=255), table=<companies>),
        Column('form_url', VARCHAR(length=255), table=<companies>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<companies>),
        Column('updated_at', TIMESTAMP(precision=0), table=<companies>), schema=None),
 'templates'
    : Table('templates', MetaData(bind=None),
        Column('id', BIGINT(), table=<templates>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113ccd050>, for_update=False)),
        Column('user_id', BIGINT(), ForeignKey('users.id'), table=<templates>, nullable=False),
        Column('name', VARCHAR(length=255), table=<templates>, nullable=False),
        Column('email', VARCHAR(length=255), table=<templates>, nullable=False),
        Column('subject', VARCHAR(length=255), table=<templates>, nullable=False),
        Column('company', VARCHAR(length=255), table=<templates>, nullable=False),
        Column('department', VARCHAR(length=255), table=<templates>, nullable=False),
        Column('long_content', TEXT(), table=<templates>, nullable=False),
        Column('short_content', TEXT(), table=<templates>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<templates>),
        Column('updated_at', TIMESTAMP(precision=0), table=<templates>), schema=None),
 'sents'
    : Table('sents', MetaData(bind=None),
        Column('id', BIGINT(), table=<sents>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113b5ef50>, for_update=False)),
        Column('user_id', BIGINT(), ForeignKey('users.id'), table=<sents>, nullable=False),
        Column('count', INTEGER(), table=<sents>, nullable=False),
        Column('status', VARCHAR(length=255), table=<sents>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<sents>),
        Column('updated_at', TIMESTAMP(precision=0), table=<sents>), schema=None),
 'redirect_uris'
    : Table('redirect_uris', MetaData(bind=None),
        Column('id', BIGINT(), table=<redirect_uris>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x1145088d0>, for_update=False)),
        Column('user_id', BIGINT(), ForeignKey('users.id'), table=<redirect_uris>, nullable=False),
        Column('uri', VARCHAR(length=255), table=<redirect_uris>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<redirect_uris>),
        Column('updated_at', TIMESTAMP(precision=0), table=<redirect_uris>), schema=None),
 'search_conditions'
    : Table('search_conditions', MetaData(bind=None),
        Column('id', BIGINT(), table=<search_conditions>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x114517f50>, for_update=False)),
        Column('user_id', BIGINT(), ForeignKey('users.id'), table=<search_conditions>, nullable=False),
        Column('name', VARCHAR(length=255), table=<search_conditions>, nullable=False),
        Column('category', VARCHAR(length=255), table=<search_conditions>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<search_conditions>),
        Column('updated_at', TIMESTAMP(precision=0), table=<search_conditions>), schema=None),
 'listing_stocks'
    : Table('listing_stocks', MetaData(bind=None),
        Column('id', BIGINT(), table=<listing_stocks>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113b5ed10>, for_update=False)),
        Column('name', VARCHAR(length=255), table=<listing_stocks>, nullable=False),
        Column('code', VARCHAR(length=255), table=<listing_stocks>, nullable=False),
        Column('created_at', TIMESTAMP(precision=0), table=<listing_stocks>),
        Column('updated_at', TIMESTAMP(precision=0), table=<listing_stocks>), schema=None)
 }

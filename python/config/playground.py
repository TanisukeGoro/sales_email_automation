import sqlalchemy
import sqlalchemy.ext.declarative
import json
from config.database import Base
from config.database import ENGINE
Base = sqlalchemy.ext.declarative.declarative_base()
tables = { name: sqlalchemy.Table(name, Base.metadata, autoload=True, autoload_with=ENGINE)
        for name in ENGINE.table_names()
    }
tables
# テーブルの定義を取得
# https://qiita.com/arc279/items/09aaf042d4a0e65cec91
# globals().update(tables)
#
# {'company_large_categories':
#     Table('company_large_categories', MetaData(bind=None),
#         Column('id', BIGINT(), table=<company_large_categories>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x112fdcdd0>, for_update=False)),
#         Column('name', VARCHAR(length=255), table=<company_large_categories>, nullable=False),
#         Column('code', VARCHAR(length=255), table=<company_large_categories>, nullable=False), schema=None),
#  'users':
#     Table('users', MetaData(bind=None),
#         Column('id', BIGINT(), table=<users>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113005c90>, for_update=False)),
#         Column('name', VARCHAR(length=255), table=<users>, nullable=False),
#         Column('email', VARCHAR(length=255), table=<users>, nullable=False),
#         Column('email_verified_at', TIMESTAMP(precision=0), table=<users>),
#         Column('password', VARCHAR(length=255), table=<users>, nullable=False),
#         Column('company_name', VARCHAR(length=255), table=<users>),
#         Column('company_large_category_id', BIGINT(), ForeignKey('company_large_categories.id'), table=<users>),
#         Column('company_middle_category_id', BIGINT(), ForeignKey('company_middle_categories.id'), table=<users>),
#         Column('company_address', VARCHAR(length=255), table=<users>),
#         Column('n_employees', INTEGER(), table=<users>),
#         Column('hp_adress', VARCHAR(length=255), table=<users>),
#         Column('remember_token', VARCHAR(length=100), table=<users>),
#         Column('created_at', TIMESTAMP(precision=0), table=<users>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<users>), schema=None),
#  'company_middle_categories':
#     Table('company_middle_categories', MetaData(bind=None),
#         Column('id', BIGINT(), table=<company_middle_categories>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113015c10>, for_update=False)),
#         Column('name', VARCHAR(length=255), table=<company_middle_categories>, nullable=False),
#         Column('code', VARCHAR(length=255), table=<company_middle_categories>, nullable=False), schema=None),
#  'password_resets':
#     Table('password_resets', MetaData(bind=None),
#         Column('email', VARCHAR(length=255), table=<password_resets>, nullable=False),
#         Column('token', VARCHAR(length=255), table=<password_resets>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<password_resets>), schema=None),
#  'failed_jobs':
#     Table('failed_jobs', MetaData(bind=None),
#         Column('id', BIGINT(), table=<failed_jobs>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113026ad0>, for_update=False)),
#         Column('connection', TEXT(), table=<failed_jobs>, nullable=False),
#         Column('queue', TEXT(), table=<failed_jobs>, nullable=False),
#         Column('payload', TEXT(), table=<failed_jobs>, nullable=False),
#         Column('exception', TEXT(), table=<failed_jobs>, nullable=False),
#         Column('failed_at', TIMESTAMP(precision=0), table=<failed_jobs>, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113026c10>, for_update=False)), schema=None),
#  'companies':
#     Table('companies', MetaData(bind=None),
#         Column('id', BIGINT(), table=<companies>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113027c50>, for_update=False)),
#         Column('name', VARCHAR(length=255), table=<companies>, nullable=False),
#         Column('code', VARCHAR(length=255), table=<companies>),
#         Column('listing_stock_id', INTEGER(), ForeignKey('listing_stocks.id'), table=<companies>, nullable=False),
#         Column('company_large_category_id', BIGINT(), ForeignKey('company_large_categories.id'), table=<companies>),
#         Column('company_middle_category_id', BIGINT(), ForeignKey('company_middle_categories.id'), table=<companies>),
#         Column('address', VARCHAR(length=255), table=<companies>),
#         Column('n_employees', INTEGER(), table=<companies>),
#         Column('top_url', VARCHAR(length=255), table=<companies>),
#         Column('form_url', VARCHAR(length=255), table=<companies>, nullable=False),
#         Column('reference_site', VARCHAR(length=255), table=<companies>),
#         Column('reference_url', VARCHAR(length=255), table=<companies>),
#         Column('created_at', TIMESTAMP(precision=0), table=<companies>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<companies>), schema=None),
#  'templates':
#     Table('templates', MetaData(bind=None),
#         Column('id', BIGINT(), table=<templates>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x1130310d0>, for_update=False)),
#         Column('user_id', BIGINT(), ForeignKey('users.id'), table=<templates>, nullable=False),
#         Column('name', VARCHAR(length=255), table=<templates>, nullable=False),
#         Column('email', VARCHAR(length=255), table=<templates>, nullable=False),
#         Column('subject', VARCHAR(length=255), table=<templates>, nullable=False),
#         Column('company', VARCHAR(length=255), table=<templates>, nullable=False),
#         Column('department', VARCHAR(length=255), table=<templates>, nullable=False),
#         Column('long_content', TEXT(), table=<templates>, nullable=False),
#         Column('short_content', TEXT(), table=<templates>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<templates>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<templates>), schema=None),
#  'sents':
#     Table('sents', MetaData(bind=None),
#         Column('id', BIGINT(), table=<sents>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x11303b210>, for_update=False)),
#         Column('user_id', BIGINT(), ForeignKey('users.id'), table=<sents>, nullable=False),
#         Column('count', INTEGER(), table=<sents>, nullable=False),
#         Column('status', VARCHAR(length=255), table=<sents>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<sents>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<sents>), schema=None),
#  'redirect_uris':
#     Table('redirect_uris', MetaData(bind=None),
#         Column('id', BIGINT(), table=<redirect_uris>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x11303ed50>, for_update=False)),
#         Column('user_id', BIGINT(), ForeignKey('users.id'), table=<redirect_uris>, nullable=False),
#         Column('uri', VARCHAR(length=255), table=<redirect_uris>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<redirect_uris>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<redirect_uris>), schema=None),
#  'search_conditions':
#     Table('search_conditions', MetaData(bind=None),
#         Column('id', BIGINT(), table=<search_conditions>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113043a90>, for_update=False)),
#         Column('user_id', BIGINT(), ForeignKey('users.id'), table=<search_conditions>, nullable=False),
#         Column('name', VARCHAR(length=255), table=<search_conditions>, nullable=False),
#         Column('company_large_category_id', VARCHAR(length=255), table=<search_conditions>, nullable=False),
#         Column('company_middle_category_id', VARCHAR(length=255), table=<search_conditions>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<search_conditions>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<search_conditions>), schema=None),
#  'listing_stocks':
#     Table('listing_stocks', MetaData(bind=None),
#         Column('id', BIGINT(), table=<listing_stocks>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x11302bf50>, for_update=False)),
#         Column('name', VARCHAR(length=255), table=<listing_stocks>, nullable=False),
#         Column('code', VARCHAR(length=255), table=<listing_stocks>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<listing_stocks>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<listing_stocks>), schema=None),
#  'send_counts':
#     Table('send_counts', MetaData(bind=None),
#         Column('id', BIGINT(), table=<send_counts>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113045a10>, for_update=False)),
#         Column('user_id', BIGINT(), ForeignKey('users.id'), table=<send_counts>, nullable=False),
#         Column('count', INTEGER(), table=<send_counts>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<send_counts>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<send_counts>), schema=None),
#  'url_click_counts':
#     Table('url_click_counts', MetaData(bind=None),
#         Column('id', BIGINT(), table=<url_click_counts>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x11304efd0>, for_update=False)),
#         Column('user_id', BIGINT(), ForeignKey('users.id'), table=<url_click_counts>, nullable=False),
#         Column('count', INTEGER(), table=<url_click_counts>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<url_click_counts>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<url_click_counts>), schema=None),
#  'company_categories':
#     Table('company_categories', MetaData(bind=None),
#         Column('id', BIGINT(), table=<company_categories>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x11304df50>, for_update=False)),
#         Column('name', VARCHAR(length=255), table=<company_categories>, nullable=False),
#         Column('code', VARCHAR(length=255), table=<company_categories>, nullable=False),
#         Column('created_at', TIMESTAMP(precision=0), table=<company_categories>),
#         Column('updated_at', TIMESTAMP(precision=0), table=<company_categories>), schema=None),
#  'migrations':
#     Table('migrations', MetaData(bind=None),
#         Column('id', INTEGER(), table=<migrations>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x11304d3d0>, for_update=False)),
#         Column('migration', VARCHAR(length=255), table=<migrations>, nullable=False),
#         Column('batch', INTEGER(), table=<migrations>, nullable=False), schema=None)}

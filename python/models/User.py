import sys
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, BIGINT, INTEGER, VARCHAR, TIMESTAMP, ForeignKey
from sqlalchemy.orm import relationship
from config.database import Base
from config.database import ENGINE

class User(Base):
    """
    ユーザモデル
    """
    __tablename__ = 'users'
    id = Column('id', BIGINT, primary_key=True, nullable=False)
    name = Column('name', VARCHAR(length=255), nullable=False)
    email = Column('email', VARCHAR(length=255), nullable=False)
    email_verified_at = Column('email_verified_at', TIMESTAMP)
    password = Column('password', VARCHAR(length=255), nullable=False)
    company_name = Column('company_name', VARCHAR(length=255))
    company_large_category_id = Column('company_large_category_id', BIGINT, ForeignKey('company_large_categories.id'))
    company_middle_category_id = Column('company_middle_category_id', BIGINT, ForeignKey('company_middle_categories.id'))
    company_address = Column('company_address', VARCHAR(length=255))
    n_employees = Column('n_employees', INTEGER)
    hp_adress = Column('hp_adress', VARCHAR(length=255))
    remember_token = Column('remember_token', VARCHAR(length=100))
    created_at = Column('created_at', TIMESTAMP)
    updated_at = Column('updated_at', TIMESTAMP)

    company_large_category = relationship("CompanyLargeCategory")
    company_middle_category = relationship("CompanyMiddleCategory")

def main(args):
    Base.metadata.create_all(bind=ENGINE)

if __name__ == "__main__":
    main(sys.argv)

# Annotation
# 'users'
#    : Table('users', MetaData(bind=None),
#        Column('id', BIGINT(), table=<users>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113b4bbd0>, for_update=False)),
#        Column('name', VARCHAR(length=255), table=<users>, nullable=False),
#        Column('email', VARCHAR(length=255), table=<users>, nullable=False),
#        Column('email_verified_at', TIMESTAMP(precision=0), table=<users>),
#        Column('password', VARCHAR(length=255), table=<users>, nullable=False),
#        Column('company_name', VARCHAR(length=255), table=<users>),
#        Column('company_category_id', BIGINT(), ForeignKey('company_categories.id'), table=<users>),
#        Column('company_address', VARCHAR(length=255), table=<users>),
#        Column('n_employees', INTEGER(), table=<users>),
#        Column('hp_adress', VARCHAR(length=255), table=<users>),
#        Column('remember_token', VARCHAR(length=100), table=<users>),
#        Column('created_at', TIMESTAMP(precision=0), table=<users>),
#        Column('updated_at', TIMESTAMP(precision=0), table=<users>), schema=None),

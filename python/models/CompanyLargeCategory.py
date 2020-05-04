import sys
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, BIGINT, VARCHAR, TIMESTAMP
from config.database import Base
from config.database import ENGINE

class CompanyLargeCategory(Base):
    """
    業種大カテゴリ
    """
    __tablename__ = 'company_large_categories'
    id = Column('id', BIGINT, primary_key=True, nullable=False)
    name = Column('name', VARCHAR(length=255), nullable=False)
    code = Column('code', VARCHAR(length=255), nullable=False)


def main(args):
    Base.metadata.create_all(bind=ENGINE)

if __name__ == "__main__":
    main(sys.argv)

# Annotation
# 'company_categories'
#    : Table('company_categories', MetaData(bind=None),
#        Column('id', BIGINT(), table=<company_categories>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113acb390>, for_update=False)),
#        Column('name', VARCHAR(length=255), table=<company_categories>, nullable=False),
#        Column('code', VARCHAR(length=255), table=<company_categories>, nullable=False),
#        Column('created_at', TIMESTAMP(precision=0), table=<company_categories>),
#        Column('updated_at', TIMESTAMP(precision=0), table=<company_categories>), schema=None),

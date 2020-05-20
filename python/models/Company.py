import sys
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, BIGINT, INTEGER, VARCHAR, TIMESTAMP, ForeignKey
from sqlalchemy.orm import relationship
from config.database import Base
from config.database import ENGINE

class Company(Base):
    """
    企業情報モデル
    """
    __tablename__ = 'companies'
    id = Column('id', BIGINT, primary_key=True, nullable=False)
    name = Column('name', VARCHAR(length=255), nullable=False)
    code = Column('code', VARCHAR(length=255))
    listing_stock_id = Column('listing_stock_id', INTEGER(), ForeignKey('listing_stocks.id'), nullable=False)
    company_large_category_id = Column('company_large_category_id', BIGINT, ForeignKey('company_large_categories.id'))
    company_middle_category_id = Column('company_middle_category_id', BIGINT, ForeignKey('company_middle_categories.id'))
    address = Column('address', VARCHAR(length=255))
    n_employees = Column('n_employees', INTEGER)
    top_url = Column('top_url', VARCHAR(length=255))
    form_url = Column('form_url', VARCHAR(length=255), nullable=False)
    reference_site = Column('reference_site', VARCHAR(length=255), nullable=True)
    reference_url = Column('reference_url', VARCHAR(length=255), nullable=True)
    created_at = Column('created_at', TIMESTAMP)
    updated_at = Column('updated_at', TIMESTAMP)

    company_large_category = relationship("CompanyLargeCategory")
    company_middle_category = relationship("CompanyMiddleCategory")
    listing_stock = relationship("ListingStock")

def main(args):
    Base.metadata.create_all(bind=ENGINE)

if __name__ == "__main__":
    main(sys.argv)

# Annotation
# 'companies':
#    Table('companies', MetaData(bind=None),
#        Column('id', BIGINT(), table=<companies>, primary_key=True, nullable=False, server_default=DefaultClause(<sqlalchemy.sql.elements.TextClause object at 0x113027c50>, for_update=False)),
#        Column('name', VARCHAR(length=255), table=<companies>, nullable=False),
#        Column('code', VARCHAR(length=255), table=<companies>),
#        Column('listing_stock_id', INTEGER(), ForeignKey('listing_stocks.id'), table=<companies>, nullable=False),
#        Column('company_large_category_id', BIGINT(), ForeignKey('company_large_categories.id'), table=<companies>),
#        Column('company_middle_category_id', BIGINT(), ForeignKey('company_middle_categories.id'), table=<companies>),
#        Column('address', VARCHAR(length=255), table=<companies>),
#        Column('n_employees', INTEGER(), table=<companies>),
#        Column('top_url', VARCHAR(length=255), table=<companies>),
#        Column('form_url', VARCHAR(length=255), table=<companies>, nullable=False),
#        Column('reference_site', VARCHAR(length=255), table=<companies>),
#        Column('reference_url', VARCHAR(length=255), table=<companies>),
#        Column('created_at', TIMESTAMP(precision=0), table=<companies>),
#        Column('updated_at', TIMESTAMP(precision=0), table=<companies>), schema=None),

import sys
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, BIGINT, VARCHAR, TIMESTAMP
from sqlalchemy.orm import relationship
from config.database import Base
from config.database import ENGINE

class ListingStock(Base):
    """
    市場区分
    """
    __tablename__ = 'listing_stocks'
    id = Column('id', BIGINT, primary_key=True, nullable=False)
    name = Column('name', VARCHAR(length=225), nullable=False)
    code = Column('code', VARCHAR(length=225), nullable=False)

    companies = relationship("Company", backref="listing_companies")

def main(args):
    Base.metadata.create_all(bind=ENGINE)

if __name__ == '__main__':
    main(sys.args)

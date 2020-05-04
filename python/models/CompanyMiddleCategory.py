import sys
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, BIGINT, VARCHAR, TIMESTAMP
from config.database import Base
from config.database import ENGINE

class CompanyMiddleCategory(Base):
    """
    業種大カテゴリ
    """
    __tablename__ = 'company_middle_categories'
    id = Column('id', BIGINT, primary_key=True, nullable=False)
    name = Column('name', VARCHAR(length=255), nullable=False)
    code = Column('code', VARCHAR(length=255), nullable=False)


def main(args):
    Base.metadata.create_all(bind=ENGINE)

if __name__ == "__main__":
    main(sys.argv)

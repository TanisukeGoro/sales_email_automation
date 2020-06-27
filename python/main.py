from config.database import session
from models.User import *
from models.Company import *
from models.CompanyLargeCategory import *
from models.CompanyMiddleCategory import *
from models.ListingStock import *

# """
# User 一覧を表示する
# """
# user = User()
# users = session.query(User).all()
# for user in users:
#     print(user.name)

"""
Company 一覧を表示する
"""
company = Company()
companies = session.query(Company).all()
for company in companies:
    print(company.name) if company.name else print("名前なし")
    print(company.top_url) if company.top_url else print("urlなし")

#
# """
# Company 一覧を表示する
# """
# company_large_category = CompanyLargeCategory()
# company_large_categories = session.query(CompanyLargeCategory).all()
# for company_large_category in company_large_categories:
#     print(company_large_category.name)
#
# session.add(Company(name="ホゲホゲ", listing_stock_id=1, company_large_category_id=1, company_middle_category_id=1, address="rrerere"))
# session.commit()

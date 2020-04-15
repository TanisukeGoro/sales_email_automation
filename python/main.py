from config.database import session
from models.User import *
from models.Company import *
from models.CompanyCategory import *

user = User()
users = session.query(User).all()
for user in users:
    print(user.name)

company = Company()
companies = session.query(Company).all()
for company in companies:
    print(company.name)

company_category = CompanyCategory()
company_categories = session.query(CompanyCategory).all()
for company_category in company_categories:
    print(company_category.name)

import requests
import bs4
import re
from config.database import session
from models.User import *
from models.Company import *
from models.CompanyLargeCategory import *
from models.CompanyMiddleCategory import *
from models.ListingStock import *

def get_html_soup(url):
    res = requests.get(url)
    res.raise_for_status()
    res.encoding = res.apparent_encoding # 日本語文字化け対策 https://qiita.com/nittyan/items/d3f49a7699296a58605b
    return bs4.BeautifulSoup(res.text, "html.parser")

class bcolors:
    HEADER = '\033[95m'
    OKBLUE = '\033[94m'
    OKGREEN = '\033[92m'
    WARNING = '\033[93m'
    FAIL = '\033[91m'
    ENDC = '\033[0m'
    BOLD = '\033[1m'
    UNDERLINE = '\033[4m'

def main():
    company = Company()
    companies = session.query(Company).all()
    for company in companies:
        if company.top_url:
            url = company.top_url
            try:
                document = get_html_soup(url)
            except:
                print("request Error")
                pass
            contact = document.find('a', text="お問い合わせ")
            flag = True
            if not contact:
                contact = document.find('a', text=re.compile(".*contact.*", re.I)) # 大文字小文字区別なしで検索
                flag = False

            if contact:
                form_url = contact['href'].strip()
                company.form_url = form_url
                session.commit()
                print(company.name, company.top_url, form_url)if flag else print(f"{bcolors.OKBLUE}Contactと一致{bcolors.ENDC}", form_url)

            else:
                 print("リンク見つからない", contact)

if __name__ == '__main__':
    main()

#
# company = Company()
# companies = session.query(Company).all()
# print(companies[0].form_url)
# companies[0].form_url = "ホゲ"
# session.commit()

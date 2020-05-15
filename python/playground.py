##
#
# データベースとの接続と値の取得
#
##
from config.database import session
from models.User import *
from models.Company import *
from models.CompanyLargeCategory import *
from models.CompanyMiddleCategory import *

user = User()
users = session.query(User).all()
for user in users:
    print(user.name)

company = Company()
companies = session.query(Company).all()
for company in companies:
    print(company.name)

company_large_category = CompanyLargeCategory()
company_large_categories = session.query(CompanyLargeCategory).all()
for company_large_category in company_large_categories:
    print(company_large_category.name)

company_middle_category = CompanyMiddleCategory()
company_middle_categories = session.query(CompanyMiddleCategory).all()
for company_middle_category in company_middle_categories:
    print(company_middle_category.name)


##
#
# セレニウムの起動
#
##
# coding: UTF-8
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.chrome.options import Options

# ブラウザのオプションを格納する変数をもらってきます。
options = Options()
chromedriver = '/usr/local/bin/chromedriver'

# Headlessモードを有効にする（コメントアウトするとブラウザが実際に立ち上がります）
options.set_headless(True)
options.add_argument('--headless')
driver = webdriver.Chrome(options=options)

# ブラウザでアクセスする
driver.get("https://b2b-ch.infomart.co.jp/report/industry/middle.page?chim=01&chis=00")

# HTMLを文字コードをUTF-8に変換してから取得します。
html = driver.page_source.encode('utf-8')

# BeautifulSoupで扱えるようにパースします
soup = BeautifulSoup(html, "html.parser")
soup
# idがheikinの要素を表示
print soup.select_one("#heikin")time.sleep(5)
driver.quit()

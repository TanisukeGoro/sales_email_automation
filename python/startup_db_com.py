import requests
import bs4
import re, sys, os, math, time
# import socks, socket
from config.database import session
from models.User import *
from models.Company import *
from models.CompanyLargeCategory import *
from models.CompanyMiddleCategory import *
from models.ListingStock import *
from utils.startupDB.hundleHtml import handleStartupDBL

BASE_URL = "https://startup-db.com"

def get_html_soup(url):
    res = requests.get(url)
    res.raise_for_status()
    return bs4.BeautifulSoup(res.text, "html.parser")

def queryListingStockIdByCode(code):
    return session.query(ListingStock).filter(ListingStock.code==code).first().id

# サイトから抽出してcodeにした市場区分を対応するIDに変換するため
# listing_stock_ids.get(code) => idの番号になる
listing_stock_ids = {
    'fst-section': queryListingStockIdByCode('fst-section'),
    'snd-section': queryListingStockIdByCode('snd-section'),
    'mothers': queryListingStockIdByCode('mothers'),
    'jasdaq-standard': queryListingStockIdByCode('jasdaq-standard'),
    'jasdaq-growth': queryListingStockIdByCode('jasdaq-growth'),
    'other-stock': queryListingStockIdByCode('other-stock'),
    'unlisted': queryListingStockIdByCode('unlisted'),
    'unknown': queryListingStockIdByCode('unknown')
}


current_page = '/ja/companies?p=1'

while current_page :
    print('--------------------------\n', current_page)
    document = get_html_soup(BASE_URL + current_page)
    companies = document.select('h1.p-corporate__name>a')
    for company in companies:
        print('company => ', company['href'])
        company_document = get_html_soup(BASE_URL + company['href'])
        startup_db_companey= handleStartupDBL(company_document)
        print(startup_db_companey.name(), startup_db_companey.address())
        code = startup_db_companey.listing_stock()
        listing_stock_id = listing_stock_ids.get(code)
        print('市場区分 id, code => ', listing_stock_id, code)
        employees = startup_db_companey.employees()
        session.add(Company(
            name = startup_db_companey.name(), \
            code = "", \
            listing_stock_id = listing_stock_id, \
            address = startup_db_companey.address(), \
            top_url = startup_db_companey.homepage(), \
            minimum_employees = employees[0], \
            maximum_employees = employees[1], \
            reference_site = 'https://startup-db.com', \
            reference_url = BASE_URL + company['href'],
        ))

    session.commit()
    next_page = document.select_one('a.p-btn__next')['href'] if document.select_one('a.p-btn__next') else False
    current_page = next_page
    time.sleep(0.5)

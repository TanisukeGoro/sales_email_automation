import pandas as pd
import requests
import bs4
import re
import sys
import os
import math
import time
from utils.startupDB.hundleHtml import handleStartupDBL

BASE_URL = "https://startup-db.com"


def get_html_soup(url):
    res = requests.get(url)
    res.raise_for_status()
    return bs4.BeautifulSoup(res.text, "html.parser")

current_page = '/ja/companies?p=602'

while current_page :
    print('--------------------------\n', current_page)
    document = get_html_soup(BASE_URL + current_page)
    companies = document.select('h1.p-corporate__name>a')
    for company in companies:
        print('company => ', company['href'])
        company_document = get_html_soup(BASE_URL + company['href'])
        startup_db_companey= handleStartupDBL(company_document)
        print(startup_db_companey.name(), startup_db_companey.address())

    next_page = document.select_one('a.p-btn__next')['href'] if document.select_one('a.p-btn__next') else False
    current_page = next_page
    time.sleep(0.5)

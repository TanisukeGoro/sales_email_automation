import bs4


class handleStartupDBL:
    def __init__(self, document):
        self.document = document

    def name(self):
        _dom = self.document.select_one("h1.p-name")
        return _dom.text if _dom else ""

    def address(self):
        _dom = self.document.find("dt", text="住所")
        return _dom.parent.select_one("a").text if _dom.parent.select_one("a") else ""

    def establishment(self):
        _dom = self.document.find("dt", text="設立年月")
        return _dom.parent.select_one("dd").text if _dom else ""

    def category(self):
        _domc = self.document.select_one(".p-corporate__heading>category__item")
        return _dom.text if _dom else ''

    def ceo(self):
        pass

    def employees(self):
        pass

    def listing_stock(self):
        for table in self.document.find_all('table'):
            if table.find('th', text="株式市場"):
                _tr = table.select('tbody>tr')
                return self.listing_stock_to_id(_tr[ len(_tr) - 1 ].find_all('td')[1].text)

    def description(self):
        _dom = self.document.select_one("section.p-detail__body>p")
        return _dom.text if _dom else ""
    def code(self):
        pass

    def homepage(self):
        _dom =self.document.find("dt", text="企業ホームページ・SNS")
        return _dom.parent.select_one("a")["href"] if _dom.parent.select_one("a") else ""

    def listing_stock_to_id(self, name):
        stock_list = {
            '': 'unknown',
            '未上場': 'unlisted',
            '東証': 'fst-section',
            '東証1部': 'fst-section',
            '東証2部': 'snd-section',
            'マザーズ': 'mothers',
            '東証JASDAQ': 'jasdaq-standard',
            '東証JASDAQスタンダード': 'jasdaq-standard',
            '東証JASDAQグロース': 'jasdaq-growth',
            '名証セントレックス': 'other-stock',
            '福岡Q-Board': 'other-stock'
        }
        return stock_list.get(name, 'unknown')

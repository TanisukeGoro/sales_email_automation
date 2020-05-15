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
        pass

    def ceo(self):
        pass

    def employees(self):
        pass

    def listing_stock(self):
        pass

    def description(self):
        _dom = self.document.select_one("section.p-detail__body>p")
        return _dom.text if _dom else ""
    def code(self):
        pass

    def homepage(self):
        _dom =self.document.find("dt", text="企業ホームページ・SNS")
        return _dom.parent.select_one("a")["href"] if _dom.parent.select_one("a") else ""

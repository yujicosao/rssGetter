class Rsser:
    def __init__(self,url):
        self.url = url
    def getRss(self):
        rssurl = self.url.replace("https://ameblo.jp/","").strip("/")
        rssurl = "http://rssblog.ameba.jp/" + rssurl + "/rss20.xml"
        return rssurl
url = input('rssを取得したいブログのurlを入力してください。\n')

rss = Rsser(url)

print('rssは以下です')
print(rss.getRss())
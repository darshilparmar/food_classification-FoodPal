from selenium import webdriver
import time
import requests
from bs4 import BeautifulSoup


url = "http://www.caloriemama.ai/api"
driver = webdriver.Chrome('./chromedriver.exe')
driver.get(url)
html = driver.page_source.encode('utf-8')
page_num = 0


try:
    load_more = driver.find_element_by_css_selector('.fileUpload').click()
    driver.find_element_by_css_selector('input[type="file"]').clear()
    driver.find_element_by_css_selector('input[type="file"]').send_keys(r"G:\\Data Science\\Inshorts\\pizza.jpg")

except:
    pass
    
time.sleep(5)
html = driver.page_source.encode('utf-8')
soup = BeautifulSoup(html, 'lxml')
food_type = soup.find("div", {"class":"group-name"}).text
print(food_type)
first_item = soup.find("span", {"class": "item-name"}).text
print(first_item)
food_type = "pizza"
google_url = "https://www.google.com/search?q=pizza+nutrition+information"
source_code = requests.get(google_url) 
plain_text = source_code.text
soup = BeautifulSoup(plain_text,'html.parser')
value = soup.findAll('div',{'class':'xpdopen'})
print(value)

title = resultcontent.find(class_='food-item').find('span').text
print(resultcontent)





# f = open('google.txt','r')
# code = f.read()
# soup = BeautifulSoup(code, 'lxml')
# # food_type = soup.find("span", {"class":"V6Ytv"})
# food_type = soup.find('div', class_="LN9Pb")
# print(food_type)
# # f.write(str(soup))
# f.close()

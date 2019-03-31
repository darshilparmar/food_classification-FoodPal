from flask import Flask
from flask import request
import pandas as pd
from selenium import webdriver
import time
import requests
from bs4 import BeautifulSoup
from PIL import Image
from resizeimage import resizeimage
from test_network import predict_image

def resize_image(path):

    fd_img = open(path, 'r+b')
    img = Image.open(fd_img)
    img = resizeimage.resize('thumbnail', img, [300, 300])
    img.save("images/xyz.jpg", img.format)
    img.save(path, img.format)
    fd_img.close()


app = Flask(__name__)
@app.route('/image', methods=['GET'])
def index():
    img_path = request.args.get('img')
    resize_image(img_path)
    result = predict_image()
    return result


# @app.route('/getname', methods=['GET'])
# def get_name():
#     url = "http://www.caloriemama.ai/api"
#     driver = webdriver.Chrome('./chromedriver.exe')
#     driver.get(url)
#     html = driver.page_source.encode('utf-8')

#     try:
#         load_more = driver.find_element_by_css_selector('.fileUpload').click()
#         driver.find_element_by_css_selector('input[type="file"]').clear()
#         driver.find_element_by_css_selector('input[type="file"]').send_keys(r"C:\\xampp\\htdocs\\foodpal\\python\\images\\xyz.jpg")

#     except:
#         pass

#     time.sleep(5)
#     html = driver.page_source.encode('utf-8')
#     soup = BeautifulSoup(html, 'lxml')
#     food_type = soup.find("div", {"class":"group-name"}).text
#     first_item = soup.findAll("span", {"class": "item-name"})
#     for count, elem in enumerate(first_item):
#         if(count<3):
#             food_type = str(food_type) + ","+ str(elem)

    
    

    return food_type

if __name__  == "__main__":
    app.run(port=5000)
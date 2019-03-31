from PIL import Image

from resizeimage import resizeimage


with open('../upload/30-03-2019-1553931573.jpg', 'r+b') as f:
    with Image.open(f) as image:
        cover = resizeimage.resize_cover(image, [200, 100])
        cover.save('test-image-cover.jpeg', image.format)


fd_img = open('../upload/30-03-2019-1553931573.jpg', 'r+b')
img = Image.open(fd_img)
img = resizeimage.resize_width(img, 200)
img.save('test-image-width.jpeg', img.format)
fd_img.close()


from PIL import Image
from resizeimage import resizeimage

fd_img = open('../upload/30-03-2019-1553931573.jpg', 'r+b')
img = Image.open(fd_img)
img = resizeimage.resize('thumbnail', img, [300, 300])
img.save('test-image-thumbnail.jpeg', img.format)
fd_img.close()

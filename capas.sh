#!/bin/zsh

autoload -U zmv

wget -c http://acervo.coletaneasdentalpress.com.br/pdfs/1151.1.jpg
wget -c http://acervo.coletaneasdentalpress.com.br/pdfs/4211.1.jpg
wget -c http://acervo.coletaneasdentalpress.com.br/pdfs/7211.1.jpg
wget -c http://acervo.coletaneasdentalpress.com.br/pdfs/9021.1.jpg

mogrify -resize 400x516^ -gravity center -extent 400x516 *.jpg

zmv '(*).1.jpg' '$1.jpg'

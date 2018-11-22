#!/bin/bash



# Configure aqui o caminho para a pasta wp-content do WordPress
WP_CONTENT_FOLDER=~/devel/sample-wp-content




cd /tmp 

wget http://tainacan.org/nightly-builds/tainacan-interface-nightly.zip

unzip tainacan-interface-nightly.zip
rm tainacan-interface-nightly.zip

wget https://github.com/medialab-ufg/tainacan-museudoindio/archive/master.zip -O tainacan-museudoindio-master.zip

unzip tainacan-museudoindio-master.zip
rm tainacan-museudoindio-master.zip

cd $WP_CONTENT_FOLDER

rm -r themes/tainacan-interface/*

cp -R /tmp/tainacan-interface/* themes/tainacan-interface/

rm -r themes/tainacan-museudoindio/*

cp -R /tmp/tainacan-museudoindio-master/* themes/tainacan-museudoindio/

rm -r /tmp/tainacan-museudoindio-master
rm -r /tmp/tainacan-interface

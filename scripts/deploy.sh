if [ -d main ]
then
	cp main/*.php /var/www/gourdianknot/main
	cp main/*.png /var/www/gourdianknot/main
	cp main/*.txt /var/www/gourdianknot/main
	cp -r main/images /var/www/gourdianknot/main
	cp -r main/stylesheets /var/www/gourdianknot/main
	cp -r main/includes /var/www/gourdianknot/main
else
	echo "you must be in a directory that has 'main' to deploy from"
fi

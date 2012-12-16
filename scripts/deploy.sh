if [ -d main ]
then
	cp main/*.php /var/www/gourdianknot
	cp main/*.txt /var/www/gourdianknot
	cp -r main/images /var/www/gourdianknot
	cp -r main/stylesheets /var/www/gourdianknot
	cp -r main/includes /var/www/gourdianknot
else
	echo "you must be in a directory that has 'main' to deploy from"
fi

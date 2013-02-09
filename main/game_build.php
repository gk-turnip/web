<?php $pageTitle = 'Game To Do' ?>

<?php include "includes/header.php" ?>

<h1>Game Build Instructions</h1>
<p>
This is a technical document on building the game from source, preliminary draft and somewhat cryptic.  It assumes the game is being built on Linux, it should be possible to build it on other platforms, but I don't have instructions for them yet.
</p>
<p>System Requirements</p>
<ul>
<li>Apache 2 web server</li>
<li>Postgresql database</li>
<li>go version 1.0.3 with google websocket library</li>
</ul>
<br/>

<pre>
# first install some required pieces

sudo apt-get install postgresql
sudo apt-get install apache2

# download go from http://code.google.com/p/go/downloads/list
# pick go1.0.3-linux-amd64.tar.gz for 64 bit linux

# configure postgres,
# note there are two passwords
# one for postgres
# and one for gk

su - postgres
createuser --pwprompt gk
# it will prompt for the gk password
# make it a super user

createdb -O gk gk -E UTF8

psql postgres postgres
alter user postgres password 'POSTGRES_PASSWORD';
\q

cd /etc/postgresql/9.1/main
vi pg_hba.conf
# change "peer" to "md5" for local all and local postgres

/etc/init.d/postgresql restart

# exit postgres user
exit

# this should now work to get into the database:
psql gk gk
# supply the password
# \q to exit psql

# install go
cd /home/gk
tar xvf /home/gk/Downloads/go1.0.3.linux-amd64.tar.gz 

# add some environment variables for go
cd /home/gk
vi .bashrc
# add:
export GOROOT=/home/gk/go
export PATH=$PATH:$GOROOT/bin

# exit vi


# set GOROOT and PATH, won't be required on subsequent login to shell
export GOROOT=/home/gk/go
export PATH=$PATH:$GOROOT/bin

# test with:
go version
# it should say "go version go1.0.3"

# get a copy of the server code from github
cd /home/gk
git clone https://github.com/gk-turnip/server.git

cd /home/gk
vi .bashrc
# add some environment variables for building go code for gourdian knot:
export GOBASE=/home/gk/server/go
export GOPATH="/home/gk/server/go/gk:/home/gk/server/go/pq"

# exit vi

# set GOBASE and GOPATH, won't be required on subsequent logins
export GOBASE=/home/gk/server/go
export GOPATH="/home/gk/server/go/gk:/home/gk/server/go/pq"

# install the websocket libraries from google
go get code.google.com/p/go.net/websocket

# build the go code
# it should say that the tests passed
cd /home/gk/server/go
./build.sh

# the directory /home/gk/server/go/gk/bin should now hold gameServerMain and loginServerMain programs.

# create the tables:
psql gk gk
\i /home/gk/server/sql/001_update.sql
\q

# make the game server and login server directories
cd /home/gk
mkdir gameServer
mkdir gameServer/bin
mkdir gameServer/config
mkdir gameServer/logs
mkdir loginServer/bin
mkdir loginServer/config
mkdir loginServer/logs

# build the login server configuration file
cd /home/gk/loginServer/config
# make config.xml file:
&lt;?xml versino="1.0" encoding="utf-8"?&gt;
&lt;config&gt;
        &lt;port&gt;14001&lt;/port&gt;
        &lt;logDir&gt;/home/gk/loginServer/logs&lt;/logDir&gt;
        &lt;templateDir&gt;/home/gk/server/templates/login&lt;/templateDir&gt;
        &lt;loginWebAddressPrefix&gt;http://localhost:14001&lt;/loginWebAddressPrefix&gt;
        &lt;gameWebAddressPrefix&gt;http://localhost:14002&lt;/gameWebAddressPrefix&gt;
        &lt;databaseHost&gt;localhost&lt;/databaseHost&gt;
        &lt;databasePort&gt;5432&lt;/databasePort&gt;
        &lt;databaseUserName&gt;gk&lt;/databaseUserName&gt;
        &lt;databasePassword&gt;gk&lt;/databasePassword&gt;
        &lt;databaseDatabase&gt;PASSWORD&lt;/databaseDatabase&gt;
        &lt;serverFromEmail&gt;forum@localhost.com&lt;/serverFromEmail&gt;
        &lt;emailServer&gt;localhost:25&lt;/emailServer&gt;
&lt;/config&gt;

# startup the login server:
/home/gk/server/go/gk/bin/loginServerMain -config /home/gk/loginServer/config/config.xml

# while the login server is running, this should connect from the browser:
# http://localhost:14001/gk/loginServer

# build the game server configuration file
cd /home/gk/gameServer/config
# make config.xml file:
&lt;?xml versino="1.0" encoding="utf-8"?&gt;
&lt;config&gt;
        &lt;httpPort&gt;14002&lt;/httpPort&gt;
        &lt;websocketPort&gt;14003&lt;/websocketPort&gt;
        &lt;logDir&gt;/home/gk/gameServer/logs&lt;/logDir&gt;
        &lt;templateDir&gt;/home/gk/server/templates/game&lt;/templateDir&gt;
        &lt;svgDir&gt;/home/gk/assets/game/svg&lt;/svgDir&gt;
        &lt;webAddressPrefix&gt;http://localhost&lt;/webAddressPrefix&gt;
        &lt;websocketAddressPrefix&gt;ws://localhost:14003&lt;/websocketAddressPrefix&gt;
        &lt;databaseHost&gt;localhost&lt;/databaseHost&gt;
        &lt;databasePort&gt;5432&lt;/databasePort&gt;
        &lt;databaseUserName&gt;gk&lt;/databaseUserName&gt;
        &lt;databasePassword&gt;PASSWORD&lt;/databasePassword&gt;
        &lt;databaseDatabase&gt;gk&lt;/databaseDatabase&gt;
&lt;/config&gt;

# startup the game server:
/home/gk/server/go/gk/bin/gameServerMain -config /home/gk/gameServer/config/config.xml

# setup the directories that are served by apache2
sudo mkdir /var/www/assets
sudo mkdir /var/www/assets/gk
sudo chown gk.gk /var/www/assets
sudo chown gk.gk /var/www/assets/gk

# copy the server files to where they are visible by apache2
cp -r server/stylesheets /var/www/assets/gk
cp -r server/javascript /var/www/assets/gk
cp -r server/audio /var/www/assets/gk

# get the game assets
cd /home/gk
git clone https://github.com/gk-turnip/assets.git

# now the login server and game server should work
# http://localhost:14001/gk/loginServer
# http://localhost:14002/gk/gameServer

# note, you can currently get directly to the game server,
# but in the future it will require the login server.

</pre>

<?php include "includes/footer.php" ?>

#!/bin/bash
# Geeft de gebruiker uit .env (MYSQL_USER) ook rechten op de oefen-database.
# De bestandsnaam begint met "zz" zodat dit na de .sql-bestanden wordt uitgevoerd.
mysql --protocol=socket -uroot -p"$MYSQL_ROOT_PASSWORD" <<-EOSQL
	GRANT ALL PRIVILEGES ON \`oefen-database\`.* TO '$MYSQL_USER'@'%';
	FLUSH PRIVILEGES;
EOSQL

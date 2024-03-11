FROM php:apache

COPY crud/* /var/www/html/crud
COPY auth/* /var/www/html/auth
COPY vhost_*.conf /etc/apache2/sites-available/

WORKDIR /etc/apache2/cert
RUN a2enmod ssl \
&& openssl ecparam -name prime256v1 -genkey -noout -out crud-privkey.pem \
&& openssl ec -in crud-priv-key.pem -pubout -out crud-pub-key.pem \
&& openssl req -new -x509 -key crud-priv-key.pem -out crud-cert.crt -days 90 -subj "/C=FR/ST=Ile-de-France/L=Paris/O=test/CN=crud.test.lan" \
&& openssl ecparam -name prime256v1 -genkey -noout -out auth-privkey.pem \
&& openssl ec -in auth-priv-key.pem -pubout -out auth-pub-key.pem \
&& openssl req -new -x509 -key auth-priv-key.pem -out auth-cert.crt -days 90 -subj "/C=FR/ST=Ile-de-France/L=Paris/O=test/CN=auth.test.lan"

WORKDIR /etc/apache2/sites-available/
RUN a2ensite vhost_*.conf && service apache2 reload

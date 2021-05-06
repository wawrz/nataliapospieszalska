FROM php:5.6.14-apache
LABEL strona Natali w php

COPY . /var/www/html/

# Install sSMTP for mail support
RUN apt-get update \
	&& apt-get install -y -q --no-install-recommends \
		ssmtp \
	&& apt-get clean \
	&& rm -r /var/lib/apt/lists/* \
    && chmod 640 /etc/ssmtp/ssmtp.conf \
    && chown root:mail /etc/ssmtp/ssmtp.conf
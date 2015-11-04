FROM debian:jessie

MAINTAINER Michał Brzuchalski <m.brzuchalski@madkom.pl>

RUN apt-key adv --keyserver hkp://pgp.mit.edu:80 --recv-keys 573BFD6B3D8FBC641079A6ABABF5BD827BD9BF62
RUN echo "deb http://nginx.org/packages/mainline/debian/ jessie nginx" >> /etc/apt/sources.list

RUN apt-get update -qq && \
    apt-get install -qy --no-install-recommends ca-certificates nginx && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update -qq && \
    apt-get install -qy php5-fpm php5-cli php5-pgsql php5-mcrypt php5-curl php5-mysql php5-sqlite php-pear php5-memcached php5-xdebug php-apc php5-imagick php5-gd php5-geoip --no-install-recommends && \
    sed -i -e "s/;daemonize\s*=\s*yes/daemonize = no/g" /etc/php5/fpm/php-fpm.conf && \
    sed -i -e "s/post_max_size\s*=\s*8M/post_max_size = 100M/g" /etc/php5/fpm/php.ini && \
    sed -i -e "s/upload_max_filesize\s*=\s*2M/upload_max_filesize = 100M/g" /etc/php5/fpm/php.ini && \
    sed -i -e "s/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g" /etc/php5/fpm/php.ini && \
    rm -rf /var/lib/apt/lists/*

ENV PHALCON_VERSION v2.0.8
RUN apt-get update -qq && \
    apt-get install -qy --no-install-recommends gcc make re2c libpcre3-dev autoconf autogen intltool libtool wget php5-dev && \
    wget -qO json-c.tar.gz https://github.com/json-c/json-c/archive/master.tar.gz && \
    { tar -xf json-c.tar.gz && ( cd json-c-master && ./autogen.sh && ./configure && make && make install ); } && \
    wget -qO cphalcon.tar.gz https://github.com/phalcon/cphalcon/archive/phalcon-${PHALCON_VERSION}.tar.gz && \
    { tar -xf cphalcon.tar.gz && ( cd cphalcon-phalcon-${PHALCON_VERSION}/build; ./install ); } && \
    echo 'extension=/usr/lib/php5/20131226/phalcon.so' > /etc/php5/fpm/conf.d/phalcon.ini && \
    rm -rf json-c* cphalcon* /var/lib/apt/lists/* && \
    apt-get purge -qy --auto-remove autoconf file g++ gcc libc-dev make pkg-config re2c libpcre3-dev autoconf autogen intltool libtool php5-dev && \
    rm -r /var/lib/apt/lists/*

RUN apt-get update -qq && \
    apt-get install -qy --no-install-recommends supervisor && \
    rm -rf /var/lib/apt/lists/*

RUN ln -sf /dev/stdout /var/log/nginx/access.log && \
    ln -sf /dev/stderr /var/log/nginx/error.log

ADD www.conf /etc/php5/fpm/pool.d/www.conf
ADD nginx.conf /etc/nginx/nginx.conf
ADD default.conf /etc/nginx/conf.d/default.conf
ADD supervisor.conf /etc/supervisor/conf.d/web.conf

VOLUME ["/var/www"]
VOLUME ["/var/log/nginx"]

EXPOSE 80 9001

CMD ["supervisord", "-n"]
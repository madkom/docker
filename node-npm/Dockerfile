FROM debian:jessie

MAINTAINER Michał Brzuchalski <m.brzuchalski@madkom.pl>

RUN apt-get update -qq && \
    apt-get install -qq -y ca-certificates curl nodejs --no-install-recommends && \
    ln -s /usr/bin/nodejs /usr/local/bin/node && \
    curl -skLN https://npmjs.org/install.sh | /bin/bash && \
    rm -rf /var/lib/apt/lists/*

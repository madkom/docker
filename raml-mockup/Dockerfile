FROM debian:jessie

MAINTAINER Damian Karpiński <d.karpinski@madkom.pl>

RUN apt-get update -qq && \
    apt-get install -y nodejs npm nodejs-legacy --no-install-recommends && \
    npm install -g raml-mockup && \
    rm -rf /var/lib/apt/lists/*

VOLUME /raml

CMD ["/bin/sh", "-c", "/usr/local/bin/raml-mockup /raml/api.raml -d /raml/schemas -f http://json-schema.org -w"]
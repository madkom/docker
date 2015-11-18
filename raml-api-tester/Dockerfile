FROM debian:jessie

MAINTAINER Dariusz Gafka <d.gafka@madkom.pl>

RUN apt-get update -qq && \
    apt-get install -y nodejs npm --no-install-recommends && \
    npm install -g abao && \
    rm -rf /var/lib/apt/lists/*

VOLUME /contract

CMD "abao /contract/api.raml $API_ENDPOINT"
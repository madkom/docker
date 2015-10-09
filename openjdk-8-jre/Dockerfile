FROM debian:jessie

RUN echo 'deb http://httpredir.debian.org/debian jessie-backports main' > /etc/apt/sources.list.d/jessie-backports.list
RUN apt-get update -qq && apt-get install -yq --no-install-recommends ca-certificates && \
	rm -rf /var/lib/apt/lists/*

#RUN apt-get update && apt-get install -y unzip && rm -rf /var/lib/apt/lists/*

ENV LANG C.UTF-8
ENV JAVA_VERSION 8u66
ENV JAVA_DEBIAN_VERSION 8u66-b01-1~bpo8+1
ENV CA_CERTIFICATES_JAVA_VERSION 20140324

RUN apt-get update -qq && \
	apt-get install -yq --no-install-recommends \
		openjdk-8-jre-headless="$JAVA_DEBIAN_VERSION" \
		ca-certificates-java="$CA_CERTIFICATES_JAVA_VERSION" && \
	rm -rf /var/lib/apt/lists/*

RUN /var/lib/dpkg/info/ca-certificates-java.postinst configure
RUN apt-get update -qq && \
    apt-get install -yq --no-install-recommends libfontconfig1 && \
    rm -rf /var/lib/apt/lists/*

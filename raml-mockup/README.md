# Raml Mockup Server

It will [run mockup server](https://github.com/gextech/raml-mockup) based on [RAML](http://raml.org/).

## Example
[example RAML API](https://github.com/madkom/docker/tree/master/raml-mockup/example)

    docker run -i -t -p 5000:3000 -v /example/raml:/raml madkom/raml-mockup

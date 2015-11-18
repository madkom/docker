# Raml Api Designer

It will [test](https://github.com/cybertk/abao) your API endpoint against [RAML](http://raml.org/).  

## Example

Create catalog /tmp/contract and `api.raml` file inside. `api.raml` need to be RAML described file.
Get your provider IP, which will be visible for `raml-api-tester`. If it is `http://localhost`, 
then pass `http://172.17.42.1:80` (it is your localhost machine docker virtual IP).
Pass it as environment variable API_ENDPOINT.
   
    docker run -t --rm=true -e API_ENDPOINT="http://172.17.42.1:80" -v /tmp/contract:/contract madkom/raml-api-tester

Container returns `0` if testing went well. 

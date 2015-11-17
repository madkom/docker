# Pacto Mock Service

Docker Image for [Check here](https://github.com/bethesque/pact-mock_service).

For testing consumer side in PHP you can use [pact-php](https://github.com/mopoke/pact-php) 

## Run it!

    docker run -p 1234:1234 -v /tmp/log:/var/log/pacto -v /tmp/contracts:/opt/contracts madkom/pact-mock-service
    
It will create running pacto server under `1234` port with mounted volumes `/tmp/log` (logs)  and `/tmp/contracts` (pacto contracts)
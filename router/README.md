Rinetd Router
=============

## Build

```bash
make build
```

## Usage

Pass routing rules for [linked containers](https://docs.docker.com/userguide/dockerlinks/) in format:

```
FORWARD[1]=<host_port>:<link_name>:<linked_container_port>
```

To set logging file pass for eg.:

```
LOGFILE=/dev/stdout
```

Example:

```bash
docker run -it --link some_web:web -e 'FORWARD[1]=80:web:80' -e 'FORWARD[2]=443:web:443' -p 80:80 -p 443:443 madkom/router
```

## License

The MIT License (MIT)

Copyright (c) 2015 Madkom

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

#!/bin/bash
php configure.php > /etc/rinetd.conf && /usr/sbin/rinetd -f -c /etc/rinetd.conf
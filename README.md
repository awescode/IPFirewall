# Laravel firewall by IP
The tool for protection your Laravel 5 website by IP. The system works with dynamic tables and you can add your IP to Z7D firewall remotely.

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]

# Installation

Via Composer

``` bash
$ composer require z7d/firewall
```

Add service provider to your app.php file

``` php
\z7d\firewall\FirewallServiceProvider::class
```

Publish & Migrate firewall table.
``` bash
$ php artisan vendor:publish
$ php artisan migrate
```
## Usage

Please change values in /config/firewall.php

For automaticly adding new IP address to firewall use:
 - http://example.com/?{variable_from_firewall_config}={key_from_firewall_config}

For getting SQL query for manual adding PERMANENT ip to database:
 - http://example.com/ip (your IP)
 - http://example.com/ip/127.0.0.1 (different IP)
 



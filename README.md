# Laravel firewall by IP
The tool for protection your Laravel 5 website by IP. The system works with dynamic tables and you can add your IP to Awescode Firewall remotely.

# Installation

Via Composer

``` bash
$ composer require "awescode/ip-firewall":"1.0.5.@dev"
```

Add service provider to your app.php file to 'providers'

``` php
\Awescode\IPFirewall\FirewallServiceProvider::class
```

Publish & Migrate firewall table.
``` bash
$ php artisan vendor:publish
$ php artisan migrate
```
## Usage

1. Change values in /config/firewall.php
2. Go to http://example.com/ip-firewall, copy string, put to MySQL for adding your IP to permanent list
3. Make the secret link for dynamic adding IP to system: http://example.com/?{variable_from_firewall_config}={key_from_firewall_config}

# Notice:

For automaticly adding <b>temporary</b> new IP address to firewall use:
 - http://example.com/?{variable_from_firewall_config}={key_from_firewall_config}

For getting SQL query for manual adding <b>permanent</b> IP to database:
 - http://example.com/ip-firewall (your IP)
 - http://example.com/ip-firewall/127.0.0.1 (different IP)
 



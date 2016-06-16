# Laravel firewall by IP
The tool for protection your Laravel 5 website by IP. The system works with dynamic tables and you can add your IP to Z7D firewall remotely.

# Installation

Via Composer

``` bash
$ composer require z7d/ip-firewall
```

Add service provider to your app.php file to 'providers'

``` php
\Z7D\IPFirewall\FirewallServiceProvider::class
```

Publish & Migrate firewall table.
``` bash
$ php artisan vendor:publish
$ php artisan migrate
```
## Usage

Please change values in /config/firewall.php

    # how many time will live a temporary IP address (sec)
    'timeip' => 1*60*60,

    #Variable for adding a new IP to database.
    'variable' => '_k',
    
    #Key for adding a new IP to database.
    'key' => 'random_key_string'



For automaticly adding <b>temporary</b> new IP address to firewall use:
 - http://example.com/?{variable_from_firewall_config}={key_from_firewall_config}

For getting SQL query for manual adding <b>permanent</b> IP to database:
 - http://example.com/ip (your IP)
 - http://example.com/ip/127.0.0.1 (different IP)
 



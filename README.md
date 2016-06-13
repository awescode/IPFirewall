# Laravel firewall by IP
The tool for protection your Laravel 5 website by IP. The system works with dynamic tables and you can add your IP to Z7D firewall remotely.

# Installation



php artisan vendor:publish --provider="z7d\firewall\FirewallServiceProvider"

php artisan migrate --path=vendor/z7d/firewall/src/migrations

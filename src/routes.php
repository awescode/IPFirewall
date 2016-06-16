<?php

Route::get('/ip-firewall', function(){
    die('INSERT INTO firewall (ip_addr, hash_ip_addr, typeofsave, created_at, updated_at) VALUE (\''.$_SERVER['REMOTE_ADDR'].'\', \''.getIpHash($_SERVER['REMOTE_ADDR']).'\', \'permanent\', \''.date('Y-m-d H:i:s').'\', \''.date('Y-m-d H:i:s').'\');');
});

Route::get('/ip-firewall/{ip}', function($ip){
    die('INSERT INTO firewall (ip_addr, hash_ip_addr, typeofsave, created_at, updated_at) VALUE (\''.$ip.'\', \''.getIpHash($ip).'\', \'permanent\', \''.date('Y-m-d H:i:s').'\', \''.date('Y-m-d H:i:s').'\');');
}); 

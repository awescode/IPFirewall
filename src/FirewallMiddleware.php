<?php

namespace z7d\ip-firewall;

use Closure;
use DB;
use Config;
use Redirect;

/**
 * Class FirewallMiddleware
 * @package z7d\ip-firewall
 */
class FirewallMiddleware
{
    /**
     * @var string
     */
    protected $remoteAddr = false;

    /**
     * FirewallMiddleware constructor.
     */
    public function __construct()
    {
        if (isset($_SERVER['REMOTE_ADDR']))
        {
            $this->remoteAddr = $_SERVER['REMOTE_ADDR'];
        }
        $this->checkSecretKey();
        $this->checkIP();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    /**
     * @return mixed
     */
    protected function checkSecretKey()
    {
        if (isset($_GET[Config::get('firewall.variable')]))
        {
            if ($_GET[Config::get('firewall.variable')] == Config::get('firewall.key'))
            {
                DB::table('firewall')->insert(
                    [
                        'ip_addr' => $this->remoteAddr,
                        'hash_ip_addr' => getIpHash($this->remoteAddr),
                        'typeofsave' => 'temporary',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                    ]
                );
                return Redirect::to('/');
            }
        }
        return true;
    }

    /**
     *
     * Function for cheking IP address.
     * Return 503 error if ip is not allow.
     *
     * @return bool
     */
    protected function checkIP()
    {
        if ($this->remoteAddr)
        {
            if (!DB::table('firewall')->where('hash_ip_addr', getIpHash($this->remoteAddr))->first()){
                $this->get503();
            }
        }
        return true;
    }

    /**
     *
     * Print 503 error
     *
     */
    protected function get503()
    {
        echo '<!-- access denied your ip: '.$this->remoteAddr.' -->';
        header('HTTP/1.1 503 Service Temporarily Unavailable');
        header('Status: 503 Service Temporarily Unavailable');
        header('Retry-After: 3000');
        exit;
    }


}

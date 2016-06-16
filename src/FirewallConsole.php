<?php
namespace z7d\ip-firewall;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DB;

/**
 * Class FirewallConsole
 * @package z7d\ip-firewall
 */
class FirewallConsole extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'firewall:flushtempips';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for flushing all temporary IP addresses which old more then a day from Firewall database.';


    /**
     * FirewallConsole constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('firewall')->where('typeofsave', 'temporary')->where('created_at', '>', date("Y-m-d H:i:s", time()+Config::app('firewall.timeip')))->delete();
    }



}

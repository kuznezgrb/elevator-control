<?php
/**
 * Created by PhpStorm.
 * User: alexander.kuznetsov
 * Date: 15.11.2018
 * Time: 10:02
 */

namespace App\Utils;

use Predis\{Client};

/**
 * Class СLiftRedis
 * @package App\Utils
 */
class СLiftRedis
{
    /**
     * @param string $lifts
     */
    public function setListsRedis(string $lifts)
    {
        $redis = new Client([ 'host' => 'redis', 'port' => 6379]);

        $redis->set('lifts', $lifts);

        $redis->publish('lifts', $lifts);

    }

}
<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Redis;

trait Position
{

    /** Compass directions
     * N, W, S, E
     */

    /** Rover coordinate
     * (1,2) -> (x,y)
     */


    /**
     * @param $rover_name -> "test"
     * @param $coordinate -> (x,y,N)
     * @param $direction -> N, W, S, E
     */
    public function setRover($rover_name, $coordinate)
    {

        $time = 1 * 60;
        //Use in memory system for create rover
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->setex($rover_name, $time, $coordinate);
        return  $response = $redis->get($rover_name);

    }

    /**
     * @param $rover_name -> "test"
     */
    public function getRover($rover_name)
    {
        //Use in memory system for get rover
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $response = $redis->get($rover_name);
        return  $response;

    }


}

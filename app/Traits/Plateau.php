<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Redis;

trait Plateau
{

    /** Compass directions
     * N, W, S, E
     */

    /** Matrix
     * (3,3) -> (x,y)
     */


    /**
     * @param $plateau_name -> "test"
     * @param $matrix -> x,y
     */
    public function setPlateau($plateau_name, $matrix)
    {

        $time = 5 * 60;
        $plateau_name = "Plateau-".$plateau_name;
        //Use in memory system for create rover
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        $redis->setex($plateau_name, $time, $matrix);
        return $redis->get($plateau_name);

    }

    /**
     * @param $plateau_name -> "test"
     */
    public function getPlateau($plateau_name)
    {
        //Use in memory system for get rover
        $plateau_name = "Plateau-".$plateau_name;
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);
        return $redis->get($plateau_name);

    }


}

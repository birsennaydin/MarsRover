<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Redis;

trait Direction
{

    private $x_matrix = 3;
    private $y_matrix = 3;
    /** Compass directions
     * N, W, S, E
     */

    /** Direction kinds
     * (N,L) = W
     */
    private $directions_list = array(
        "N,L" => "W",
        "N,R" => "E",
        "W,L" => "S",
        "W,R" => "N",
        "S,L" => "E",
        "S,R" => "W",
        "E,L" => "N",
        "E,R" => "S"
    );
    private $x = 0;
    private $y = 0;
    private $compass_direction = "N";


    /**
     * @param $coordinate -> (x,y,N)
     * @param $commands -> M, M, R, L ...
     * @param $plateau
     */
    public function commands($coordinate, $commands, $plateau)
    {

        $plateaus = explode(",", $plateau);
        $commands = explode(",", $commands);
        $coordinate = explode(",", $coordinate);

        //Get the Plateau's info
        $this->x_matrix = $plateaus[0];
        $this->y_matrix = $plateaus[1];

        //Get the coordinate
        $this->x = $coordinate[0];
        $this->y = $coordinate[1];
        $this->compass_direction = $coordinate[2];

        foreach ($commands as $command) {
            switch ($command) {
                case "L";
                    //If command type is Left
                    $this->turnLeft();
                    break;
                case "R";
                    //If command type is Right
                    $this->turnRight();
                    break;
                case "M";
                    //If command type is Move
                    $this->move();
                    break;
            }


        }
        return "($this->x, $this->y, $this->compass_direction)";

    }


    public function turnLeft()
    {
        //For example(N,L) = W
        $this->compass_direction = $this->directions_list["$this->compass_direction,L"];
        // return $this->compass_direction;

    }

    public function turnRight()
    {
        //For example(N,R)
        $this->compass_direction = $this->directions_list["$this->compass_direction,R"];
        //return $this->compass_direction;

    }

    public function move()
    {
        //For example(N,M)
        // $this->l[] = $this->compass_direction;
        switch ($this->compass_direction) {
            case "N";
                //If compass direction is N
                if ($this->y < $this->y_matrix) {
                    $this->y = ($this->y + 1);
                }
                return $this->compass_direction;
                //return $this->y;
                break;
            case "S";
                //If compass direction is S
                if ($this->y > 0) {
                    $this->y = ($this->y - 1);
                }
                return $this->compass_direction;
                break;
            case "E";
                //If compass direction is E
                if ($this->x < $this->x_matrix) {
                    $this->x = ($this->x + 1);
                }
                return $this->compass_direction;
                break;
            case "W";
                //If compass direction is W
                if ($this->x > 0) {
                    $this->x = ($this->x - 1);
                }
                return $this->compass_direction;
                break;

        }

    }


}

<?php
namespace App\Model;
class User
{
    const UP = 'up';
    const DOWN = 'down';
    const LEFT = 'left';
    const RIGHT = 'right';

    const PLAYER_TYPE_SEEK = 1;
    const PLAYER_TYPE_HIDE = 2;

    private $id;
    private $type = self::PLAYER_TYPE_SEEK;
    private $x;
    private $y;

    public function __construct($id, $x, $y)
    {
        $this->id = $id;
        $this->x = $x;
        $this->y = $y;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getId()
    {
        return $this->id;
    }

    public function up()
    {
        $this->y++;
    }

    public function down()
    {
        $this->y--;
    }

    public function left()
    {
        $this->x--;
    }

    public function right()
    {
        $this->x++;
    }
}
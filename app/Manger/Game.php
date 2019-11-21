<?php
namespace App\Manager;

use App\Model\Map;
use App\Model\User;

class Game
{
    private $gameMap = [];
    private $players = []; // 房间中游戏的人 (很奇怪，能一直存在嘛)

    public function __construct()
    {
        $this->gameMap = new Map(12, 12);
    }

    public function createPlayer($playerId, $x, $y)
    {
        $user =  new User($playerId, $x, $y);
        if (!empty($this->players)) {
            $user->setType(User::PLAYER_TYPE_HIDE); // 第一个seek， 第二个 hide
        }
        $this->players[$playerId] = $user;  // 放入玩家数组中
    }

    public function playerMove($playerId, $direction)
    {
        $this->players[$playerId]->{$direction}(); // php 这么调用真的nb
    }

    public function printGameMap()
    {
        $map = $this->gameMap->getMapData();
        $res = '';
        foreach ($map as $value) {
            foreach ($value as $v1) {
                if ($v1 == 0) {
                    $res .= '墙,';
                } else {
                    $res .= ' ';
                }
            }
            $res .= PHP_EOL;
        }
        return $res;
    }
}
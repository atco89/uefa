<?php
declare(strict_types=1);

namespace App;

use App\Positions\Defender;
use App\Positions\Goalkeeper;
use App\Positions\Midfielder;
use App\Positions\Striker;

/**
 * Class Team
 * @package App
 */
class Team
{

    /** @var array */
    private $players;

    /**
     * Team constructor.
     */
    public function __construct()
    {
        $this->players = [];
    }

    /**
     * @param AddPlayer $addPlayer
     * @return bool
     */
    public function addPlayer(AddPlayer $addPlayer): bool
    {
        $numberOfPlayers = count($this->players);
        $playerPosition = $addPlayer->getPositionName();
        if ($numberOfPlayers > 22 || !$this->isPositionAvailable($playerPosition))
            return false;

        $this->players[] = [
            'id'       => $numberOfPlayers + 1,
            'position' => $playerPosition,
            'quality'  => $addPlayer->getQuality(),
            'speed'    => $addPlayer->getSpeed()
        ];
        return true;
    }

    /**
     * @param string $position
     * @return bool
     */
    private function isPositionAvailable(string $position): bool
    {
        $count = 0;
        foreach ($this->players as $player)
            if ($player['position'] === $position)
                $count++;
        return $this->checkPositionAvailable($count, $position);
    }

    /**
     * @param int $count
     * @param string $position
     * @return bool
     */
    private function checkPositionAvailable(int $count, string $position): bool
    {
        $teamStructure = [
            (new Goalkeeper)->getPositionName() => 2,
            (new Defender)->getPositionName()   => 6,
            (new Midfielder)->getPositionName() => 10,
            (new Striker)->getPositionName()    => 4
        ];
        return $teamStructure[$position] > $count;
    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

}
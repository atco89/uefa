<?php
declare(strict_types=1);

namespace App\Tactics;

/**
 * Class Defend
 * @package App\Tactics
 */
class Defend implements TacticInterface
{

    /**
     * @return int
     */
    public function getNumOfDefenders(): int
    {
        return 5;
    }

    /**
     * @return int
     */
    public function getNumOfMidfielders(): int
    {
        return 4;
    }

    /**
     * @return int
     */
    public function getNumOfStrikers(): int
    {
        return 1;
    }

}
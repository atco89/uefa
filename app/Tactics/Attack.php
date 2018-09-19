<?php
declare(strict_types=1);

namespace App\Tactics;

/**
 * Class Attack
 * @package App\Tactics
 */
class Attack implements TacticInterface
{

    /**
     * @return int
     */
    public function getNumOfDefenders(): int
    {
        return 3;
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
        return 3;
    }

}
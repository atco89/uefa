<?php
declare(strict_types=1);

namespace App\Tactics;

/**
 * Class Middle
 * @package App\Tactics
 */
class Middle implements TacticInterface
{

    /**
     * @return int
     */
    public function getNumOfDefenders(): int
    {
        return 4;
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
        return 2;
    }

}
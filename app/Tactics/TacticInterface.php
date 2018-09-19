<?php
declare(strict_types=1);

namespace App\Tactics;

/**
 * Interface TacticInterface
 * @package App\Tactics
 */
interface TacticInterface
{

    /**
     * Number of players in defence.
     * @return int
     */
    public function getNumOfDefenders(): int;

    /**
     * Number of players in middlefield.
     * @return int
     */
    public function getNumOfMidfielders(): int;

    /**
     * Number of strikers.
     * @return int
     */
    public function getNumOfStrikers(): int;

}
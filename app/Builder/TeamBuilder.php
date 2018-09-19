<?php
declare(strict_types=1);

namespace App\Builder;

use App\Positions\Defender;
use App\Positions\Goalkeeper;
use App\Positions\Midfielder;
use App\Positions\Striker;
use App\Tactics\TacticInterface;
use App\Team;

/**
 * Class TeamBuilder
 * @package App\Builder
 */
class TeamBuilder extends FormationBuilder
{

    /**
     * TeamBuilder constructor.
     * @param Team $team
     * @param TacticInterface $tactic
     */
    public function __construct(Team $team, TacticInterface $tactic)
    {
        parent::__construct($team, $tactic);
    }

    /**
     * @return array
     */
    public function build(): array
    {
        return array_merge(
            $this->loadGoalkeeper(),
            $this->loadDefence(),
            $this->loadMiddlefield(),
            $this->loadStrikers()
        );
    }

    /**
     * @return array
     */
    private function loadGoalkeeper(): array
    {
        return $this->loadBestPlayers(new Goalkeeper, 1);
    }

    /**
     * @return array
     */
    private function loadDefence(): array
    {
        return $this->loadBestPlayers(new Defender, $this->tactics->getNumOfDefenders());
    }

    /**
     * @return array
     */
    private function loadMiddlefield(): array
    {
        return $this->loadBestPlayers(new Midfielder, $this->tactics->getNumOfMidfielders());
    }

    /**
     * @return array
     */
    private function loadStrikers(): array
    {
        return $this->loadBestPlayers(new Striker, $this->tactics->getNumOfStrikers());
    }

}
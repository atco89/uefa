<?php
declare(strict_types=1);

namespace App\Builder;

use App\Positions\PositionInterface;
use App\Tactics\TacticInterface;
use App\Team;

/**
 * Class FormationBuilder
 * @package App\Builder
 */
abstract class FormationBuilder
{

    /** @var array */
    protected $team;
    /** @var TacticInterface */
    protected $tactics;

    /**
     * FormationBuilder constructor.
     * @param Team $team
     * @param TacticInterface $tactics
     */
    public function __construct(Team $team, TacticInterface $tactics)
    {
        $this->team = $team->getPlayers();
        $this->tactics = $tactics;
    }

    /**
     * @param PositionInterface $position
     * @param int $numberOfPlayers
     * @return array
     */
    protected function loadBestPlayers(PositionInterface $position, int $numberOfPlayers): array
    {
        $players = $this->loadByPosition($position->getPositionName());

        foreach ($this->sortByQuality($players) as $key)
            if ($_SESSION['injured'] !== $players[$key]['id'])
                $sortedByQuality[] = $players[$key];

        return isset($sortedByQuality) ? array_slice($sortedByQuality, 0, $numberOfPlayers) : [];
    }

    /**
     * @param string $position
     * @return array
     */
    private function loadByPosition(string $position): array
    {
        return array_filter($this->team, function ($value) use ($position) {
            return $value['position'] === $position;
        });
    }

    /**
     * @param array $players
     * @return array
     */
    private function sortByQuality(array $players): array
    {
        $playersQuality = array_map(function ($player) {
            return $player['quality'];
        }, $players);

        arsort($playersQuality);

        return array_keys($playersQuality);
    }

}
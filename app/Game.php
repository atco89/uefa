<?php
declare(strict_types=1);

namespace App;

/**
 * Class Game
 * @package App
 */
class Game
{

    /** @var array */
    protected $teamMembers;

    /**
     * Game constructor.
     * @param array $teamMembers
     */
    public function __construct(array $teamMembers)
    {
        $this->teamMembers = $teamMembers;
    }

    /**
     * @return string
     */
    public function run(): string
    {
        $refereeMessage = $this->teamIsAccordingToProps() ? null : 'You do not have enough players for this match! Match will be canceled.';

        if ($refereeMessage === null) {
            $yourTeamResult = rand(0, 7);
            $opponentResult = rand(0, 7);
            $injuredPlayer = rand(0, 10);
            $_SESSION['injured'] = $this->teamMembers[$injuredPlayer]['id'];
            $this->addGameStatistics($yourTeamResult);
        } else {
            $yourTeamResult = 'n/a';
            $opponentResult = 'n/a';
            $_SESSION['injured'] = null;
        }

        return json_encode([
            'referee_message' => $refereeMessage,
            'match_result'    => [
                'your_team' => $yourTeamResult,
                'opponent'  => $opponentResult
            ],
            'team_members'    => $this->teamMembers
        ], JSON_PRETTY_PRINT);
    }

    /**
     * @return bool
     */
    private function teamIsAccordingToProps(): bool
    {
        return count($this->teamMembers) === 11;
    }

    /**
     * @param int $yourTeamResult
     */
    private function addGameStatistics(int $yourTeamResult): void
    {
        $achievedGoals = $this->loadPlayersWithAchievedGoals($yourTeamResult);
        foreach ($this->teamMembers as &$player) {
            $playerId = $player['id'];
            $player['injured'] = $_SESSION['injured'] === $playerId;
            $player['achieved_goals'] = isset($achievedGoals[$playerId]) ? $achievedGoals[$playerId] : 0;
        }
    }

    /**
     * @param int $result
     * @return array
     */
    private function loadPlayersWithAchievedGoals(int $result): array
    {
        $players = [];
        for ($i = 0; $i < $result; $i++)
            $players[] = $this->teamMembers[rand(1, 10)]['id'];
        return array_count_values($players);
    }

}
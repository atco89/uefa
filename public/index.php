<?php
declare(strict_types=1);

namespace App;

use App\Builder\TeamBuilder;
use App\Positions\Defender;
use App\Positions\Goalkeeper;
use App\Positions\Midfielder;
use App\Positions\Striker;
use App\Tactics\Attack;

session_start();

require __DIR__ . '/../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$team = new Team;

$team->addPlayer(new AddPlayer(new Goalkeeper, 10, 1));
$team->addPlayer(new AddPlayer(new Goalkeeper, 10, 2));

$team->addPlayer(new AddPlayer(new Defender, 11, 3));
$team->addPlayer(new AddPlayer(new Defender, 12, 4));
$team->addPlayer(new AddPlayer(new Defender, 13, 5));
$team->addPlayer(new AddPlayer(new Defender, 14, 6));
$team->addPlayer(new AddPlayer(new Defender, 15, 7));
$team->addPlayer(new AddPlayer(new Defender, 16, 8));

$team->addPlayer(new AddPlayer(new Midfielder, 17, 9));
$team->addPlayer(new AddPlayer(new Midfielder, 18, 10));
$team->addPlayer(new AddPlayer(new Midfielder, 19, 11));
$team->addPlayer(new AddPlayer(new Midfielder, 20, 12));
$team->addPlayer(new AddPlayer(new Midfielder, 21, 13));
$team->addPlayer(new AddPlayer(new Midfielder, 22, 14));
$team->addPlayer(new AddPlayer(new Midfielder, 23, 15));
$team->addPlayer(new AddPlayer(new Midfielder, 24, 16));
$team->addPlayer(new AddPlayer(new Midfielder, 25, 17));
$team->addPlayer(new AddPlayer(new Midfielder, 26, 18));

$team->addPlayer(new AddPlayer(new Striker, 27, 19));
$team->addPlayer(new AddPlayer(new Striker, 28, 20));
$team->addPlayer(new AddPlayer(new Striker, 29, 21));
$team->addPlayer(new AddPlayer(new Striker, 30, 22));

$teamMembers = (new TeamBuilder($team, new Attack))->build();

echo (new Game($teamMembers))->run();
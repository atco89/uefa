<?php
declare(strict_types=1);

namespace App\Positions;

/**
 * Class Striker
 * @package App\Positions
 */
class Striker implements PositionInterface
{

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        return 'Striker';
    }

}
<?php
declare(strict_types=1);

namespace App\Positions;

/**
 * Class Midfielder
 * @package App\Positions
 */
class Midfielder implements PositionInterface
{

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        return 'Midfielder';
    }

}
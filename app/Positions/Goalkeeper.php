<?php
declare(strict_types=1);

namespace App\Positions;

/**
 * Class Goalkeeper
 * @package App\Positions
 */
class Goalkeeper implements PositionInterface
{

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        return 'Goalkeeper';
    }

}
<?php
declare(strict_types=1);

namespace App\Positions;

/**
 * Class Defender
 * @package App\Positions
 */
class Defender implements PositionInterface
{

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        return 'Defender';
    }

}
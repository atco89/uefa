<?php
declare(strict_types=1);

namespace App\Positions;

/**
 * Interface PositionInterface
 * @package App\Positions
 */
interface PositionInterface
{

    /**
     * Returns position name.
     * - Goalkeeper
     * - Defender
     * - Midfielder
     * - Striker
     *
     * @return string
     */
    public function getPositionName(): string;

}
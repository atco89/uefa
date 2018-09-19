<?php
declare(strict_types=1);

namespace App;

use App\Positions\PositionInterface;

/**
 * Class AddPlayer
 * @package App
 */
class AddPlayer
{

    /** @var string */
    private $positionName;
    /** @var int */
    private $speed;
    /** @var float */
    private $quality;

    /**
     * AddPlayer constructor.
     * @param PositionInterface $position
     * @param int $speed
     * @param float $quality
     */
    public function __construct(PositionInterface $position, int $speed, float $quality)
    {
        $this->positionName = $position->getPositionName();
        $this->speed = $speed;
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function getPositionName(): string
    {
        return $this->positionName;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return float
     */
    public function getQuality(): float
    {
        return $this->quality;
    }

}
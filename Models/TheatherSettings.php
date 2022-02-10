<?php

declare(strict_types=1);

class TheatherSettings
{
    private int $id;
    private int $theaterId;
    private string $seatGroup;
    private int $seatcount;

    public function __construct(int $id, int $theaterId, string $seatGroup, int $seatcount)
    {
        $this->id = $id;
        $this->theaterId = $theaterId;
        $this->seatGroup = $seatGroup;
        $this->seatcount = $seatcount;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTheaterId(): int
    {
        return $this->theaterId;
    }

    /**
     * @return string
     */
    public function getSeatGroup(): string
    {
        return $this->seatGroup;
    }

    /**
     * @return int
     */
    public function getSeatcount(): int
    {
        return $this->seatcount;
    }
}
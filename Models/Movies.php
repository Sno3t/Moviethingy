<?php

declare(strict_types=1);

class Movies
{

    private int $id;
    private int $title;
    private int $coverImg;
    private string $description;
    private string $duration;
    private int $dateShow;
    private int $dateEnd;


    public function __construct(int $id, int $title, string $coverImg, string $description, float $duration, string $dateShow, string $dateEnd)
    {
        $this->id = $id;
        $this->movie_id = $title;
        $this->tsId = $coverImg;
        $this->lastname = $description;
        $this->firstname = $duration;
        $this->contactNo = $dateShow;
        $this->qty = $dateEnd;
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
    public function getTitle(): int
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getCoverImg(): int
    {
        return $this->coverImg;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @return int
     */
    public function getDateShow(): int
    {
        return $this->dateShow;
    }

    /**
     * @return int
     */
    public function getDateEnd(): int
    {
        return $this->dateEnd;
    }


}
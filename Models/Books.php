<?php

declare(strict_types=1);

class Books
{

    private int $id;
    private int $movie_id;
    private int $tsId;
    private string $lastname;
    private string $firstname;
    private int $contactNo;
    private int $qty;
    private string $date;
    private string $time;

    public function __construct(int $id, int $movieId, int $tsId, string $lastname, string $firstname, int $contactNo, int $qty, string $date, string $time)
    {
        $this->id = $id;
        $this->movie_id = $movieId;
        $this->tsId = $tsId;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->contactNo = $contactNo;
        $this->qty = $qty;
        $this->date = $date;
        $this->time = $time;
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
    public function getMovieId(): int
    {
        return $this->movie_id;
    }

    /**
     * @return int
     */
    public function getTsId(): int
    {
        return $this->tsId;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return int
     */
    public function getContactNo(): int
    {
        return $this->contactNo;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }


}
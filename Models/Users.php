<?php

declare(strict_types=1);

class Users
{
    private int $id;
    private string $name;
    private string $username;
    private int $password;

    public function __construct(int $id, string $name, string $username, int $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return int
     */
    public function getPassword(): int
    {
        return $this->password;
    }

}
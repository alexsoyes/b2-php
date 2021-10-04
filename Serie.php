<?php

class Serie
{
    /**
     * @var string
     */
    private $name;

    public function __construct(
        string $name
    )
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
<?php

abstract class AbstractVideoProvider
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function provide(): string;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}


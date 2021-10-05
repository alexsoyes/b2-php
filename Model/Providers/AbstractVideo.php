<?php

abstract class AbstractVideo
{
    private $name;
    protected $id;

    public function __construct(string $id, string $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public abstract function provide(): string;
    public abstract function type(): string;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}

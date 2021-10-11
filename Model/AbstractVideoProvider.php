<?php

abstract class AbstractVideoProvider
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $note;

    public function __construct(
        string $name,
        string $description,
        int    $note)
    {
        $this->name = $name;
        $this->description = $description;
        $this->note = $note;
    }

    abstract public function provide(): string;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * @param int $note
     */
    public function setNote(int $note): void
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}


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


    /**
     * @var bool
     */
    private $liked = false;

    /**
     * @var array | Author[]
     */
    private $authors = [];

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

    /**
     * @return bool
     */
    public function isLiked(): bool
    {
        return $this->liked;
    }

    /**
     * @param bool $liked
     */
    public function setLiked(bool $liked): void
    {
        $this->liked = $liked;
    }

    /**
     * @return array|Author[]
     */
    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param array|Author[] $authors
     */
    public function setAuthors(array $authors): void
    {
        $this->authors = $authors;
    }
}


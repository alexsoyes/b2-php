<?php

abstract class AbstractVideoProvider
{
    use LikedTrait;

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
    final public function getDescription(): string
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


<?php

class Anime
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $note;
    /**
     * @var int
     */
    private $seasons;
    /**
     * @var array
     */
    private $tags;

    public function __construct(
        string $name,
        string $description,
        int    $note,
        int    $seasons,
        array  $tags)
    {
        $this->name = $name;
        $this->description = $description;
        $this->note = $note;
        $this->seasons = $seasons;
        $this->tags = $tags;
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
     * @return int
     */
    public function getSeasons(): int
    {
        return $this->seasons;
    }

    /**
     * @param int $seasons
     */
    public function setSeasons(int $seasons): void
    {
        $this->seasons = $seasons;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

}
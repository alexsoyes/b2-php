<?php

class Anime extends AbstractVideo
{
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
        string $id,
        string $name,
        string $description,
        int    $note,
        int    $seasons,
        array  $tags)
    {
        parent::__construct($id, $name);
        $this->description = $description;
        $this->note = $note;
        $this->seasons = $seasons;
        $this->tags = $tags;
    }

    public function provide(): string
    {
        return "https://www.crunchyroll.com/fr/" . $this->id;
    }

    public function type(): string
    {
        return "anime";
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
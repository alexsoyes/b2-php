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
    private $desc;
    /**
     * @var int
     */
    private $note;
    /**
     * @var int
     */
    private $season;

    public function __construct(
        string $name,
        string $desc,
        int    $note,
        int    $season
    )
    {
        $this->name = $name;
        $this->desc = $desc;
        $this->note = $note;
        $this->season = $season;
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
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @param string $desc
     */
    public function setDesc(string $desc): void
    {
        $this->desc = $desc;
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
    public function getSeason(): int
    {
        return $this->season;
    }

    /**
     * @param int $season
     */
    public function setSeason(int $season): void
    {
        $this->season = $season;
    }


}

$naruto = new Anime('Naruto', '', 10, 10);


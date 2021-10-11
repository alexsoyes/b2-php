<?php

abstract class AbstractVideo implements ViewableInterface, LikeableInterface
{
    // les enfants vont en hériter
    protected $id;

    // restent dans le parent
    private $name;
    private $description;
    private $note;
    private $tags;
    private $isLiked = false;

    public function __construct(
        string $id,
        string $name,
        string $description,
        int    $note,
        array  $tags)
    {
        $this->name = $name;
        $this->id = $id;
        $this->description = $description;
        $this->note = $note;
        $this->tags = $tags;
    }

    // on oblige ces méthodes à se retrouver dans les enfants
    // les enfants doivent réécrire le contenu de la fonction
    public abstract function provide(): string;
    public abstract function type(): string;

    /**
     * @return mixed
     */
    public function isLiked(): bool
    {
        return $this->isLiked;
    }

    /**
     * @param mixed $isLiked
     */
    public function setIsLiked($isLiked): void
    {
        $this->isLiked = $isLiked;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}

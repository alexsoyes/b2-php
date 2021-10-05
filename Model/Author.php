<?php

class Author implements LikeableInterface {

    private $name;

    private $isLiked = false;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isLiked(): bool
    {
        return $this->isLiked;
    }

    /**
     * @param bool $isLiked
     */
    public function setIsLiked(bool $isLiked): void
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
}
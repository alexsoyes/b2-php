<?php

class Author implements LikeableInterface
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var bool
     */
    private $liked = false;

    public function __construct(string $name)
    {
        $this->name = $name;
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
}
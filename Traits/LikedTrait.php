<?php


trait LikedTrait
{
    private $isLiked = false;

    /**
     * @return mixed
     */
    final public function isLiked(): bool
    {
        return $this->isLiked;
    }

    /**
     * @param mixed $isLiked
     */
    final public function setIsLiked($isLiked): void
    {
        $this->isLiked = $isLiked;
    }
}
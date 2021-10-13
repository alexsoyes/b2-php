<?php

trait LikedTrait
{
    /** @var bool */
    protected $liked = false;

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
}
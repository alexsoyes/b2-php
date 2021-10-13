<?php

final class YouTube extends AbstractVideo implements ViewableInterface, LikeableInterface
{
    public function provide(): string
    {
        return "https://www.youtube.com/watch?v=" . $this->id;
    }

    public function type(): string
    {
        return "vidéo";
    }
}

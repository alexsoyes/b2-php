<?php

final class Netflix extends AbstractVideo implements ViewableInterface, LikeableInterface
{
    public function provide(): string
    {
        return "https://www.netflix.com/fr/title/" . $this->id;
    }

    public function type(): string
    {
        return "film";
    }
}
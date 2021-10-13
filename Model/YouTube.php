<?php

final class YouTube extends AbstractVideoProvider implements ViewableInterface, LikeableInterface
{
    public function provide(): string
    {
        return "https://www.youtube.com/results?search_query=" . $this->name;
    }
}
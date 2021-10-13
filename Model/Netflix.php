<?php

final class Netflix extends AbstractVideoProvider implements ViewableInterface, LikeableInterface
{
    public function provide(): string
    {
        return "https://www.netflix.com/search?q=" . $this->name;
    }
}

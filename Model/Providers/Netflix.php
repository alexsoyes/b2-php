<?php

class Netflix extends AbstractVideo
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
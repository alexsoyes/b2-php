<?php

class CrunchyRoll extends AbstractVideo
{
    public function provide(): string
    {
        return "https://www.crunchyroll.com/fr/" . $this->id;
    }

    public function type(): string
    {
        return "anime";
    }
}
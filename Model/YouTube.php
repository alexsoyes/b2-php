<?php

class YouTube extends AbstractVideoProvider
{
    public function provide(): string
    {
        return "https://www.youtube.com/results?search_query=" . $this->name;
    }
}
<?php

class YouTube extends AbstractVideo
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

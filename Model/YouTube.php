<?php

class YouTube extends AbstractVideoProvider
{
    public function provide(): string
    {
        return "https://youtube.com";
    }
}
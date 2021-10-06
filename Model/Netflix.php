<?php

class Netflix extends AbstractVideoProvider
{
    public function provide(): string
    {
        return "https://www.netflix.com";
    }
}

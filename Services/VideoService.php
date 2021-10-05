<?php

class VideoService
{
    public function watch(AbstractVideo $video): string
    {
        return sprintf('<a href="%s" target="_blank">%s</a>', $video->provide(), $video->provide());
    }

    public static function displayLiked(LikeableInterface $likeable): void {
        echo($likeable->isLiked() ? "❤️" : "");
    }
}
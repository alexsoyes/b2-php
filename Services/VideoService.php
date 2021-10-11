<?php

class VideoService
{
    /**
     * @param AbstractVideo $video peut être n'importe quel enfant (YouTube, Netflix...)
     * @return string
     */
    public function watch(AbstractVideo $video): string
    {
        return sprintf('<a href="%s" target="_blank">%s</a>', $video->provide(), $video->provide());
    }

    /**
     * @param LikeableInterface $likeable Soit un Author, soit un enfant de AbstractVideo (Netflix, Youtube...)
     */
    public static function displayLiked(LikeableInterface $likeable): void {
        echo($likeable->isLiked() ? "❤️" : "");
    }
}
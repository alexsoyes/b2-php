<?php

class VideoViewerService
{
    public function watch(AbstractVideo $video): string
    {
        return sprintf('<a href="%s" target="_blank">Regarder %s</a>', $video->provide(), $video->type());
    }
}
<?php

class WatcherService
{
    static function getLink(AbstractVideoProvider $videoProvider): string {
        return sprintf('<a href="%1$s">%1$s</a>', $videoProvider->provide());
    }
}
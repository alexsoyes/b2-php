<?php

class WatcherService
{
    /**
     * @return AbstractVideoProvider[]
     */
    static function getVideos(): array
    {
        $squidGameNetflix = new Netflix('Squid game', '', 1);
        $grafikartYoutube = new YouTube('Grafikart', '', 8);
        $gravenYoutube = new YouTube('Graven', '', -10);

        $authorAlex = new Author('Alex');
        $authorBen = new Author('Ben');
        $authorBen->setLiked(true);

        $grafikartYoutube->setLiked(true);
        $grafikartYoutube->setAuthors([$authorAlex, $authorBen]);

        $videos = [$grafikartYoutube, $gravenYoutube, $squidGameNetflix];

        /** @var AbstractVideoProvider $video */
        foreach ($videos as $video) {
            if ($video->getNote() < 0) {
                throw new BadNoteException();
            }
        }

        return $videos;
    }

    static function getLink(AbstractVideoProvider $videoProvider): string
    {
        return sprintf('<a href="%1$s">%1$s</a>', $videoProvider->provide());
    }

    static function displayLike(LikeableInterface $likeable): string
    {
        return $likeable->isLiked() ? "❤️" : "x";
    }
}
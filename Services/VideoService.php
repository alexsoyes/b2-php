<?php

final class VideoService
{

    /**
     * @return Author[]
     */
    public static function getVideos(): array
    {
        $bleach = new CrunchyRoll('bleach', 'Bleach', '', 1000, ['Action']);
        $naruto = new CrunchyRoll('naruto', 'Naruto', 'Ninja', 10, ['Action']);
        $mha = new CrunchyRoll('my-hero-academia', 'MHA', 'Héros', 10, ['Action', 'Héro']);
        $apiPlatform = new YouTube('Ap6l56bLQtQ', 'Grafikart - API Platform', "Apprendre le framework", 10, ['Programmation', 'Web']);
        $squidGame = new Netflix('81040344', 'Squid Game', 'Une bonne série coréenne', 9, ['Violence', 'Suspense']);
        $wakanim = new Wakanim();

        $squidGame->setIsLiked(true);

        $bleachsAuthor = new Author('Tite Kubo');
        $narutosAuthor = new Author('Kishimoto');
        $narutosAuthor->setIsLiked(true);

        $naruto->setAuthors([$narutosAuthor]);
        $bleach->setAuthors([$bleachsAuthor]);

//        var_dump($narutosAuthor); // a maintenant la propriété liked = true

        return [
            // $wakanim, // Uncaught TypeError: Argument 1 passed to VideoService::displayLiked() must implement interface LikeableInterface, instance of Wakanim given
            $naruto,
            $bleach,
            $mha,
            $apiPlatform,
            $squidGame
        ];
    }

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
<?php
namespace Framework;

// Permet de générer une url avec le posts_name. //
class FormatUrl {

    public static function formatUrl($posts_name) {

        $posts_name = mb_strtolower($posts_name);
        $posts_name = utf8_decode($posts_name);
        $posts_name = strtr($posts_name, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
        $posts_name = preg_replace('`[^a-z0-9]+`', '-', $posts_name);
        $posts_name = trim($posts_name, '-');
        return $posts_name;
    }
}
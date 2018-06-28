<?php

namespace Lotu\Containers;

use Plenty\Plugin\Templates\Twig;

class LotuContainer
{
    public function call(Twig $twig):string
    {
        return $twig->render('Lotu::Theme');
    }
}

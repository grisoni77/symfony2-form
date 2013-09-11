<?php

use Symfony\Component\Translation\Translator;
use Symfony\Component\Translation\Loader\YamlFileLoader;
use Symfony\Component\Translation\Loader\XLiffFileLoader;

// create the Translator
$translator = new Translator('it');
// somehow load some translations into it
$translator->addLoader('yml', new YamlFileLoader());
$translator->addLoader('xlf', new XLiffFileLoader());
$translator->addResource(
    'yml',
    __DIR__.'/translations/messages.it.yml',
    'it'
);

return $translator;


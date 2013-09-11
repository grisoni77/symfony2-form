<?php
use Symfony\Component\Form\Forms;

use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;

/* @var $translator Translator */
$translator = require_once __DIR__.'/init_translator.php';

/* @var $twig Twig_Environment */
$twig = require_once __DIR__.'/init_twig.php';
// add the TranslationExtension (gives us trans and transChoice filters)
$twig->addExtension(new TranslationExtension($translator));

/* @var $validator Symfony\Component\Validator\ValidatorInterface */
$validator = require_once __DIR__.'/init_validator.php';
// there are built-in translations for the core error messages
$translator->addResource(
    'xlf',
    $vendorFormDir . '/Resources/translations/validators.it.xlf',
    'it',
    'validators'
);
$translator->addResource(
    'xlf',
    $vendorValidatorDir . '/Resources/translations/validators.it.xlf',
    'it',
    'validators'
);

// create Factory
//$factory = Forms::createFormFactory();
$factory = Forms::createFormFactoryBuilder()
        ->addExtension(new ValidatorExtension($validator))
        ->getFormFactory();

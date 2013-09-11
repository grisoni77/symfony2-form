<?php

use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Form\TwigRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;


// the Twig file that holds all the default markup for rendering forms
// this file comes with TwigBridge
$defaultFormTheme = 'form_div_layout.html.twig';

$vendorDir = realpath(__DIR__ . '/../vendor');
// the path to TwigBridge so Twig can locate the form_div_layout.html.twig file
$vendorTwigBridgeDir = $vendorDir . '/symfony/twig-bridge/Symfony/Bridge/Twig';
// the path to your other templates
$viewsDir = realpath(__DIR__ . '/views');

$twig = new Twig_Environment(new Twig_Loader_Filesystem(array(
    $viewsDir,
    $vendorTwigBridgeDir . '/Resources/views/Form',
)));
$formEngine = new TwigRendererEngine(array($defaultFormTheme));
$formEngine->setEnvironment($twig);

// csrf Provider
$csrfProvider = null;

// add the FormExtension to Twig
$twig->addExtension(new FormExtension(new TwigRenderer($formEngine, $csrfProvider)));




return $twig;
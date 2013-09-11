<?php

require_once __DIR__."/../vendor/autoload.php";

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Email;

// setup form factory
require_once __DIR__.'/setup.php'; 
 
// create Form
$form = $factory->createBuilder()
        ->add('title', 'text', array(
            'constraints' => new NotBlank(),
        ))
        ->add('email', 'text', array(
            'constraints' => array(
                new NotBlank(),
                new Email(),
            )
        ))
        ->add('text', 'textarea')
        ->add('created', 'date', array(
            'constraints' => array(
                new NotBlank,
                new Type('\Datetime'),
            )
        ))
        ->getForm();

// Manage input (if POST)
if (isset($_POST[$form->getName()]))
{
    $form->bind($_POST[$form->getName()]);
    if ($form->isValid()) {
        echo 'Complimenti! il form è valido';
        $data = $form->getData();
        print_r($data);
    }
}

// render template
echo $twig->render('index.html.twig', array(
    'form' => $form->createView()
));

?>

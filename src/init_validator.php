<?php

use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Validator\Validation;

$vendorDir = realpath(__DIR__ . '/../vendor');
$vendorFormDir = $vendorDir . '/symfony/form/Symfony/Component/Form';
$vendorValidatorDir = $vendorDir . '/symfony/validator/Symfony/Component/Validator';

// create the validator - details will vary
$validator = Validation::createValidator();

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

return $validator;
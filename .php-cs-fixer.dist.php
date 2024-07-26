<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (new Finder())
    ->in([
        __DIR__,
    ])
    ->path([
        'app',
        'config',
        'database',
        'routes',
        'tests',
        '.php-cs-fixer.dist.php',
    ])
    ->notPath([
        'app/Services/SmsRu/Internal',
        'app/Orchid/Layouts/User/',
        'app/Orchid/Layouts/Role',
    ])
;

return (new Config())
    ->setRules([
        '@Symfony'               => true,
        '@PSR12'                 => true,
        '@PER-CS'                => true,
        '@PhpCsFixer'            => true,
        'array_syntax'           => ['syntax' => 'short'],
        'array_indentation'      => true,
        'binary_operator_spaces' => [
            'default' => 'align_single_space_minimal',
        ],
        'new_with_braces' => [
            'anonymous_class' => false,
        ],
        'not_operator_with_successor_space' => true,
        'global_namespace_import'           => [
            'import_classes'   => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
        'php_unit_test_class_requires_covers' => false,
    ])
    ->setFinder($finder)
    ;

<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['var', 'vendor']);

return (new PhpCsFixer\Config)
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP71Migration' => true,
        '@PHP71Migration:risky' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'braces' => [
            'allow_single_line_closure' => true,
        ],
        'no_superfluous_phpdoc_tags' => true,
        'modernize_types_casting' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'native_function_invocation' => true,
        'ordered_imports' => true,
        'phpdoc_order' => true,
        'psr_autoloading' => true,
        'semicolon_after_instruction' => true,
        'strict_comparison' => true,
        'strict_param' => true,
        'ternary_to_null_coalescing' => true,
        'ordered_class_elements' => true,
        'php_unit_strict' => false,
        'phpdoc_add_missing_param_annotation' => true,
        'doctrine_annotation_indentation' => true,
    ])
    ->setFinder($finder);
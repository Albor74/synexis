<?php
$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
    ])
    ->exclude(['var', 'vendor']);

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,

        // === Строгость ===
        'strict_param'          => true,
        'declare_strict_types'  => true,

        // === Импорты ===
        'no_unused_imports' => true,
        'ordered_imports'   => [
            'sort_algorithm' => 'alpha',
            'imports_order'  => ['const', 'class', 'function'],
        ],

        // === Параметры методов ===
        'method_argument_space' => [
            'on_multiline'                     => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => false,
            'after_heredoc'                    => true,
        ],
        'function_declaration' => [
            'closure_function_spacing' => 'one',
        ],

        // === Отступы и пробелы ===
        'indentation_type'          => true,
        'no_trailing_whitespace'    => true,
        'no_whitespace_in_blank_line' => true,
        'single_blank_line_at_eof'  => true,
        'no_extra_blank_lines'      => [
            'tokens' => ['extra', 'throw', 'use', 'use_trait', 'curly_brace_block'],
        ],

        // === Массивы ===
        'array_indentation'                  => true,
        'trim_array_spaces'                  => true,
        'no_whitespace_before_comma_in_array' => true,
        'whitespace_after_comma_in_array'    => ['ensure_single_space' => true],

        // === Классы ===
        'class_definition' => [
            'multi_line_extends_each_single_line' => true,
            'single_item_single_line'             => true,
        ],
        'no_blank_lines_after_class_opening' => true,
        'single_trait_insert_per_statement'  => true,

        // === Типы ===
        'void_return'                                       => true,
        'phpdoc_to_comment'                                => false,

        // === Операторы ===
        'binary_operator_spaces' => [
            'default'   => 'single_space',
            'operators' => ['=>' => 'align_single_space_minimal'],
        ],
        'unary_operator_spaces'            => true,
        'not_operator_with_successor_space' => false,
        'concat_space'                     => ['spacing' => 'one'],
        'cast_spaces'                      => ['space' => 'single'],

        // === Переносы строк ===
        'line_ending'                  => true,
        'no_multiple_statements_per_line' => true,
        'blank_line_before_statement'  => [
            'statements' => ['return', 'throw', 'try', 'if', 'foreach', 'for', 'while'],
        ],
    ])
    ->setFinder($finder);

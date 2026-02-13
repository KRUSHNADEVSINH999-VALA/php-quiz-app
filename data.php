<?php

declare(strict_types=1);

// data.php
// Contains the quiz question bank as a PHP array.

$QUESTIONS = [
    [
        'question' => '1. PHP is mainly used for?',
        'options' => [
            'A' => 'Database Design',
            'B' => 'Server-side Web Development',
            'C' => 'Graphic Designing',
            'D' => 'Operating Systems',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '2. Which tag is used to start PHP code?',
        'options' => [
            'A' => '<script>',
            'B' => '<?php ?>',
            'C' => '<php>',
            'D' => '<code>',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '3. PHP files have extension?',
        'options' => [
            'A' => '.html',
            'B' => '.js',
            'C' => '.php',
            'D' => '.xml',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '4. Which superglobal is used to send form data securely?',
        'options' => [
            'A' => '$_GET',
            'B' => '$_POST',
            'C' => '$_SERVER',
            'D' => '$_COOKIE',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '5. Which symbol is used before variable name?',
        'options' => [
            'A' => '#',
            'B' => '@',
            'C' => '$',
            'D' => '%',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '6. Which function outputs text in PHP?',
        'options' => [
            'A' => 'echo',
            'B' => 'print_r',
            'C' => 'display',
            'D' => 'write',
        ],
        'answer' => 'A',
    ],
    [
        'question' => '7. Which of the following is a loop in PHP?',
        'options' => [
            'A' => 'repeat',
            'B' => 'loop',
            'C' => 'foreach',
            'D' => 'iterate',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '8. PHP is executed on?',
        'options' => [
            'A' => 'Client Browser',
            'B' => 'Server',
            'C' => 'Mobile Device',
            'D' => 'Compiler',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '9. Which operator is used for comparison?',
        'options' => [
            'A' => '=',
            'B' => '==',
            'C' => ':=',
            'D' => '=>',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '10. Which function starts a session?',
        'options' => [
            'A' => 'start_session()',
            'B' => 'session_begin()',
            'C' => 'session_start()',
            'D' => 'init_session()',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '11. What is the output of: echo 5 + \'5 days\';',
        'options' => [
            'A' => '10',
            'B' => '55',
            'C' => '5',
            'D' => 'Error',
        ],
        'answer' => 'A',
    ],
    [
        'question' => '12. Which function counts array elements?',
        'options' => [
            'A' => 'size()',
            'B' => 'count()',
            'C' => 'length()',
            'D' => 'total()',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '13. Which loop executes at least once?',
        'options' => [
            'A' => 'for',
            'B' => 'while',
            'C' => 'foreach',
            'D' => 'do-while',
        ],
        'answer' => 'D',
    ],
    [
        'question' => '14. Which function is used to include another file?',
        'options' => [
            'A' => 'require()',
            'B' => 'attach()',
            'C' => 'connect()',
            'D' => 'link()',
        ],
        'answer' => 'A',
    ],
    [
        'question' => '15. What does isset() check?',
        'options' => [
            'A' => 'If variable is numeric',
            'B' => 'If variable exists and not NULL',
            'C' => 'If variable is string',
            'D' => 'If variable is empty',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '16. Which function removes whitespace?',
        'options' => [
            'A' => 'trim()',
            'B' => 'clean()',
            'C' => 'strip()',
            'D' => 'cut()',
        ],
        'answer' => 'A',
    ],
    [
        'question' => '17. What does explode() do?',
        'options' => [
            'A' => 'Destroys variable',
            'B' => 'Splits string into array',
            'C' => 'Combines arrays',
            'D' => 'Deletes array',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '18. Which function merges arrays?',
        'options' => [
            'A' => 'combine()',
            'B' => 'array_merge()',
            'C' => 'array_join()',
            'D' => 'merge_array()',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '19. How do you access session variable?',
        'options' => [
            'A' => '$SESSION',
            'B' => '$_SESSION',
            'C' => '$_SESS',
            'D' => '$_SERVER',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '20. Which operator checks both value and type?',
        'options' => [
            'A' => '==',
            'B' => '!=',
            'C' => '===',
            'D' => '=',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '21. What will var_dump(0 == \'0\') return?',
        'options' => [
            'A' => 'false',
            'B' => 'true',
            'C' => 'null',
            'D' => 'error',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '22. Which function stops script execution?',
        'options' => [
            'A' => 'stop()',
            'B' => 'exit()',
            'C' => 'break()',
            'D' => 'return()',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '23. Which function is used to hash passwords?',
        'options' => [
            'A' => 'md5()',
            'B' => 'password_hash()',
            'C' => 'encrypt()',
            'D' => 'hash_pass()',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '24. What does header() function do?',
        'options' => [
            'A' => 'Displays title',
            'B' => 'Sends raw HTTP header',
            'C' => 'Creates page header',
            'D' => 'Refreshes browser',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '25. Which PHP version introduced scalar type hints?',
        'options' => [
            'A' => 'PHP 5',
            'B' => 'PHP 5.3',
            'C' => 'PHP 7',
            'D' => 'PHP 4',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '26. Which function checks if file exists?',
        'options' => [
            'A' => 'file_check()',
            'B' => 'exists_file()',
            'C' => 'file_exists()',
            'D' => 'check_file()',
        ],
        'answer' => 'C',
    ],
    [
        'question' => '27. What does require_once() do?',
        'options' => [
            'A' => 'Includes file only once',
            'B' => 'Includes file repeatedly',
            'C' => 'Deletes file',
            'D' => 'Creates file',
        ],
        'answer' => 'A',
    ],
    [
        'question' => '28. Which function sorts array in ascending order?',
        'options' => [
            'A' => 'sort()',
            'B' => 'rsort()',
            'C' => 'asort()',
            'D' => 'ksort()',
        ],
        'answer' => 'A',
    ],
    [
        'question' => '29. Which superglobal stores server information?',
        'options' => [
            'A' => '$_SESSION',
            'B' => '$_SERVER',
            'C' => '$_POST',
            'D' => '$_ENV',
        ],
        'answer' => 'B',
    ],
    [
        'question' => '30. What is the correct way to prevent SQL Injection?',
        'options' => [
            'A' => 'Using GET method',
            'B' => 'Using Prepared Statements',
            'C' => 'Using echo',
            'D' => 'Using include()',
        ],
        'answer' => 'B',
    ],
];

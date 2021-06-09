<?php

declare(strict_types=1);

/**
 * @param string $testInput
 * @return bool true if expression is balanced, false otherwise
 */
function validateBrackets(string $testInput): bool {

    $roundOpen = '(';
    $roundClose = ')';
    $squareOpen = '[';
    $squareClose = ']';
    $curlyOpen = '{';
    $curlyClose = '}';
    $angleOpen = '<';
    $angleClose = '>';


    $length = strlen($testInput);
    $stack = [];
    for ($i = 0; $i < $length; $i++) {
        switch ($testInput[$i]) {
            case $roundOpen: array_push($stack, $roundOpen); break;
            case $roundClose:
                if (array_pop($stack) !== $roundOpen)
                    return false;
                break;
            case $squareOpen: array_push($stack, $squareOpen); break;
            case $squareClose:
                if (array_pop($stack) !== $squareOpen)
                    return false;
                break;
            case $curlyOpen: array_push($stack, $curlyOpen); break;
            case $curlyClose:
                if (array_pop($stack) !== $curlyOpen)
                    return false;
                break;
            case $angleOpen: array_push($stack, $angleOpen); break;
            case $angleClose:
                if (array_pop($stack) !== $angleOpen)
                    return false;
                break;
        }
    }
    //In the end we should have empty stack if number of opening and closing parenthesis match
    return empty($stack);
}

$sampleInput = [
    '(())',
    '((()))',
    '((([])))',
    '([)]',
    '[]() ',
    '([]<>)',
    '(<[]{}>',
];
foreach($sampleInput as $i) {
    if(validateBrackets($i)) {
        echo "balanced\n";
    }
    else {
        echo "not balanced\n";
    }
}

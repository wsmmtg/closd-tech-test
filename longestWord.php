<?php
function longestWord($sen) {
    $explodedWords = explode(" ", $sen);
    $longestWord = "";

    foreach($explodedWords as $word) {
        if (strlen($longestWord) < strlen($word)) {
            $longestWord = $word;
        }
    }

    return $longestWord;
}

print_r(longestWord("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor."));
<?php
function longestWord($sen) {
    // Explode the string in parameter
    $explodedWords = explode(" ", $sen);
    $longestWord = "";

    // Loop each word and check whether it's longer
    foreach($explodedWords as $word) {
        if (strlen($longestWord) < strlen($word)) {
            $longestWord = $word;
        }
    }

    return $longestWord;
}

print_r(longestWord("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor."));
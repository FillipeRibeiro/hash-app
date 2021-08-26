<?php

namespace App\Service;

class GenerateHashService
{
    public function handle(string $inputText): array
    {
        $countable = 0;

        do {
            $key = $this->generateRandomString();
            $wordConcat = $inputText . $key;
            $hash = md5($wordConcat);
            $countable++;
        } while (substr($hash, 0, 4) !== '0000');

        return [
            'key' => $key,
            'hash' => $hash,
            'try' => $countable,
            'word_concat' => $wordConcat,
            'input_string' => $inputText,
        ];
    }

    private function generateRandomString(): string
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($letters), 0, 8);
    }
}

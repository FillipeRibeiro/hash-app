<?php

namespace App\Service;

class GenerateHashService
{
    public function handle(string $inputText): array
    {
        $countable = 0;

        do {
            $key = $this->generateRandomString();
            $wordhash = $inputText . $key;
            $hash = md5($wordhash);
            $countable++;
        } while (substr($hash, 0, 4) !== '0000');

        return [
            'key' => $key,
            'hash' => $hash,
            'try' => $countable,
            'word_hash' => $wordhash,
            'Input_string' => $inputText,
        ];
    }

    private function generateRandomString(): string
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($letters), 0, 8);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\HashInfo;
use App\Service\GenerateHashService;

class HashController extends Controller
{
    public function generateHash(string $inputText): array
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

    public function getHashes()
    {
        $filterAttempts = request()->attempts;

        $hashes = HashInfo::select("id as numero_bloco", "batch", "input_string as string", "key as chave");
        if (!is_null($filterAttempts)) {
            $hashes->where('try', '<=', $filterAttempts);
        }
        return $hashes->paginate();
    }

    private function generateRandomString(): string
    {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($letters), 0, 8);
    }
}

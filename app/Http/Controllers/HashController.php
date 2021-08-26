<?php

namespace App\Http\Controllers;

use App\Service\GenerateHashService;

class HashController extends Controller
{
    public function generateHash(string $inputText): array
    {
        return (new GenerateHashService())->handle($inputText);
    }
}

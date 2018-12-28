<?php

namespace App\Interfaces;

interface DescriptionGeneratorInterface
{
    public function generate(array $pizzaOrder): string;
}
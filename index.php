<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\HelloWorld;

$hello = new HelloWorld();
echo $hello->greet() . PHP_EOL;


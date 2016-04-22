<?php
namespace AppTest;

require_once __DIR__ . '/../vendor/autoload.php';

$loader = new \Composer\Autoload\ClassLoader();
$loader->add('tests', __DIR__ . '/..');
$loader->register();

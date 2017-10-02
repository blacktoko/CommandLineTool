#!/usr/bin/env php
<?php
/**
 * User: tom
 * Date: 29/09/2017
 * Time: 09:52
 */

// We use the composer psr4 autoload.
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Finder\Finder;

$app = new Application('CommandLineTool', 1.0);


// Use the Symfony finder component to autoload all the app actions generated in the app/Actions folder.
$finder = new Finder();
$finder->files()->in('app/Actions');

foreach ($finder as $file) {
      $class = 'Actions\\' . $file->getBasename('.php');
      $app->add(new $class());
}

$app->run();

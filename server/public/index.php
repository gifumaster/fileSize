<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Packages\Domain\File\FileSize;
use Packages\Domain\File\FileSizeUnit;

$a = new FileSize(1000000000000000);

echo "1000000000000000Byte is <br />";

echo $a->format(FileSizeUnit::PB). "<br />";
echo $a->format(FileSizeUnit::TB). "<br />";
echo $a->format(FileSizeUnit::GB). "<br />";
echo $a->format(FileSizeUnit::MB,2). "<br />";

echo $a->format(FileSizeUnit::PiB, 2). "<br />";
echo $a->format(FileSizeUnit::TiB,2). "<br />";
echo $a->format(FileSizeUnit::GiB,2). "<br />";
echo $a->format(FileSizeUnit::MiB,2). "<br />";

echo '<hr />';

$b = new FileSize(rand(1,1000000000));
echo $b->autoFormat(2) . "<br />";

$b = new FileSize(rand(1000000000,5000000000000));
echo $b->autoFormat(2) . "<br />";

<?php

declare(strict_types=1);

namespace Packages\Domain\File;

enum FileSizeUnit: string
{
    case PB = 'PB';
    case TB = 'TB';
    case GB = 'GB';
    case MB = 'MB';
    case KB = 'KB';
    case B  = 'B';

    case PiB = 'PiB';
    case TiB = 'TiB';
    case GiB = 'GiB';
    case MiB = 'MiB';
    case KiB = 'KiB';

    public function unit(): int
    {
        return match($this){
            self::PB => pow(10,15),
            self::TB => pow(10,12),
            self::GB => pow(10,9),
            self::MB => pow(10,6),
            self::KB => pow(10,3),
            self::PiB => pow(2,50),
            self::TiB => pow(2,40),
            self::GiB => pow(2,30),
            self::MiB => pow(2,20),
            self::KiB => pow(2,10),
            self::B => 1,
        };
    }
}
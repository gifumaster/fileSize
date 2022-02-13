<?php

declare(strict_types=1);

namespace Packages\Domain\File;

use Packages\Domain\Shared\Entity;

class FileSize extends Entity
{
    private float $fileSizeByte = 0;

    public function __construct(
        private readonly float $fileSize,
        private readonly FileSizeUnit $unit = FileSizeUnit::B,
    ) {
        if(!$this->fileSize){
            throw new \InvalidArgumentException('ファイルサイズは必須です。');
        }
        $this->fileSizeByte = $this->fileSize * $unit->unit();
    }

    //指定した単位でファイルサイズを表示する。
    public function format(FileSizeUnit $fileSizeUnit = null, int $precision = 0): string{

        $p = $fileSizeUnit->unit();
        $fileSize = floor(($this->fileSizeByte / $p)  * pow(10, $precision)) / pow(10, $precision);

        return $fileSize . $fileSizeUnit->name;
    }

    //自動で判定
    public function autoFormat(int $precision = 0): string{

        foreach(FileSizeUnit::cases() as $key => $value){
            $p = $value->unit();
            if($this->fileSizeByte / $p > 1){
                $fileSize = floor(($this->fileSizeByte / $p)  * pow(10, $precision)) / pow(10, $precision);
                return $fileSize . $value->name;
            }
        }

        //最終的にはByteが出力される。
    }
}

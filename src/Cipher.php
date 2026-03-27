<?php
declare(strict_types=1);

namespace MbarekCipher;

require_once __DIR__ . '/../src/classes/Matrix.php';
require_once __DIR__ . '/../src/classes/LayerTransformer.php';

use MbarekCipher\Matrix;
use MbarekCipher\LayerTransformer;

class Cipher {
    public string $key;
    public int $blockSize;

    public function __construct(string $key, int $blockSize = 4096) {
        $this->key = $key;
        $this->blockSize = $blockSize;
    }

    protected function processBlock(array $block, bool $encrypt = true): array {
        $rows = $cols = (int) sqrt(count($block));
        if ($rows * $cols < count($block)) $cols++;

        $mtx = new Matrix($block);
        $lt = new LayerTransformer($mtx->toMatrix2D($rows, $cols), $this->key);
        $mtx->fromMatrix2D($encrypt ? $lt->apply() : $lt->revert());

        return $mtx->buffer;
    }

    public function encryptFile(string $inputFile, string $outputFile): void {
        $fpIn = fopen($inputFile, 'rb');
        $fpOut = fopen($outputFile, 'wb');

        $lastBlockSize = filesize($inputFile) % $this->blockSize;
        if ($lastBlockSize === 0 && filesize($inputFile) > 0) $lastBlockSize = $this->blockSize;

        fwrite($fpOut, pack('N', $lastBlockSize));

        while (!feof($fpIn)) {
            $chunk = array_map('ord', str_split(fread($fpIn, $this->blockSize)));
            $origSize = count($chunk);
            if ($origSize === 0) break;

            if ($origSize < $this->blockSize)
                $chunk = array_merge($chunk, array_fill(0, $this->blockSize - $origSize, 0));

            $processed = $this->processBlock($chunk, true);

            if (feof($fpIn))
                $processed = array_slice($processed, 0, $origSize);

            fwrite($fpOut, implode(array_map('chr', $processed)));
        }

        fclose($fpIn);
        fclose($fpOut);
    }

    public function decryptFile(string $inputFile, string $outputFile): void {
        $fpIn = fopen($inputFile, 'rb');
        $fpOut = fopen($outputFile, 'wb');

        $header = fread($fpIn, 4);
        $lastBlockSize = unpack('N', $header)[1];

        while (!feof($fpIn)) {
            $chunk = array_map('ord', str_split(fread($fpIn, $this->blockSize)));
            $origSize = count($chunk);
            if ($origSize === 0) break;

            if ($origSize < $this->blockSize)
                $chunk = array_merge($chunk, array_fill(0, $this->blockSize - $origSize, 0));

            $processed = $this->processBlock($chunk, false);

            if (feof($fpIn))
                $processed = array_slice($processed, 0, $lastBlockSize);

            fwrite($fpOut, implode(array_map('chr', $processed)));
        }

        fclose($fpIn);
        fclose($fpOut);
    }
}
<?php
declare(strict_types=1);

namespace MbarekCipher;

class Matrix {
    public array $buffer;

    public function __construct(array $buffer) {
        $this->buffer = $buffer;
    }

    public function toMatrix2D(int $rows, int $cols): array {
        $matrix = [];
        $total = count($this->buffer);
        for ($r = 0; $r < $rows; $r++) {
            $matrix[$r] = [];
            for ($c = 0; $c < $cols; $c++) {
                $index = $r * $cols + $c;
                $matrix[$r][$c] = $index < $total ? $this->buffer[$index] : 0;
            }
        }
        return $matrix;
    }

    public function fromMatrix2D(array $matrix): void {
        $this->buffer = [];
        foreach ($matrix as $row) {
            foreach ($row as $val) {
                $this->buffer[] = $val;
            }
        }
    }
}
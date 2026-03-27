<?php
declare(strict_types=1);

namespace MbarekCipher;

class LayerTransformer {
    private array $matrix;
    private string $key;

    public function __construct(array $matrix, string $key) {
        $this->matrix = $matrix;
        $this->key = $key;
    }

    public function apply(): array {
        $rows = count($this->matrix);
        $cols = count($this->matrix[0] ?? []);
        $newMatrix = $this->matrix;

        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {
                $newMatrix[$r][$c] = ($this->matrix[$r][$c] + ord($this->key[($r+$c) % strlen($this->key)])) % 256;
            }
        }
        return $newMatrix;
    }

    public function revert(): array {
        $rows = count($this->matrix);
        $cols = count($this->matrix[0] ?? []);
        $newMatrix = $this->matrix;

        for ($r = 0; $r < $rows; $r++) {
            for ($c = 0; $c < $cols; $c++) {
                $newMatrix[$r][$c] = ($this->matrix[$r][$c] - ord($this->key[($r+$c) % strlen($this->key)])) % 256;
                if ($newMatrix[$r][$c] < 0) $newMatrix[$r][$c] += 256;
            }
        }
        return $newMatrix;
    }
}
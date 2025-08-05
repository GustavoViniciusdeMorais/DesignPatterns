<?php

namespace Gustavo\Api;

class Collection
{
    private array $data;

    private function __construct() {}

    public function __invoke(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function each(callable $fn): Object
    {
        foreach ($this->data as &$item) {
            $item = $fn($item);
        }
        return $this;
    }

    public function toArray(): array
    {
        return $this->data;
    }
}

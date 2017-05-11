<?php

declare(strict_types=1);

namespace WRS;

class NullStorage implements StorageInterface
{
    public function save(string $name, string $content) {
        return;
    }

    public function load(string $name) {
        return NULL;
    }
}

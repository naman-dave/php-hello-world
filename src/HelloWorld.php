<?php

namespace App;

class HelloWorld
{
    public function greet(): string
    {
        return "Hello World!";
    }

    public function toArray(): array
    {
        return [
            'message' => $this->greet(),
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }
}


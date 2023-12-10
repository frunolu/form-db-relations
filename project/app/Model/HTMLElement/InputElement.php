<?php

namespace App\Model;

class InputElement extends HTMLElement
{
    private const TAG_NAME = 'input';

    public function __construct()
    {
        parent::__construct(self::TAG_NAME);
    }

    public function buildInputElement(string $type, string $name, string $placeholder): InputElement
    {
        return (new InputElement())
            ->setAttribute('type', $type)
            ->setAttribute('name', $name)
            ->setAttribute('placeholder', $placeholder);
    }


}

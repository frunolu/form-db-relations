<?php

namespace App\Model;

class InputElement extends HTMLElement
{
    private const TAG_NAME = 'input';

    public function __construct()
    {
        parent::__construct(self::TAG_NAME);
    }
}

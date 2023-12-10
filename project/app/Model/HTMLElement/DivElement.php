<?php

namespace App\Model;

use App\Model\HTMLElement;

class DivElement extends HTMLElement
{
    public function __construct()
    {
        parent::__construct('div');
    }
}

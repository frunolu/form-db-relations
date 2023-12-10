<?php

namespace App\Model;

class SelectElement extends HTMLElement
{
    protected $options = [];

    public function __construct()
    {
        parent::__construct('select');
    }

    public function addChildOption($value, $text)
    {
        $this->options[] = ['value' => $value, 'text' => $text];

        return $this;
    }

    public function render(): string
    {
        $attributesString = $this->renderAttributes();
        $optionsString = $this->renderOptions();

        return "<{$this->tagName}{$attributesString}>{$optionsString}</{$this->tagName}>";
    }

    protected function renderOptions()
    {
        $optionsString = '';
        foreach ($this->options as $option) {
            $optionsString .= "<option value=\"{$option['value']}\">{$option['text']}</option>";
        }

        return $optionsString;
    }
}

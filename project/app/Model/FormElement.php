<?php

namespace App\Model;

class FormElement extends HTMLElement
{
    protected $children = [];

    public function __construct()
    {
        parent::__construct('form');
    }

    public function addInput(InputElement $input)
    {
        $this->children[] = $input;

        return $this;
    }

    public function addSelect(SelectElement $select)
    {
        $this->children[] = $select;

        return $this;
    }

    public function addImage(ImageElement $image)
    {
        $this->children[] = $image;

        return $this;
    }

    public function render()
    {
        $attributesString = $this->renderAttributes();
        $childrenString = $this->renderChildren();

        return "<{$this->tagName}{$attributesString}>{$childrenString}</{$this->tagName}>";
    }

    protected function renderChildren()
    {
        $childrenString = '';
        foreach ($this->children as $child) {
            $childrenString .= $child->render();
        }

        return $childrenString;
    }

    public function addFormItem(HTMLElement $formItem)
    {
        $this->children[] = $formItem;

        return $this;
    }

    public function setAction(string $link)
    {
        $this->setAttribute('action', $link);

        return $this;
    }
}

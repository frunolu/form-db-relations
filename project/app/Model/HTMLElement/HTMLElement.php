<?php
declare(strict_types=1);

namespace App\Model;

use Doctrine\ORM\Mapping as ORM;
use Nette\Utils\Html;

/**
 * @ORM\Entity
 * @ORM\Table(name="html_elements")
 */
class HTMLElement {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $tagName;

    /**
     * @ORM\Column(type="json")
     */
    protected array $attributes = [];

    public function __construct($tagName) {
        $this->tagName = $tagName;
    }

    public function setTagName($tagName): static
    {
        $this->tagName = $tagName;
        return $this;
    }

    public function getTagName() {
        return $this->tagName;
    }

    public function setAttribute($name, $value): static
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttributes() {
        return $this->attributes;
    }

    public function render(): string
    {
        $attributesString = $this->renderAttributes();
        return "<{$this->tagName}{$attributesString}></{$this->tagName}>";
    }

    protected function renderAttributes(): string
    {
        $attributesString = '';
        foreach ($this->attributes as $name => $value) {
            $attributesString .= " $name=\"$value\"";
        }
        return $attributesString;
    }
}

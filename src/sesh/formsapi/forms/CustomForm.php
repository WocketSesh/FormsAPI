<?php

namespace sesh\formsapi\forms;

use Error;
use sesh\formsapi\elements\Dropdown;
use sesh\formsapi\elements\Input;
use sesh\formsapi\elements\Toggle;

class CustomForm extends Form
{
    private array $elements = [];

    public function __construct(string $title)
    {
        parent::__construct("custom_form");

        $this->data["title"] = $title;
        $this->data["content"] = [];
    }

    public function getDropdown(int $index): Dropdown
    {
        return $this->getElement($index);
    }

    public function getInput(int $index): Input
    {
        return $this->getElement($index);
    }

    public function getToggle(int $index): Toggle
    {
        return $this->getElement($index);
    }

    public function getLabel(int $index): string
    {
        return $this->getElement($index);
    }

    public function getElement(int $index)
    {
        if ($index >= count($this->elements))
            throw new Error("Attempt to access out of bounds element in CustomForm");

        return $this->elements[$index];
    }

    public function addLabel(string $text)
    {
        $this->data["content"][] = ["type" => "label", "text" => $text];
        $this->elements[] = $text;
        return $this;
    }

    public function addInput(Input $input)
    {
        $this->data["content"][] = $input->serialize();
        $this->elements[] = $input;
        return $this;
    }

    public function addDropdown(Dropdown $dd)
    {
        $this->data["content"][] = $dd->serialize();
        $this->elements[] = $dd;
        return $this;
    }

    public function addToggle(Toggle $toggle)
    {
        $this->data["content"][] = $toggle->serialize();
        $this->elements[] = $toggle;
        return $this;
    }

}
<?php

namespace sesh\formsapi\forms;

use Error;
use sesh\formsapi\elements\Dropdown;
use sesh\formsapi\elements\Input;
use sesh\formsapi\elements\Slider;
use sesh\formsapi\elements\StepSlider;
use sesh\formsapi\elements\Toggle;

class CustomForm extends Form
{
    private array $elements = [];

    public function __construct(string $title)
    {
        parent::__construct(Form::CUSTOM_TYPE);

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

    public function getSlider(int $index): Slider
    {
        return $this->getElement($index);
    }

    public function getStepSlider(int $index): StepSlider
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

    public function addSlider(Slider $slider)
    {
        $this->data["content"][] = $slider->serialize();
        $this->elements[] = $slider;
        return $this;
    }

    public function addStepSlider(StepSlider $slider)
    {
        $this->data["content"][] = $slider->serialize();
        $this->elements[] = $slider;
        return $this;
    }

}
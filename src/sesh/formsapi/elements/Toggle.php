<?php

namespace sesh\formsapi\elements;

class Toggle
{

    public function __construct(private string $text, private bool $toggled)
    {
    }

    public function setToggled(bool $toggled)
    {
        $this->toggled = $toggled;
    }

    public function isToggled()
    {
        return $this->toggled;
    }

    public function serialize()
    {
        return ["type" => "toggle", "text" => $this->text, "default" => $this->toggled];
    }
}
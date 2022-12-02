<?php


namespace sesh\formsapi\elements;


class Input
{
    public function __construct(private string $text, private ?string $defaultText = null, private ?string $placeholder = null)
    {

    }


    public function setText(string $text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }


    public function serialize()
    {
        $a = ["type" => "input", "text" => $this->text];

        if ($this->defaultText !== null)
            $a["default"] = $this->defaultText;
        if ($this->placeholder !== null)
            $a["placeholder"] = $this->placeholder;

        return $a;
    }
}
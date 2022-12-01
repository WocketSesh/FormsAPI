<?php


namespace sesh\formsapi\elements;


class Dropdown
{
    public function __construct(private string $text, private array $opts, private ?int $selected = null)
    {

    }

    public function setSelected(int $s)
    {
        $this->selected = $s;
    }


    public function getSelected()
    {
        return $this->opts[$this->selected];
    }

    public function getSelectedIndex()
    {
        return $this->selected;
    }

    public function serialize()
    {
        $a = ["type" => "dropdown", "text" => $this->text, "options" => $this->opts];

        if ($this->selected != null)
            $a["default"] = $this->selected;

        return $a;
    }
}
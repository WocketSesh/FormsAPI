<?php


namespace sesh\formsapi\elements;


class Dropdown
{
    public function __construct(public string $text, private array $opts, private ?int $selected = null)
    {

    }

    public function getOpts()
    {
        return $this->opts;
    }

    public function setSelected(int $s)
    {
        $this->selected = $s;
    }


    public function getSelected()
    {
        return $this->selected === null ? null : $this->opts[$this->selected];
    }

    public function getSelectedIndex()
    {
        return $this->selected;
    }

    public function serialize()
    {
        $a = ["type" => "dropdown", "text" => $this->text, "options" => $this->opts];

        if ($this->selected !== null)
            $a["default"] = $this->selected;

        return $a;
    }
}
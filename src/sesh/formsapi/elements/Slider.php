<?php

namespace sesh\formsapi\elements;


class Slider
{
    public function __construct(private string $text, private float $min, private float $max, private float $step = 1.0, private float $current = 1.0)
    {

    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function setCurrent(float $cur)
    {
        $this->current = $cur;
    }


    public function serialize()
    {
        return ["text" => $this->text, "type" => "slider", "min" => $this->min, "max" => $this->max, "default" => $this->current, "step" => $this->step];
    }
}
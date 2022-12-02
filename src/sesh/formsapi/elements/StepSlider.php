<?php

namespace sesh\formsapi\elements;

class StepSlider extends Dropdown
{

    public function serialize()
    {
        $d = ["type" => "step_slider", "steps" => $this->getOpts(), "text" => $this->text];
        if ($this->getSelected() !== null)
            $d["default"] = $this->getSelected();
        return $d;
    }
}
<?php

namespace sesh\formsapi\forms;

use sesh\formsapi\elements\Button;


class SimpleForm extends Form
{
    /**
     * 
     * @var array<Button>
     */
    private array $buttons = [];

    private ? Button $clickedButton = null;
    public function __construct(string $title, string $content = "")
    {
        parent::__construct("form");

        $this->data["title"] = $title;
        $this->data["content"] = $content;
    }

    public function setClickedButton(Button $button)
    {
        $this->clickedButton = $button;
    }

    public function getClickedButton()
    {
        if (isset($this->clickedButton))
            return $this->clickedButton;
    }

    public function addButton(Button $button)
    {
        $this->buttons[] = $button;
        $this->data["buttons"][] = ["text" => $button->text];

        return $this;
    }

    public function getButtons()
    {
        return $this->buttons;
    }
}
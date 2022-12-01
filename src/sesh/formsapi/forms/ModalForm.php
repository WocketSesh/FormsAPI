<?php

namespace sesh\formsapi\forms;

use sesh\formsapi\elements\Button;


class ModalForm extends Form
{
    private array $buttons = [];

    private ? Button $clickedButton = null;

    public function __construct(string $title, string $content, Button $button1, Button $button2)
    {
        parent::__construct("modal");

        $this->addButton($button1, 1);
        $this->addButton($button2, 2);

        $this->data["title"] = $title;
        $this->data["content"] = $content;
    }

    public function addButton(Button $button, int $pos)
    {
        if (count($this->buttons) >= 2)
            return;

        $this->data["button$pos"] = $button->text;
        $this->buttons[] = $button;
    }

    public function setClickedButton(Button $button)
    {
        $this->clickedButton = $button;
    }

    public function getClickedButton()
    {
        return $this->clickedButton;
    }

    public function getButtons()
    {
        return $this->buttons;
    }
}
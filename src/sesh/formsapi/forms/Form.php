<?php


namespace sesh\formsapi\forms;

use Closure;
use pocketmine\form\Form as IForm;
use pocketmine\player\Player;
use sesh\formsapi\elements\Dropdown;
use sesh\formsapi\elements\Input;
use sesh\formsapi\elements\Slider;
use sesh\formsapi\elements\StepSlider;
use sesh\formsapi\elements\Toggle;


abstract class Form implements IForm
{
    public const MODAL_TYPE = "modal";
    public const CUSTOM_TYPE = "custom_form";
    public const SIMPLE_TYPE = "form";

    protected $data = [];

    /**
     * 
     * 
     * @var Closure(Player $player, Form $response): void
     */
    private Closure $callback;

    /**
     * 
     * @var Closure(Player $player, Form $response): void
     */
    private Closure $closedCallback;


    public function __construct(string $type)
    {
        $this->data["type"] = $type;
    }


    /**
     * 
     * 
     * @param Closure(Player $player, Form $response): void $callback
     * @return void
     */
    public function onClick(Closure $callback)
    {
        $this->callback = $callback;
    }

    /**
     * 
     * 
     * @param Closure(Player $player, Form $response): void $callback
     * @return void
     */
    public function onClose(Closure $callback)
    {
        $this->closedCallback = $callback;
    }



    final public function handleResponse(Player $player, $data): void
    {
        if ($data === null) {
            if (isset($this->closedCallback))
                ($this->closedCallback)($player, $this);
            return;
        }

        if ($this instanceof SimpleForm) {
            $this->setClickedButton($this->getButtons()[$data]);
            $this->getClickedButton()->handleClick($player, $this);
        }

        if ($this instanceof ModalForm) {
            // idek but it works
            if (!$data)
                $this->setClickedButton($this->getButtons()[1]);
            else
                $this->setClickedButton($this->getButtons()[0]);


            $this->getClickedButton()->handleClick($player, $this);
        }

        if ($this instanceof CustomForm) {
            foreach ($data as $i => $e) {
                $element = $this->getElement($i);

                switch (true) {
                    case $element instanceof Dropdown:
                        $element->setSelected($e);
                        break;
                    case $element instanceof Input:
                        $element->setText($e);
                        break;
                    case $element instanceof Toggle:
                        $element->setToggled($e);
                        break;
                    case $element instanceof StepSlider:
                        $element->setSelected($e);
                        break;
                    case $element instanceof Slider:
                        $element->setCurrent($e);
                        break;
                    default:
                        break;
                }
            }
        }

        if (isset($this->callback))
            ($this->callback)($player, $this);

    }



    public function jsonSerialize()
    {
        return $this->data;
    }
}
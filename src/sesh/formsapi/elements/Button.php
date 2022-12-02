<?php

namespace sesh\formsapi\elements;

use Closure;
use pocketmine\player\Player;
use sesh\formsapi\forms\Form;

class Button
{

    /**
     * 
     * @var Closure(Player $player, Form $response)
     */
    private Closure $callback;

    /**
     * 
     * @param string $text
     * @param Closure(Player $player, Form $response) $callback
     */
    public function __construct(public string $text, Closure $callback = null, private ? Image $img = null)
    {
        if ($callback !== null)
            $this->callback = $callback;
    }

    public function handleClick(Player $player, Form $response)
    {
        if (isset($this->callback))
            ($this->callback)($player, $response);
    }

    /**
     * 
     * @param Closure(Player $player, Form $response) $callback
     */

    public function onClick(Closure $callback)
    {
        $this->callback = $callback;
    }


    public function setImage(Image $img)
    {
        $this->img = $img;
    }

    public function getImage()
    {
        return $this->img;
    }

    public function serialize()
    {
        $d = ["text" => $this->text];
        if ($this->getImage())
            $d["image"] = $this->getImage()->serialize();

        return $d;
    }


}
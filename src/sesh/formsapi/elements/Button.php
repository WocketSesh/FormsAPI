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
    public function __construct(public string $text, Closure $callback = null)
    {
        if ($callback != null)
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



}
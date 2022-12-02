<?php

namespace sesh\formsapi\elements;

class Image
{
    public const URL_TYPE = "url";
    public const PATH_TYPE = "path";


    public function __construct(private string $image, private string $type = Image::PATH_TYPE)
    {

    }

    public function serialize()
    {
        return ["type" => $this->type, "data" => $this->image];
    }
}
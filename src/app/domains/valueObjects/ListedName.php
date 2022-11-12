<?php
namespace App\domains\valueObjects;

use App\customExceptions\RequiredException;

class ListedName
{
    public string $name;

    public function __construct(string $name)
    {
        if(!$name) {
            throw new RequiredException('氏名');
        }

        $this->name = $name;
    }

}
<?php

namespace App\domains\valueObjects;

use App\customExceptions\RequiredException;
use PhpParser\Node\Expr\BinaryOp\BooleanOr;

class ListedAddress
{
    public string $prefecture;
    public string $city;
    public string $street_bunch;

    public function __construct(string $prefecture, string $city, string $street_bunch)
    {
        if(!$prefecture || !$city || !$street_bunch) {
            throw new RequiredException('住所');
        }

        $this->prefecture = $prefecture;
        $this->city = $city;
        $this->street_bunch = $street_bunch;
    }

    public function getFullAddres(): string
    {
        return "{$this->prefecture}{$this->city}{$this->street_bunch}";
    }

    public function isCurrentAddress(string $current_address): bool
    {
        return $this->getFullAddres() === $current_address;
    }

}
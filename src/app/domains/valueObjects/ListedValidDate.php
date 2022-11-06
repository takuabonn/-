<?php
namespace App\domains\valueObjects;

use App\customExceptions\RequiredException;
use Carbon\Carbon;

class ListedValidDate
{
    public string $valid_date;

    public function __construct(string $valid_date)
    {
        if(!$valid_date) {
            throw new RequiredException('有効期限');
        }

        $this->valid_date = $valid_date;
    }


    public function toDate()
    {
        return new Carbon($this->valid_date);
    }

    public function isValidDate()
    {
        return $this->toDate() >= new Carbon('today');
    }
}
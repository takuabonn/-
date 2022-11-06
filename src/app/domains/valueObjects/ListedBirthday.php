<?php
namespace App\domains\valueObjects;

use App\customExceptions\RequiredException;

class ListedBirthday
{
    public string $birth_day;

    public function __construct(string $date)
    {
        if(!$date) {
            throw new RequiredException('生年月日');
        }

        $this->birth_day = $date;
    }

}


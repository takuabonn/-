<?php

namespace App\domains\valueObjects;

class DriverLicense
{
    private ListedName $listedName;
    private ListedBirthday $listedBirthday;
    private ListedAddress $listedAddress;
    private ListedValidDate $listedValidDate; 

    public function __construct(
        ListedName $listedName, 
        ListedBirthday $listedBirthday,
        ListedAddress $listedAddress,
        ListedValidDate $listedValidDate
    ) {
        $this->listedName = $listedName;
        $this->listedBirthday = $listedBirthday;
        $this->listedAddress = $listedAddress;
        $this->listedValidDate = $listedValidDate;
    }

    /**
     * 現住所と記載の住所が一致かつ有効期限内かどうかの確認
     *
     * @return boolean
     */
    public function doIdentityVerification(string $current_address)
    {
        if(!$this->listedAddress->isCurrentAddress($current_address)) {
            return false;
        }
        if(!$this->listedValidDate->isValidDate()) {
            return false;
        }
        return true;
    }

}
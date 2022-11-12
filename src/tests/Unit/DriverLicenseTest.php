<?php

namespace Tests\Unit;

use App\domains\valueObjects\DriverLicense;
use App\domains\valueObjects\ListedAddress;
use App\domains\valueObjects\ListedBirthday;
use App\domains\valueObjects\ListedName;
use App\domains\valueObjects\ListedValidDate;
use PHPUnit\Framework\TestCase;

class DriverLicenseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_isCurrentAddress()
    {
        $name = new ListedName('太郎');
        $birth_day = new ListedBirthday('1998-03-22');
        $address = new ListedAddress('東京都','xxx','xxxx');
        $valid_date = new ListedValidDate('2030-01-22');
        $driverLicense = new DriverLicense(
            $name,
            $birth_day,
            $address,
            $valid_date
        );

        // 現住所と記載住所が一致
        $request_address = '東京都xxxxxxx';
        $this->assertTrue($driverLicense->doIdentityVerification($request_address));

        // 現住所と記載住所が異なる
        $request_address = '東京都xxxxxx';
        $this->assertFalse($driverLicense->doIdentityVerification($request_address));
    }

    public function test_isValid_true()
    {
        $name = new ListedName('太郎');
        $birth_day = new ListedBirthday('1998-03-22');
        $address = new ListedAddress('東京都','xxx','xxxx');

        // 有効期限内
        $valid_date = new ListedValidDate('2030-01-22');
        $driverLicense = new DriverLicense(
            $name,
            $birth_day,
            $address,
            $valid_date
        );
        $request_address = '東京都xxxxxxx';
        $this->assertTrue($driverLicense->doIdentityVerification($request_address));
    }

    public function test_isValid_false()
    {
        $name = new ListedName('太郎');
        $birth_day = new ListedBirthday('1998-03-22');
        $address = new ListedAddress('東京都','xxx','xxxx');

        // 有効期限を過ぎている
        $valid_date = new ListedValidDate('2022-11-01');
        $driverLicense = new DriverLicense(
            $name,
            $birth_day,
            $address,
            $valid_date
        );
        $request_address = '東京都xxxxxxx';
        $this->assertFalse($driverLicense->doIdentityVerification($request_address));
    }
}

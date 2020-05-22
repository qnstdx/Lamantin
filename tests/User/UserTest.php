<?php

namespace User;

use Exception;
use Lamantin\App\models\Home;
use Lamantin\App\models\Login;
use Lamantin\App\models\Register;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package User
 */
class UserTest extends TestCase
{
    /**
     *
     */
    public function setUp(): void {}

    /**
     * @dataProvider countEmailsProvider
     */
    public function testCountEmails($email)
    {
        (new Login())->count($email);
    }

    /**
     * @return string[]
     */
    public function countEmailsProvider()
    {
        return [
            'email' => 'superduperproger@gmail.com'
        ];
    }
}
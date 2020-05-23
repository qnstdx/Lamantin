<?php

namespace Lamantin\Tests\Unit;

use Lamantin\App\models\tables\Users;
use Lamantin\Tests\CreateApplication;
use PHPUnit\Framework\TestCase;

/**
 * Class ExampleTest
 * @package Unit
 */
class UserTest extends TestCase
{
    use CreateApplication;

    private $email;

    private $password;

    private $token;

    /**
     * Create test user.
     * @return void
     * @throws \Exception
     */
    public function setUp(): void
    {
        $this->create();

        $this->email = 'testuser@gmail.com';
        $this->password = password_hash('TestPassword', PASSWORD_DEFAULT);
        $this->token = md5($this->email . $this->password . time());

        Users::create([
            'username' => 'TestUser',
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->password
        ]);

        $user = Users::where('token', $this->email)->get()->toArray();
        $this->assertEmpty($user);
    }

    /**
     * @throws \Exception
     * @return void
     */
    public function testUserData(): void
    {
        $user = Users::where('email', '=', $this->email)->first();

        $this->assertNotEmpty($user);

        $this->assertEquals($this->email, $user->email);
        $this->assertEquals($this->password, $user->password);
        $this->assertEquals($this->token, $user->token);
    }

    /**
     * Delete created test user.
     * @return void
     */
     public function tearDown(): void
     {
         Users::where('token', '=', $this->token)->delete();
     }
}
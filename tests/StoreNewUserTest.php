<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;

class StoreNewUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    /*
$response->getContent()
$response->status()
     */
    public function testStoreOk()
    {

        $response = $this->call('POST', '/user', [
          'name' => 'Martha',
          'last_name' => 'Sanchez',
          'user_name' => 'martha',
          'email' => 'martha@hotmail.com',
          'password' => '123456',
          'password_confirmation' => '123456'

        ]);

        $this->assertEquals(302, $response->status());
        $this->seeInDatabase('users', [
          'email' => 'martha@hotmail.com'
        ]);
    }

    public function testStoreErrorData()
    {
      $response = $this->call('POST', '/user', [
        'name' => 'Martha',
        'last_name' => 'Sanchez',
        'user_name' => 'martha',
        'email' => 'marthahotmail.com',
        'password' => '123456',
        'password_confirmation' => '1236'

      ]);
      $this->assertEquals(302, $response->status());
      $this->notSeeInDatabase('users', [
        'email' => 'martha@hotmail.com'
      ]);
    }

    public function testStoreErrorMissingFieldFill()
    {
      $response = $this->call('POST', '/user', [
        'name' => '',
        'last_name' => 'Sanchez',
        'user_name' => '',
        'email' => 'martha@hotmail.com',
        'password' => '123456',
        'password_confirmation' => '123456'

      ]);

      $this->assertEquals(302, $response->status());
      $this->notSeeInDatabase('users', [
        'email' => 'martha@hotmail.com'
      ]);
    }
}

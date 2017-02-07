<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     use DatabaseMigrations;
     use DatabaseTransactions;

    public function testLoginUser()
    {
      $this->call('POST', '/user', [
        'name' => 'Martha',
        'last_name' => 'Sanchez',
        'user_name' => 'martha',
        'email' => 'martha@hotmail.com',
        'password' => '12345678',
        'password_confirmation' => '12345678'

      ]);

        $response = $this->call('POST', '/login', [
          'user_name' => 'martha',
          'password' => '12345678'
        ]);

        $this->assertEquals(302, $response->status());
        $this->assertEquals(URL::to('manager'), $response->getTargetUrl());
    }

  public function testErrorUserLoginUser()
    {
      $this->call('POST', '/user', [
        'name' => 'Martha',
        'last_name' => 'Sanchez',
        'user_name' => 'martha',
        'email' => 'martha@hotmail.com',
        'password' => '123456',
        'password_confirmation' => '123456'

      ]);

        $response = $this->call('POST', '/login', [
          'user_name' => 'Carla',
          'password' => '123456'
        ]);


        $this->assertEquals(302, $response->status());
        $this->assertEquals(URL::to('/'), $response->getTargetUrl());
    }

    public function testErrorPasswordLoginUser()
    {
      $this->call('POST', '/user', [
        'name' => 'Martha',
        'last_name' => 'Sanchez',
        'user_name' => 'martha',
        'email' => 'martha@hotmail.com',
        'password' => '123456',
        'password_confirmation' => '123456'

      ]);

        $response = $this->call('POST', '/login', [
          'user_name' => 'martha',
          'password' => '1234'
        ]);

        $this->assertEquals(302, $response->status());
        $this->assertEquals(URL::to('/'), $response->getTargetUrl());
    }
}

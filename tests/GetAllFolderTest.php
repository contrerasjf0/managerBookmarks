<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetAllFolderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testExample()
    {
        $this->truncateTable();

        $user = factory('App\User', 1)->create();

        $folders = factory('App\Folder', 5)->create([
            'user_id' => $user->id
        ]);

       $this->be($user);

        $res = $this->json('GET', 'api/v1/folder')->seeJsonEquals($folders->toArray());
    }
}

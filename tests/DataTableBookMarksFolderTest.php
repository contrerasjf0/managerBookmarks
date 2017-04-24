<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataTableBookMarksFolderTest extends TestCase
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

        $folder = factory('App\Folder', 1)->create([
            'user_id' => $user->id
        ]);

        $bookMarks = factory('App\BookMark', 30)->create([
            'folder_id' => $folder->id,
            'user_id' => $user->id
        ]);

        
        factory('App\BookMark', 30)->create([
            'folder_id' => 0,
            'user_id' => $user->id
        ]);

        $bookMarksAtributs = $bookMarks->map(function ($item, $key) {
            return array($item->id, $item->name, $item->url, $item->note);
        });

        $this->be($user);

        
        $res = $this->json('GET', 'api/v1/bookmark/'.$folder->id.'/listbookmark');
        $res->assertResponseStatus(200);
        //$this->assertEquals(200, $res->response->status());
        $res->seeJsonStructure([
            'draw',
            'recordsTotal',
            'recordsFiltered',
            'data',
            'queries',
            'input'
        ]);
        $jsonDataTabla = json_decode($res->response->getContent());
        
        $this->assertEquals($jsonDataTabla->data, $bookMarksAtributs->toArray());

    }
}

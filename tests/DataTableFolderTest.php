<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataTableFolderTest extends TestCase
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

        $folders = factory('App\Folder', 20)->create([
            'user_id' => $user->id
        ]);

        $folderAtributes = $folders->map(function ($item, $key){
            return array($item->id, $item->name, $item->description);
        });

        $this->be($user);

        $res = $this->json('GET', 'api/v1/folder/list');
        
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
        
        $this->assertEquals($jsonDataTabla->data, $folderAtributes->toArray());
    }
}

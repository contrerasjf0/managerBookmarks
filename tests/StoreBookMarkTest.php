<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\BookMark;
use App\Tag;
use App\Folder;

class StoreBookMarkTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseMigrations;

   public function testStoreAllOk()
    {
        $this->truncateTable();
        $user = factory('App\User', 1)->create();
        $folder = factory('App\Folder', 1)->create([
            'user_id' => $user->id
        ]);
        

        $this->be($user);

        $data = [
            'name' => 'Tests PHP',
            'folder_id' => $folder->id,
            'url' => 'http://wwww.google.com',
            'note' => 'Como realizar pruebas php',
            'tags' => [
                'test',
                'PHP',
                'pruebas'
            ],
            
        ];
        
       $this->json('POST', 'api/v1/bookmark', $data)->seeJsonStructure([
            'id'
        ])->seeJsonEquals([
            'id' => 1
        ]);

        $this->seeInDatabase('book_marks', [
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'url' => $data['url'],
            'note' => $data['note']
        ]);

        $this->seeInDatabase('tags', [
            [['name' => 'test'],
            ['name' => 'PHP'],
            ['name' => 'pruebas']]
        ]);


       
    }

    public function testStoreOkNotRequire(){

        $this->truncateTable();

        $user = factory('App\User', 1)->create();


        $this->be($user);

         $data = [
            'name' => '',
            'folder_id' => 0,
            'url' => 'http://wwww.google.com',
            'note' => '',
            'tags' => [],     
        ];

        $res = $this->json('POST', 'api/v1/bookmark', $data)
             ->seeJsonStructure([
                 'id'
             ])
             ->seeJsonEquals([
                 'id' => 1
             ]);
        $this->seeInDatabase('book_marks',[
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'url' => $data['url'],
            'note' => $data['note']
        ]);


    }

    public function testStoreErrorRequire(){

        $this->truncateTable();

        $user = factory('App\User', 1)->create();

        $this->be($user);

         $data = [
            'name' => 'Less tutoria',
            'folder_id' => 0,
            'url' => '',
            'note' => 'Tutorial sobre less',
            'tags' => [
                'Css',
                'Less'
            ],     
        ];

        $this->json('POST', 'api/v1/bookmark', $data)
             ->seeJsonStructure([
                 'url'
             ]);

        $this->dontSeeInDatabase('book_marks',[
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'note' => $data['note']
        ]);

        $this->dontSeeInDatabase('tags', [[
            ['name' => $data['tags'][0]],
            ['name' => $data['tags'][1]]]
        ]);

    }

    public function testStoreErrorName(){

        $this->truncateTable();

        $user = factory('App\User', 1)->create();

        $this->be($user);

         $data = [
            'name' => 'Noskghkdhgkshgkhgkdshgksdhgksgkdhgkhkgddfhdgdgdgdgdgdgfgdgfdskgkghkhgks',
            'folder_id' => 0,
            'url' => 'www.unocero.com',
            'note' => 'Tutorial sobre less',
            'tags' => [
                'Css',
                'Less'
            ],     
        ];

        $this->json('POST', 'api/v1/bookmark', $data)
             ->seeJsonStructure([
                 'name'
             ]);

        $this->dontSeeInDatabase('book_marks',[
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'note' => $data['note']
        ]);

        $this->dontSeeInDatabase('tags', [[
            ['name' => $data['tags'][0]],
            ['name' => $data['tags'][1]]]
        ]);

    }

    public function testStoreErrorTag(){

        $this->truncateTable();

        $user = factory('App\User', 1)->create();

        $this->be($user);

         $data = [
            'name' => 'Noticas Tec',
            'folder_id' => 0,
            'url' => 'http://www.unocero.com',
            'note' => 'Tutorial sobre less',
            'tags' => "SDSDSGSD",     
        ];

       $this->json('POST', 'api/v1/bookmark', $data)        
             ->seeJsonStructure([
                 'tags'
             ]);

        $this->dontSeeInDatabase('book_marks',[
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'url' => $data['url'],
            'note' => $data['note']
        ]);

    }

    public function testStoreErrorNote(){

      
        $this->truncateTable();
        $user = factory('App\User', 1)->create();

        $this->be($user);

         $data = [
            'name' => 'Noticas Tec',
            'folder_id' => 0,
            'url' => 'http://www.unocero.com',
            'note' => 'Tutorakhfkashdfkshfksahkfdskfdaskfhkashfkasfkasfkasfkaskfassakfaskdgskdksfhskdfskfksfksfksfksfksfsfksnfsknfksnfsnfksfnskfnskfkassfkashfkshkfashkfhsakfkasbvbvieruitywqrqwtoqwbdsadfasjfgasfgwetgiwtriwyrwrhkhfksdfkasbdvksbgbskgbakakgrityreruiwehirhgkdsgfdsbgffsdgkfdsgfhtrytretydgnksgfsrtyeoywroetrewtvsial sobre less',
            'tags' => [],     
        ];

       $this->json('POST', 'api/v1/bookmark', $data)        
             ->seeJsonStructure([
                 'note'
             ]);

        $this->dontSeeInDatabase('book_marks',[
            'name' => $data['name'],
            'folder_id' => $data['folder_id'],
            'url' => $data['url'],
            'note' => $data['note']
        ]);

    }
}

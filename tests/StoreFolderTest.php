<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class StoreFolderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    use DatabaseMigrations;

    public function testStoreOk()
    {   

        factory('App\User', 1)->create();

        $user = User::first();

        $this->be($user);

        $data = [
            'name' => 'Recetas de cocina',
            'description' => 'Folder para guardar puras url de recetas de comida', 
            'user_id' => 1
        ];

        $this->json('POST', 'api/v1/folder', $data )->seeJsonStructure([
                 'id'
        ])->seeJsonEquals([
                 'id' => 1
            ]);
        $this->seeInDatabase('folders', [
            'name' => $data['name'],
            'description' => $data['description'],
            'user_id' => $data['user_id']
        ]);
        
    }

    public function testStoreErrorNoName(){
        factory('App\User', 1)->create();

        $user = User::first();

        $this->be($user);

        $data = [
            'name' => '',
            'description' => 'Folder para guardar puras url de recetas de omida', 
            'user_id' => 1
        ];

        $response = $this->json('POST', 'api/v1/folder', $data );
        
        $response->seeJsonStructure([
                 'name'
        ]);
        
        $response->assertResponseStatus(422);

        $this->notSeeInDatabase('folders',[
            'name' => '',
            'user_id' => $data['user_id']
        ]);
      
    }

    public function testStoreErrorLengtMaxName(){
        factory('App\User', 1)->create();

        $user = User::first();

        $this->be($user);

        $data = [
            'name' => 'kdhkfhskksgkgksgsgkshgkhgkhfkahkfaskfaksfkasfkashfkashfkashfkaghksahfkdfgdgffgdfdgsdhfashfkashfkashfashfka',
            'description' => 'Folder para guardar puras url de recetas de comida', 
            'user_id' => 1
        ];

        $response = $this->json('POST', 'api/v1/folder', $data );
        
        $response->seeJsonStructure([
                 'name'
        ]);
        
        $response->assertResponseStatus(422);

        $this->notSeeInDatabase('folders',[
            'name' => '',
            'user_id' => $data['user_id']
        ]);
      
    }

    public function testStoreErrorLengtMaxDescription(){
        factory('App\User', 1)->create();

        $user = User::first();

        $this->be($user);

        $data = [
            'name' => 'Folde de prueba',
            'description' => 'kdhkfhskksghfhfhfhfhfhfhfhfhffyyryyryrryryyyyryryryryryryryryryyfhfkgksgsgkshgkhgkhfkahkfaskfaksfkasfkashfkashfkashfkaghksahfkdfgdgffgdfdgsdhfashfkashfkashfashfkagiaogjaldfjalsfjlasjflasjflasjlfalfdaslfjlasfjlasjflsjgasnvnsdkaksgksahfkshfkashfittyqwhofhsfhaskhgfkasgfasfasjfgjasgfjasgfdjasgfasgfsagfjasgfjsagfajsfgasjfg', 
            'user_id' => 1
        ];

        $response = $this->json('POST', 'api/v1/folder', $data );
        
        $response->seeJsonStructure([
                 'description'
        ]);
        
        $response->assertResponseStatus(422);

        $this->notSeeInDatabase('folders',[
            'name' => $data['name'],
            'user_id' => $data['user_id']
        ]);
      
    }

}

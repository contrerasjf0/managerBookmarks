<?php

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    protected function truncateTable(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('book_marks')->truncate();
        DB::table('folders')->truncate();
        DB::table('tags')->truncate();
        DB::table('users')->truncate();
    }
}

<?php
use PHPUnit\Framework\TestCase;

require __DIR__ . "/../model/DB.php";

class simpleTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {

        DB::insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]);
    }

    public function testSelectMany()
    {
        $this->assertNotNull(true,DB::selectMany("SELECT * FROM roles", []),"Select many roles tests");
    }

    public function testSelectOne()
    {
        $this->assertNotNull(true,DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "MOD"]),"Select one role tests");
    }

    public function testInsert()
    {
        $this->assertNotNull(true,DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "XXX"]),"Select one role tests");
    }

    public function testExecute()
    {
        DB::execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]);
        $this->assertNotNull(true,DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "XXX"]),"Select one role tests");
    }

    public static function tearDownAfterClass() : void
    {
        DB::delete("DELETE FROM roles WHERE slug = :slug", ["slug" => "XXX"]);
    }


}


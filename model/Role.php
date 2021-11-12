<?php

namespace TeamBuilder\Model;

class Role
{

    public $id = null;
    public $name;
    public $slug;

    public function __construct()
    {
    }

    public function create(): bool
    {
        $check = DB::selectOne("SELECT * FROM roles WHERE slug = :slug", ['slug' => $this->slug]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DB::insert("INSERT INTO roles(id, slug, name) VALUES (:id, :name, :slug)", ['id' => $this->id, 'name' => $this->name, 'slug' => $this->slug]);

        return true;
    }

    static function make(array $params)
    {
        $role = new Role();

        if (isset($params['id'])) {
            $role->id = $params['id'];
        }

        $role->name = $params['name'];
        $role->slug = $params['slug'];

        return $role;
    }

    static function all(): array
    {
        $res = DB::selectMany("SELECT * FROM roles ", []);
        $return = [];
        foreach ($res as $result) {
            $return[] = Role::make($result);
        }
        return $return;
    }

    static function find(int $id): ?Role
    {
        $res = DB::selectOne("SELECT * FROM roles where id = :id", ['id' => $id]);

        // Si il n'y a rien, return null
        if (!isset($res[0])) {
            return null;
        }

        $res = $res[0];
        return self::make(['id' => $res['id'], 'name' => $res['name'], 'slug' => $res['slug']]);
    }

    public function save(): bool
    {
        $check = DB::selectOne("SELECT * FROM roles WHERE name = :name", ['name' => $this->name]);
        // si il n'est pas vide, alors return false, car le nom sera dupliqué
        if (!empty($check)) {
            return false;
        }

        return DB::execute("UPDATE roles set name = :name, slug = :slug WHERE id = :id", ['id' => $this->id, 'name' => $this->name, 'slug' => $this->slug]);
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DB::execute("DELETE FROM roles WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
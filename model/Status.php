<?php

namespace TeamBuilder\Model;

class Status
{

    public $id = null;
    public $name;
    public $slug;

    public function __construct()
    {
    }

    public function create(): bool
    {
        $check = DB::selectOne("SELECT * FROM status WHERE slug = :slug", ['slug' => $this->slug]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DB::insert("INSERT INTO status(id, slug, name) VALUES (:id, :name, :slug)", ['id' => $this->id, 'name' => $this->name, 'slug' => $this->slug]);

        return true;
    }

    static function make(array $params)
    {
        $status = new Status();

        if (isset($params['id'])) {
            $status->id = $params['id'];
        }

        $status->name = $params['name'];
        $status->slug = $params['slug'];

        return $status;
    }

    static function all(): array
    {
        $res = DB::selectMany("SELECT * FROM status ", []);
        $return = [];
        foreach ($res as $result) {
            $return[] = Status::make($result);
        }
        return $return;
    }

    static function find(int $id): ?Status
    {
        $res = DB::selectOne("SELECT * FROM status where id = :id", ['id' => $id]);

        // Si il n'y a rien, return null
        if (!isset($res[0])) {
            return null;
        }

        $res = $res[0];
        return self::make($res);
    }

    public function save(): bool
    {
        $check = DB::selectOne("SELECT * FROM status WHERE name = :name", ['name' => $this->name]);
        // si il n'est pas vide, alors return false, car le nom sera dupliqué
        if (!empty($check)) {
            return false;
        }

        return DB::execute("UPDATE status set name = :name, slug = :slug WHERE id = :id", ['id' => $this->id, 'name' => $this->name, 'slug' => $this->slug]);
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DB::execute("DELETE FROM status WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
<?php

namespace TeamBuilder\Model;

class Team
{
    public $id = null;
    public $name;
    public $state_id;

    public function __construct()
    {
    }

    public function create(): bool
    {
        $check = DB::selectOne("SELECT * FROM teams WHERE NAME = :name", ['name' => $this->name]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DB::insert("INSERT INTO teams(id, name,state_id) VALUES (:id, :name, :state_id)", ['id' => $this->id, 'name' => $this->name, 'state_id' => $this->state_id]);

        return true;
    }

    static function make(array $params)
    {
        $team = new Team();

        if (isset($params['id'])) {
            $team->id = $params['id'];
        }

        $team->name = $params['name'];
        $team->state_id = $params['state_id'];

        return $team;
    }

    static function all(): array
    {
        $res = DB::selectMany("SELECT * FROM teams ", []);
        $return = [];
        foreach ($res as $result) {
            $return[] = Team::make($result);
        }
        return $return;
    }

    static function find(int $id): ?Team
    {
        $res = DB::selectOne("SELECT * FROM teams where id = :id", ['id' => $id]);

        // Si il n'y a rien, return null
        if (!isset($res[0])) {
            return null;
        }

        $res = $res[0];
        return self::make(['id' => $res['id'], 'name' => $res['name'], 'state_id' => $res['state_id']]);
    }

    static function where($field,$value): array
    {
        $result = DB::selectMany("select * from teams where $field = :value;",["value"=>$value]);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make(["id" => $res["id"], "name" => $res['name'], "state_id" => $res['state_id']]);
        }
        return $return;
    }

    public function save(): bool
    {
        $check = DB::selectOne("SELECT * FROM teams WHERE name = :name", ['name' => $this->name]);
        // si il n'est pas vide, alors return false, car le nom sera dupliqué
        if (!empty($check)){
            return false;
        }

        return DB::execute("UPDATE teams set name = :name, state_id = :state_id WHERE id = :id", ['id' => $this->id, 'name' => $this->name, 'state_id' => $this->state_id]);
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DB::execute("DELETE FROM teams WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function members(): array
    {
        $res = DB::selectMany("SELECT members.id, role_id, is_captain, members.name FROM teams INNER JOIN team_member ON teams.id = team_member.team_id INNER JOIN members ON team_member.member_id = members.id WHERE team_id = :member_id", ["member_id" => $this->id]);
        $return = [];
        foreach ($res as $result) {
            $return[] = Member::make($result);
        }
        return $return;
    }

}
<?php

namespace TeamBuilder\Model;

use TeamBuilder\Model\DB;

class Member
{
    public $id = null;
    public $name;
    public $password;
    public $role_id;
    public $status_id;
    public $statu;
    public $role;
    public $is_captain;

    public function __construct()
    {
    }

    public function create(): bool
    {
        $check = DB::selectOne("SELECT * FROM members WHERE name = :name", ['name' => $this->name]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DB::insert("INSERT INTO members(id, name,password,role_id) VALUES (:id, :name, :password, :role_id)", ['id' => $this->id, 'name' => $this->name, 'password' => $this->name . "'s_Pa$\$w0rd", 'role_id' => $this->role_id]);

        return true;
    }

    static function make(array $params)
    {
        $member = new Member();

        if (isset($params['id'])) {
            $member->id = $params['id'];
        }

        $member->name = $params['name'];
        $member->role_id = $params['role_id'];
        $member->status_id = $params['status_id'];
        $member->role = $member->role();
        $member->statu = $member->statu();


        if(isset($params['is_captain'])){
            $member->is_captain = $params['is_captain'];
        }

        return $member;
    }

    static function all(): array
    {
        $res = DB::selectMany("SELECT * FROM members ORDER BY name ASC", []);
        $return = [];
        foreach ($res as $result) {
            $return[] = Member::make($result);
        }
        return $return;
    }

    static function where($field, $value): array
    {
        $res = DB::selectMany("select * from members where $field = :value;", ["value" => $value]);
        $return = [];
        foreach ($res as $result) {
            $return[] = Member::make($result);
        }
        return $return;
    }

    static function find(int $id): ?Member
    {
        $res = DB::selectOne("SELECT * FROM members where id = :id", ['id' => $id]);

        // Si il n'y a rien, return null
        if (!isset($res[0])) {
            return null;
        }

        $res = $res[0];
        return self::make($res);


    }

    public function save(): bool
    {
        $check = DB::selectOne("SELECT * FROM members WHERE name = :name", ['name' => $this->name]);
        // TODO le nom peut encore exister
        if (empty($check)) {
            return false;
        }

        return DB::execute("UPDATE members set name = :name, role_id = :role_id WHERE id = :id", ['id' => $this->id, 'name' => $this->name, 'role_id' => $this->role_id]);
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DB::execute("DELETE FROM members WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }


    public function teams(): array
    {
        $res = DB::selectMany("SELECT teams.id, teams.name, state_id FROM members INNER JOIN team_member ON members.id = team_member.member_id INNER JOIN teams ON team_member.team_id = teams.id WHERE members.id = :member_id ORDER BY teams.name ASC", ["member_id" => $this->id]);
        $return = [];
        foreach ($res as $result) {
            $return[] = Team::make($result);
        }
        return $return;
    }

    public function role(): Role
    {
        $res = DB::selectOne("SELECT roles.id, roles.name, roles.slug FROM members INNER JOIN roles ON roles.id = members.role_id WHERE roles.id = :role_id", ["role_id" => $this->role_id]);
        $return = "";
        foreach ($res as $result) {
            $return = Role::make($result);
        }
        return $return;
    }

    public function statu(): Status
    {
        $res = DB::selectOne("SELECT status.id, status.name, status.slug FROM members INNER JOIN status ON status.id = members.status_id WHERE status.id = :status_id", ["status_id" => $this->status_id]);
        $return = "";
        foreach ($res as $result) {
            $return = Status::make($result);
        }
        return $return;
    }


}
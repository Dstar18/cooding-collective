<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserAccount extends Model
{
    protected $table = 'user_accounts';
    protected $primaryKey = 'id';
    protected $fillable = ['employee_id', 'create_date', 'status'];

    public function createUser(array $params)
    {
        $query = DB::table($this->table)->insert($params);
        return $query;
    }

    public function updateUser(array $params, $employee_id)
    {
        $query = DB::table($this->table)
            ->where('employee_id', $employee_id)
            ->update($params);
        return $query;
    }
}

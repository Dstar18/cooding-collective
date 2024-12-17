<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    protected $table = 'employees';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'dob', 'city', 'email'];

    public function getList(array $params = [])
    {
       $limit = $params['limit'] ?? 10;
       $page = $params['page'] ?? 1;
       
       return DB::table($this->table)
            -> join('user_accounts', 'employees.id', '=', 'user_accounts.employee_id')
            ->select(
                'employees.id',
                'employees.name',
                'employees.dob',
                'employees.city',
                'employees.email',
                'user_accounts.employee_id',
                'user_accounts.create_date',
                'user_accounts.status'
            )
            ->orderBy('employees.id', 'desc')
            ->paginate($limit, null, 'page', $page);
    }

    public function getId($id)
    {
        return DB::table($this->table)
            ->join('user_accounts', 'employees.id', '=', 'user_accounts.employee_id')
            ->select(
                'employees.*',
                'user_accounts.employee_id',
                'user_accounts.create_date',
                'user_accounts.status'
            )
            ->where('employees.id', $id)
            ->first();
    }

    public function createEmployee(array $params)
    {
        $query = DB::table($this->table)->insertGetId($params);
        return $query;
    }

    public function updateEmployee(array $params, $id)
    {
        $query = DB::table($this->table)
            ->where('id', $id)
            ->update($params);
        return $query;
    }

    public function auth($email, $password)
    {
        $query = DB::table($this->table)
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        return $query;
    }
    
}

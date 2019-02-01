<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    public $timestamps = false;
    protected $guarded = [];
    
    public function saveUserData($data) {
    	if (empty($data)) {
    		$data = array();
    	}

    	return User::updateOrCreate(array('id'=> $data['id'],'manager' => $data['manager']),$data);
    }

    public function fetchAll($query=null) {
    	return User::get();
    }

    public function hierarchy($user=null) {
        $query = DB::table('users as u1')
            ->select('u1.id as user_id', 
                    'u1.email as employee_mail',
                    'u2.email as manager1_mail',
                    'u3.email as manager2_mail',
                    'u4.email as manager3_mail',
                    'g.name as group_name',
                    DB::raw('group_concat(p.permission) as permissions'))
            ->leftJoin('users as u2','u1.manager','=','u2.id')
            ->leftJoin('users as u3','u2.manager','=','u3.id')
            ->leftJoin('users as u4','u3.manager','=','u4.id')
            ->leftJoin('user_groups as ug','u1.id','=','ug.user_id')
            ->leftJoin('groups as g','ug.group_id','=','g.id')
            ->leftJoin('group_permissions as gp', 'gp.group_id', '=', 'g.id')
            ->leftJoin('permissions as p', 'p.id', '=', 'gp.permission_id')
            ->groupBy('u1.id','u1.email','u2.email','u4.email', 'group_name');

        if (!empty($user)) 
            $query->where('u1.id','=',$user);
            
        return $query->get(); 
    }
}

// select  u1.id as user_id, 
//         u1.email as employee_mail, 
//         u2.email as manager1_mail,
//         u3.email as manager2_mail,
//         u4.email as manager3_mail,
//         g.name as `group`,
//         group_concat(p.permission) as permissions
// from users u1
// left join users u2 on u1.manager = u2.id
// left join users u3 on u2.manager = u3.id
// left join users u4 on u3.manager = u4.id
// join user_groups ug on ug.user_id = u1.id
// join groups g on ug.group_id = g.id
// join group_permissions gp on gp.group_id = g.id
// join permissions p on p.id = gp.permission_id
// where u1.id = 5
// group by u1.id, u1.email,u2.email, u3.email, u4.email, g.`name` 
// order by u1.id;
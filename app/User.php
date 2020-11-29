<?php

namespace App;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Database\Eloquent\SoftDeletes;
use App\helper\ViewBuilder;

class User extends Authenticatable {

    use SoftDeletes;
    use Notifiable;
    

    /**
     * table name of user model
     *
     * @var type
     */
    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'name',
        'sms_code',
        'active',
        'phone',
        'password',
        'level_id',
        'type',
        'set_number',
        'account_confirm',
        'department_id',
        'national_id',
        'role_id',
        'graduated',
        'api_token',
        'can_see_result'
    ];
    
    public $appends = [
        'online_exam',
        'online_research',
        'online_lms'
    ];
    
    public function getOnlineExamAttribute() {
        return "http://exam.seyouf.sphinxws.com/remote?api_token=" . $this->api_token;
    }
    
    public function getOnlineResearchAttribute() {
        return "http://research.seyouf.sphinxws.com/remote?api_token=" . $this->api_token;
    }
    
    public function getOnlineLmsAttribute() {
        return "http://lms.seyouf.sphinxws.com/remote?api_token=" . $this->api_token;
    }

    public function notifications() {
        return DB::table('notifications')->where('user_id', $this->id);
    }

    public function loginHistories() {
        return DB::table('login_histories')->where('user_id', $this->id);
    }

    public function _can($permissionName) {
        return true;
    }
    

    /**
     * build view object this will make view html
     *
     * @return ViewBuilder
     */
    public function getViewBuilder() {
        $builder = new ViewBuilder($this, "rtl");

        $builder->setAddRoute(url('/dashboard/user/store'))
                ->setEditRoute(url('/dashboard/user/update') . "/" . $this->id)
                ->setCol(["name" => "id", "label" => __('id'), "editable" => false])
                ->setCol(["name" => "name", "label" => __('name')])
                ->setCol(["name" => "username", "label" => __('username')])
                ->setUrl(url('/image/users'))
                ->build();

        return $builder;
    }

}

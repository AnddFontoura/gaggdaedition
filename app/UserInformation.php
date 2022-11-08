<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInformation extends Model
{
    use SoftDeletes;

    protected $table = "users_informations";
    
    public $fillable = [
        'user_id',
        'cpf',
        'phone',
        'payment_receipt',
        'birthday',
        'payment_approved',
    ];
    
    public function userData()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

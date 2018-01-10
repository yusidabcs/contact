<?php namespace Modules\Contact\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $table = 'contact__contacts';
    protected $fillable = [

    	'first_name',
    	'last_name',
    	'email',
    	'phone',
    	'message',
    	'reply_to'
    ];

    public function scopeMain($query)
    {
        return $query->where('reply_to', null)->orWhere('reply_to', 0)->orderBy('created_at','desc');
    }

    public function replys()
    {
        return $this->hasMany(Contact::class,'reply_to');
    }

    public function last_replys()
    {
        return $this->hasOne(Contact::class,'reply_to')->orderBy('created_at','desc');
    }
}

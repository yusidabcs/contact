<?php namespace Modules\Contact\Repositories\Eloquent;

use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Mail;

class EloquentContactRepository extends EloquentBaseRepository implements ContactRepository
{

	public function main(){
		return $this->model->main()->get();
	}
	public function update($model,$data){
		$model->update([
			'status' => 1
			]);

		$reply = $this->model->create([
			'message' => $data['message'],
			'reply_to' => $model->id,
			]);
        //mail send
		$rs = Mail::send('contact::email', ['reply' => $reply], function ($m) use ($model) {
            $m->from(setting('contact::email'), setting('contact::name'));
            $m->to($model->email, $model->first_name)->subject(setting('contact::subject'));
        });
      
        return $model;
	}
}

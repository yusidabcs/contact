<?php namespace Modules\Contact\Http\Controllers;


use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use \ReCaptcha\ReCaptcha;

class ContactController extends AdminBaseController
{
    /**
     * @var ContactRepository
     */
    private $contact;

    public function __construct(ContactRepository $contact)
    {
        parent::__construct();

        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function post(Request $request)
    {

    	if(setting('contact::security') == 1){
            $recaptcha = new ReCaptcha(setting('contact::site-secret'));
            $gRecaptchaResponse = $request->get('g-recaptcha-response');
            $resp = $recaptcha->verify($gRecaptchaResponse, $request->server('REMOTE_ADDR'));
            if ($resp->isSuccess()) {
                
                $contact = $this->contact->create($request->all());

                Mail::send('emails.contact', ['contact' => $contact], function ($m) use ($contact) {
                    $m->from($contact->email,$contact->first_name);
                    $m->to(setting('contact::email'), setting('contact::name'))->subject(setting('contact::subject'));
                });

                flash()->success(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));
                return redirect()->back();
            } else {        
                
                flash()->error('Security message error.');
                return redirect()->back();
            }

        }else{

            $contact = $this->contact->create($request->all());

            Mail::send('emails.contact', ['contact' => $contact], function ($m) use ($contact) {
                $m->from($contact->email,$contact->first_name);
                $m->to(setting('contact::email'), setting('contact::name'))->subject(setting('contact::subject'));

            });

            flash()->success(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));

            return redirect()->back();
        }

    }

    public function custom()
    {
        $rs = Mail::send('emails.message', ['data' => request()->all()], function ($m){
            $m->from(request()->get('email'), request()->get('first_name').' '.request()->get('last_name'));
            $m->to(setting('core::email'))->subject(setting('core::site-name').' - New message');
        });
        flash()->success(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));

        return redirect()->back();
    }

  
}

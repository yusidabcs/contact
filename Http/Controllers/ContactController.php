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

                    $m->to(setting('contact::email'), setting('contact::name'))->subject(setting('contact::subject'));
                });

                flash()->success(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));
                return redirect()->back();
            } else {        
                
                flash()->error(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));
                return redirect()->back();
            }

        }else{

            $contact = $this->contact->create($request->all());

            Mail::send('emails.contact', ['contact' => $contact], function ($m) use ($contact) {

                $m->to(setting('contact::email'), setting('contact::name'))->subject(setting('contact::subject'));
            });
            
            flash()->success(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));
            
            return redirect()->back();
        }
        
    }

  
}

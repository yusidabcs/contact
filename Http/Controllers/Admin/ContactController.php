<?php namespace Modules\Contact\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Contact\Entities\Contact;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

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
    public function index()
    {
        $contacts = $this->contact->main();

        return view('contact::admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contact::admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->contact->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('contact::contacts.title.contacts')]));

        return redirect()->route('admin.contact.contact.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact $contact
     * @return Response
     */
    public function edit(Contact $contact)
    {
        if($contact->read == 0){
            $contact->read = 1;
            $contact->save();
        }
        return view('contact::admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Contact $contact
     * @param  Request $request
     * @return Response
     */
    public function update(Contact $contact, Request $request)
    {
        $this->contact->update($contact, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('contact::contacts.title.contacts')]));

        return redirect()->route('admin.contact.contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact $contact
     * @return Response
     */
    public function destroy(Contact $contact)
    {
        $this->contact->destroy($contact);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('contact::contacts.title.contacts')]));

        return redirect()->route('admin.contact.contact.index');
    }
}

<?php namespace Modules\Contact\Widgets;

use Modules\Contact\Entities\Contact;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Villamanager\Repositories\BookingRepository;
use Modules\Dashboard\Foundation\Widgets\BaseWidget;

class ContactWidget extends BaseWidget
{
    /**
     * @var \Modules\Blog\Repositories\PostRepository
     */
    private $contact;
    public function __construct(ContactRepository $post)
    {
        $this->contact = $post;
    }
    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'ContactWidget';
    }
    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'contact::widgets.contact';
    }
    /**
     * Get the widget data to send to the view
     * @return string
     */
    protected function data()
    {

        return ['total' => $this->contact->pendingMessage()];
    }
    /**
     * Get the widget type
     * @return string
     */
    protected function options()
    {
        return [
            'width' => '3',
            'height' => '2',
            'x' => '6',
            'y' => 3
        ];
    }
}
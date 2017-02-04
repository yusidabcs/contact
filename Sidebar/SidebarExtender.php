<?php namespace Modules\Contact\Sidebar;

use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('contact::contacts.title.contacts'), function (Item $item) {
                $item->icon('fa fa-comments');
                $item->weight(7);
                $item->route('admin.contact.contact.index');
                $item->badge(function (Badge $badge, ContactRepository $contacts) {
                    $badge->setClass('bg-green');
                    $badge->setValue($contacts->pendingMessage());
                });
                $item->authorize(
                    $this->auth->hasAccess('contact.contacts.index')
                );
                
            });
        });

        return $menu;
    }
}

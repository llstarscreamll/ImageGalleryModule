<?php

namespace llstarscreamll\ImageGalleryModule\app\Sidebar;

use Maatwebsite\Sidebar\Badge;
use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group('', function (Group $group) {
            $group->item('Galería', function (Item $item) {
                $item->icon('fa fa-image');
                $item->weight(0);
                $item->route('imageGallery.index');
                $item->authorize(
                    \Auth::user()->can('imageGallery.index')
                );
            });
        });

        return $menu;
    }
}

<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        $menuData = $this->buildMenuData('primary_navigation');
        return [
            'siteName' => $this->siteName(),
            'menuImage' => get_field('menu_image', 'option'),
            'menuParents' => $menuData['parents'],
            'menuChildren'=> $menuData['children'],
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    private function buildMenuData($menu_slug)
    {
        $locations = get_nav_menu_locations();
        $menu = $locations[$menu_slug] ?? null;
        $menuItems = [];
        if ($menu) {
            $menuObj = wp_get_nav_menu_object($menu);
            $menuItems = wp_get_nav_menu_items($menuObj->term_id) ?: [];
        }

        $menuCollection = collect($menuItems);

        $parents = $menuCollection->filter(function ($item) {
            return $item->menu_item_parent == '0';
        });

        $children = $menuCollection->filter(function ($item) {
            return $item->menu_item_parent != '0';
        })->groupBy(function ($item) {
            return (string) $item->menu_item_parent;
        });

        return [
            'parents'  => $parents,
            'children' => $children,
        ];
    }
}

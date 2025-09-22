<?php
namespace App\Http\ViewComposers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SidebarComposer
{
    protected $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }

    public function compose(View $view)
    {
        $menus = $this->controller->getMenus();
        $view->with('sidebarMenus', $menus);
    }
}
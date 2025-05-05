<?php

namespace App\Services;

class MenuGenerator
{
    /**
     * Generate a menu based on the given data.
     *
     * @param array $menuData
     * @param string $ulClass
     * @param string $liClass
     * @return string
     */
    public function generate(array $menuData, string $ulClass = '', string $liClass = ''): string
    {
        return $this->buildMenu($menuData, $ulClass, $liClass);
    }

    /**
     * Recursive function to build the menu HTML.
     *
     * @param array $menuData
     * @param string $ulClass
     * @param string $liClass
     * @return string
     */
    private function buildMenu(array $menuData, string $ulClass, string $liClass): string
    {
        $html = "<ul class='{$ulClass}'>";
        
        foreach ($menuData as $menuItem) {
            $html .= "<li class='{$liClass}'>";

            // Add the link or title
            $html .= isset($menuItem['url'])
                ? "<a href='{$menuItem['url']}'>{$menuItem['title']}</a>"
                : $menuItem['title'];

            // Check for submenus
            if (isset($menuItem['children']) && is_array($menuItem['children'])) {
                $html .= $this->buildMenu($menuItem['children'], $ulClass, $liClass);
            }

            $html .= "</li>";
        }
        
        $html .= "</ul>";

        return $html;
    }
}

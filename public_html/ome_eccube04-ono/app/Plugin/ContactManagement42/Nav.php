<?php

namespace Plugin\ContactManagement42;

use Eccube\Common\EccubeNav;

class Nav implements EccubeNav
{
    /**
     * @return array
     */
    public static function getNav()
    {
        return [
            'contact' => [
                'id' => 'contact',
                'name' => 'contact.title',
                'icon' => 'fa-envelope',
                'children' => [
                    'contact' => [
                        'id' => 'contact',
                        'name' => 'admin.contact.index.title',
                        'url' => 'plugin_contact',
                    ],
                    'contact_new' => [
                        'id' => 'contact_new',
                        'name' => 'admin.contact.new.title',
                        'url' => 'plugin_contact_new',
                    ],
                ],
            ],
        ];
    }
}

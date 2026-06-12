<?php

/*
 * This file is part of ProductDisplayRank42
 *
 * Copyright(c) U-Mebius Inc. All Rights Reserved.
 *
 * https://umebius.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ProductDisplayRank42;

use Eccube\Event\TemplateEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Event implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            '@admin/Product/index.twig' => 'onAdminProductIndexTwig',
        ];
    }

    public function onAdminProductIndexTwig(TemplateEvent $event)
    {
        $event->addSnippet('@ProductDisplayRank42/admin/Product/index_js.twig');
    }
}

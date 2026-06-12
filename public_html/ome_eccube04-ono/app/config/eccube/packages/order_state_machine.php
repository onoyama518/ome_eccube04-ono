<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Eccube\Entity\Master\OrderStatus as Status;
use Eccube\Service\OrderStateMachineContext;

$container->loadFromExtension('framework', [
    'workflows' => [
        'order' => [
            'type' => 'state_machine',
            'marking_store' => [
                'type' => 'method'
            ],
            'supports' => [
                OrderStateMachineContext::class,
            ],
            'initial_marking' => (string) Status::NEW,
            'places' => [
                (string) Status::NEW,
                (string) Status::PAID_AWAITING,
                (string) Status::CANCEL,
                (string) Status::IN_PROGRESS,
                (string) Status::DELIVERED,
                (string) Status::PAID,
                (string) Status::PENDING,
                (string) Status::PROCESSING,
                (string) Status::RETURNED,
                (string) Status::AWAITING,
                (string) Status::CANCEL_PENDING,
            ],
            'transitions' => [
                'pay' => [
                    'from' => [(string) Status::NEW, Status::PAID_AWAITING],
                    'to' => (string) Status::PAID,
                ],
                'nyukin_machi' => [
                    'from' => (string) Status::NEW,
                    'to' => (string) Status::PAID_AWAITING,
                ],
                'packing' => [
                    'from' => [(string) Status::NEW, (string) Status::PAID, (string) Status::PAID_AWAITING],
                    'to' => (string) Status::IN_PROGRESS,
                ],
                'awaiting' => [
                    'from' => [(string) Status::NEW, (string) Status::PAID, (string) Status::IN_PROGRESS, (string) Status::PAID_AWAITING],
                    'to' => (string) Status::AWAITING,
                ],
                'cancel' => [
                    'from' => [(string) Status::NEW, (string) Status::PAID, (string) Status::IN_PROGRESS, (string) Status::AWAITING, (string) Status::PAID_AWAITING],
                    'to' => (string) Status::CANCEL,
                ],
                'cancel_pending' => [ // ★追加：決済処理中から注文キャンセル
                    'from' => (string) Status::PENDING,
                    'to' => (string) Status::CANCEL_PENDING,
                ],
                'back_to_in_progress' => [
                    'from' => (string) Status::CANCEL,
                    'to' => (string) Status::IN_PROGRESS,
                ],
                'ship' => [
                    'from' => [(string) Status::NEW, (string) Status::PAID, (string) Status::IN_PROGRESS, (string) Status::AWAITING, (string) Status::PAID_AWAITING],
                    'to' => [(string) Status::DELIVERED],
                ],
                'return' => [
                    'from' => (string) Status::DELIVERED,
                    'to' => (string) Status::RETURNED,
                ],
                'cancel_return' => [
                    'from' => (string) Status::RETURNED,
                    'to' => (string) Status::DELIVERED,
                ],
            ],
        ],
    ],
]);

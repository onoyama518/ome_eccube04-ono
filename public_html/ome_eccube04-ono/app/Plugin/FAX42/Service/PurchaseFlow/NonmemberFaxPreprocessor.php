<?php

/*
 * This file is part of FAX42
 * Copyright(c) U-Mebius Inc. All Rights Reserved.
 *
 * https://umebius.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\FAX42\Service\PurchaseFlow;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Annotation\ShoppingFlow;
use Eccube\Entity\BaseInfo;
use Eccube\Entity\ItemHolderInterface;
use Eccube\Repository\BaseInfoRepository;
use Eccube\Service\OrderHelper;
use Eccube\Service\PurchaseFlow\ItemHolderPreprocessor;
use Eccube\Service\PurchaseFlow\PurchaseContext;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * @ShoppingFlow()
 */
class NonmemberFaxPreprocessor implements ItemHolderPreprocessor
{
    /** @var BaseInfo */
    protected $BaseInfo;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var RequestStack
     */
    protected $requestStack;

    /**
     * DeliveryFeePreprocessor constructor.
     *
     * @throws \Exception
     */
    public function __construct(
        BaseInfoRepository $baseInfoRepository,
        EntityManagerInterface $entityManager,
        RequestStack $requestStack
    ) {
        $this->BaseInfo = $baseInfoRepository->get();
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
    }

    /**
     * @throws \Doctrine\ORM\NoResultException
     */
    public function process(ItemHolderInterface $itemHolder, PurchaseContext $context)
    {
        $request = $this->requestStack->getCurrentRequest();
        // 注文手続きのみ
        if ($request->attributes->get('_route') !== 'shopping') {
            return;
        }

        // Orderの新規登録時のみ
        if (!in_array($itemHolder, $this->entityManager->getUnitOfWork()->getScheduledEntityInsertions(), true)) {
            return;
        }

        $session = $request->getSession();
        $data = $session->get(OrderHelper::SESSION_NON_MEMBER);

        if (empty($data)) {
            return null;
        }

        if (isset($data['fax'])) {
            $itemHolder->setFax($data['fax']);
            foreach ($itemHolder->getShippings() as $shipping) {
                $shipping->setFax($data['fax']);
            }
        }
    }
}

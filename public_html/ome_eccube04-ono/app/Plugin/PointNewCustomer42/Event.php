<?php

namespace Plugin\PointNewCustomer42;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Event\TemplateEvent;
use Eccube\Repository\BaseInfoRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Event implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var BaseInfoRepository
     */
    private $baseInfoRepository;

    public function __construct(
        EntityManagerInterface $entityManager,
        BaseInfoRepository $baseInfoRepository
    ) {
        $this->entityManager = $entityManager;
        $this->baseInfoRepository = $baseInfoRepository;
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            EccubeEvents::FRONT_ENTRY_ACTIVATE_COMPLETE => 'onFrontEntryActivateComplete',
            '@admin/Setting/Shop/shop_master.twig' => 'onAdminSettingShopMasterTwig',
        ];
    }

    public function onFrontEntryActivateComplete(EventArgs $events)
    {
        $BaseInfo = $this->baseInfoRepository->get();
        if ($BaseInfo && $BaseInfo->isOptionPoint() && $BaseInfo->getCustomerRegistrationPoint()) {
            $Customer = $events->getArgument('Customer');
            $Customer->setPoint($BaseInfo->getCustomerRegistrationPoint());
            $this->entityManager->flush();
        }
    }

    /**
     * @param TemplateEvent $event
     */
    public function onAdminSettingShopMasterTwig(TemplateEvent $event)
    {
        $event->addSnippet('@PointNewCustomer42/admin/Setting/Shop/shop_master_point.twig');
    }
}

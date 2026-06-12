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

namespace Customize\Controller;

use Eccube\Entity\Customer;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Customize\Form\Extension\ContactType;
use Eccube\Repository\PageRepository;
use Eccube\Service\MailService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Customize\Util\RecaptchaUtil;

// 以下を追記
use Eccube\Controller\AbstractController;

class ContactController extends AbstractController
{
    private const CONTACT_TYPE_OEM = 'OEMについて';

    /**
     * @var MailService
     */
    protected $mailService;

    /**
     * @var PageRepository
     */
    private $pageRepository;

    /**
     * ContactController constructor.
     *
     * @param MailService $mailService
     * @param PageRepository $pageRepository
     */
    public function __construct(
        MailService $mailService,
        PageRepository $pageRepository)
    {
        $this->mailService = $mailService;
        $this->pageRepository = $pageRepository;
    }

    /**
     * お問い合わせ画面.
     *
     * @Route("/contact", name="contact", methods={"GET", "POST"})
     * @Route("/contact", name="contact_confirm", methods={"GET", "POST"})
     * @Template("Contact/index.twig")
     */
    public function index(Request $request)
    {
        $builder = $this->formFactory->createBuilder(ContactType::class);
        $initialData = [];

        $contactType = $request->query->get('contact_type');
        if ($contactType === self::CONTACT_TYPE_OEM) {
            $initialData['contact_type'] = self::CONTACT_TYPE_OEM;
        }

        if ($this->isGranted('ROLE_USER')) {
            /** @var Customer $user */
            $user = $this->getUser();
            $initialData = array_merge($initialData, [
                'company_name' => $user->getCompanyName(),
                'name01' => $user->getName01(),
                'name02' => $user->getName02(),
                'kana01' => $user->getKana01(),
                'kana02' => $user->getKana02(),
                'postal_code' => $user->getPostalCode(),
                'pref' => $user->getPref(),
                'addr01' => $user->getAddr01(),
                'addr02' => $user->getAddr02(),
                'phone_number' => $user->getPhoneNumber(),
                'email' => $user->getEmail(),
            ]);
        }

        if (!empty($initialData)) {
            $builder->setData($initialData);
        }

        // FRONT_CONTACT_INDEX_INITIALIZE
        $event = new EventArgs(
            [
                'builder' => $builder,
            ],
            $request
        );
        $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_CONTACT_INDEX_INITIALIZE);

        $form = $builder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            switch ($request->get('mode')) {
                case 'confirm':
                    log_info('お問い合わせ確認開始');

                    $recaptchaToken = $request->get(RecaptchaUtil::INPUT_NAME);
                    log_info('[reCAPTCHA] 受信トークン', [
                        'token_exists' => !empty($recaptchaToken),
                        'token_length' => $recaptchaToken ? strlen($recaptchaToken) : 0,
                    ]);

                    if (false === RecaptchaUtil::check($recaptchaToken)) {
                        log_error('[reCAPTCHA] 検証失敗');
                        $this->addError('セキュリティ確認に失敗しました。もう一度入力してください。');
                        return $this->redirectToRoute('contact');
                    }

                    log_info('[reCAPTCHA] 検証成功');

                    return $this->render('Contact/confirm.twig', [
                        'form' => $form->createView(),
                        'Page' => $this->pageRepository->getPageByRoute('contact_confirm'),
                    ]);

                case 'complete':
                    $data = $form->getData();

                    $event = new EventArgs(
                        [
                            'form' => $form,
                            'data' => $data,
                        ],
                        $request
                    );
                    $this->eventDispatcher->dispatch($event, EccubeEvents::FRONT_CONTACT_INDEX_COMPLETE);

                    $data = $event->getArgument('data');

                    // メール送信
                    $this->mailService->sendContactMail($data);

                    return $this->redirect($this->generateUrl('contact_complete'));
            }
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * お問い合わせ完了画面.
     *
     * @Route("/contact/complete", name="contact_complete", methods={"GET"})
     * @Template("Contact/complete.twig")
     */
    public function complete()
    {
        return [];
    }
}

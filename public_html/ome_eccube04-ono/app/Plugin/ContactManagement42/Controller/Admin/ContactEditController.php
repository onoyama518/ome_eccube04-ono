<?php


namespace Plugin\ContactManagement42\Controller\Admin;

use Eccube\Controller\AbstractController;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Eccube\Form\Type\Admin\CustomerType;
use Eccube\Form\Type\Admin\SearchCustomerType;
use Plugin\ContactManagement42\Form\Type\Admin\ContactType;
use Plugin\ContactManagement42\Repository\ContactRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ContactEditController extends AbstractController
{
    /**
     * @var ContactRepository
     */
    protected $contactRepository;


    public function __construct(
        ContactRepository $contactRepository
    ) {
        $this->contactRepository = $contactRepository;
    }

    /**
     * @Route("/%eccube_admin_route%/contact/new", name="plugin_contact_new")
     * @Route("/%eccube_admin_route%/contact/{id}/edit", requirements={"id" = "\d+"}, name="plugin_contact_edit")
     * @ParamConverter("Contact", class="Plugin\ContactManagement42\Entity\Contact")
     * @Template("@ContactManagement42/admin/edit.twig")
     */
    public function index(Request $request, $Contact = null)
    {
        $isEdit = false;
        // 編集
        if (!is_null($Contact)) {
            $isEdit = true;
        // 新規登録
        } else {
            $Contact = $this->contactRepository->newContact();
        }

        // 会員登録フォーム
        $builder = $this->formFactory
            ->createBuilder(ContactType::class, $Contact);

        $event = new EventArgs(
            [
                'builder' => $builder,
                'Contact' => $Contact,
            ],
            $request
        );
        $this->eventDispatcher->dispatch($event, 'admin.contact.edit.index.initialize');

        $form = $builder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            log_info('問い合わせ登録開始', [$Contact->getId()]);

            if (!$isEdit) {
                $Contact->setContactDate(new \DateTime());
            }

            $this->entityManager->persist($Contact);
            $this->entityManager->flush();

            log_info('問い合わせ登録完了', [$Contact->getId()]);

            $event = new EventArgs(
                [
                    'form' => $form,
                    'Contact' => $Contact,
                ],
                $request
            );
            $this->eventDispatcher->dispatch($event, 'admin.contact.edit.index.complete');

            $this->addSuccess('admin.common.save_complete', 'admin');

            return $this->redirectToRoute('plugin_contact_edit', [
                'id' => $Contact->getId(),
            ]);
        }

        // 会員検索フォーム
        $builder = $this->formFactory
            ->createBuilder(SearchCustomerType::class);
        $searchCustomerModalForm = $builder->getForm();

        return [
            'form' => $form->createView(),
            'Contact' => $Contact,
            'isEdit' => $isEdit,
            'searchCustomerModalForm' => $searchCustomerModalForm->createView(),
        ];
    }
}

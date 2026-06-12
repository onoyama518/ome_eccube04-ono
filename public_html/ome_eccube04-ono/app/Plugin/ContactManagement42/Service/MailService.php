<?php

namespace Plugin\ContactManagement42\Service;

use Doctrine\ORM\EntityManagerInterface;
use Eccube\Common\EccubeConfig;
use Eccube\Entity\BaseInfo;
use Eccube\Repository\BaseInfoRepository;
use Eccube\Repository\MailHistoryRepository;
use Eccube\Repository\MailTemplateRepository;
use Eccube\Util\StringUtil;
use Plugin\ContactManagement42\Entity\ContactReply;
use Plugin\ContactManagement42\Entity\MailHistory;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class MailService
{

    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * @var MailTemplateRepository
     */
    protected $mailTemplateRepository;

    /**
     * @var MailHistoryRepository
     */
    private $mailHistoryRepository;


    /**
     * @var BaseInfo
     */
    protected $BaseInfo;

    /**
     * @var EccubeConfig
     */
    protected $eccubeConfig;

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var \Eccube\Service\MailService
     */
    private $eccubeMailService;

    /**
     * MailService constructor.
     *
     * @param MailerInterface $mailer
     * @param MailTemplateRepository $mailTemplateRepository
     * @param MailHistoryRepository $mailHistoryRepository
     * @param BaseInfoRepository $baseInfoRepository
     * @param Environment $twig
     * @param EccubeConfig $eccubeConfig
     */
    public function __construct(
        MailerInterface $mailer,
        MailTemplateRepository $mailTemplateRepository,
        MailHistoryRepository $mailHistoryRepository,
        BaseInfoRepository $baseInfoRepository,
        Environment $twig,
        EccubeConfig $eccubeConfig,
        EntityManagerInterface $entityManager,
        \Eccube\Service\MailService $mailService
    ) {
        $this->mailer = $mailer;
        $this->mailTemplateRepository = $mailTemplateRepository;
        $this->mailHistoryRepository = $mailHistoryRepository;
        $this->BaseInfo = $baseInfoRepository->get();
        $this->eccubeConfig = $eccubeConfig;
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->eccubeMailService = $mailService;
    }


    /**
     * @param ContactReply $contactReply
     * @return null|Email
     */
    public function sendReplyMail(ContactReply $contactReply)
    {
        log_info('問い合わせ 返信メール送信開始', $contactReply->toArray());

        $email = explode(',', $contactReply->getEmail());
        $email = array_filter($email, function ($var) {
            return StringUtil::isNotBlank($var);
        });

        $email = array_map(function ($str) {
            return $this->eccubeMailService->convertRFCViolatingEmail($str);
        }, $email);

        $message = (new Email())
            ->subject('['.$this->BaseInfo->getShopName().'] '.$contactReply->getMailSubject())
            ->from(new Address($this->BaseInfo->getEmail01(), $this->BaseInfo->getShopName()))
            ->to(...$email)
            ->bcc($this->BaseInfo->getEmail01())
            ->replyTo($this->BaseInfo->getEmail03())
            ->returnPath($this->BaseInfo->getEmail04())
            ->text($contactReply->getContents());

        try {
            $this->mailer->send($message);
            log_info('問い合わせ 返信メール送信完了', $contactReply->toArray());
            return $message;
        } catch (TransportExceptionInterface $e) {
            log_critical($e->getMessage());
        }
        return null;
    }

}

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

namespace Customize\Service;

use Eccube\Service\MailService as BaseMailService;
use Eccube\Event\EccubeEvents;
use Eccube\Event\EventArgs;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

/**
 * カスタムメールサービス
 * お問い合わせ種別による送信先切り替え機能を追加
 */
class MailService extends BaseMailService
{
    /**
     * OEMお問い合わせ用メールアドレス
     */
    private const OEM_EMAIL = 'oem@ome-shouzai.com';

    /**
     * お問い合わせ種別（OEM）
     */
    private const CONTACT_TYPE_OEM = 'OEMについて';

    /**
     * Send contact mail.
     *
     * @param array $formData お問い合わせ内容
     */
    public function sendContactMail($formData)
    {
        log_info('お問い合わせ受付メール送信開始');

        $MailTemplate = $this->mailTemplateRepository->find($this->eccubeConfig['eccube_contact_mail_template_id']);

        $body = $this->twig->render($MailTemplate->getFileName(), [
            'data' => $formData,
            'BaseInfo' => $this->BaseInfo,
        ]);

        // お問い合わせ種別に応じた送信先を決定
        $adminEmail = $this->getAdminEmailByContactType($formData);

        // 問い合わせ者にメール送信
        $message = (new Email())
            ->subject($MailTemplate->getMailSubject().$this->BaseInfo->getShopName())
            ->from(new Address($adminEmail, $this->BaseInfo->getShopName()))
            ->to($this->convertRFCViolatingEmail($formData['email']))
            ->bcc($adminEmail)
            ->replyTo($adminEmail)
            ->returnPath($this->BaseInfo->getEmail04());

        // HTMLテンプレートが存在する場合
        $htmlFileName = $this->getHtmlTemplate($MailTemplate->getFileName());
        if (!is_null($htmlFileName)) {
            $htmlBody = $this->twig->render($htmlFileName, [
                'data' => $formData,
                'BaseInfo' => $this->BaseInfo,
            ]);

            $message
                ->text($body)
                ->html($htmlBody);
        } else {
            $message->text($body);
        }

        $event = new EventArgs(
            [
                'message' => $message,
                'formData' => $formData,
                'BaseInfo' => $this->BaseInfo,
            ],
            null
        );
        $this->eventDispatcher->dispatch($event, EccubeEvents::MAIL_CONTACT);

        try {
            $this->mailer->send($message);
            log_info('お問い合わせ受付メール送信完了');
        } catch (TransportExceptionInterface $e) {
            log_critical($e->getMessage());
        }
    }

    /**
     * お問い合わせ種別に応じた管理者メールアドレスを取得
     *
     * @param array $formData お問い合わせフォームデータ
     * @return string メールアドレス
     */
    private function getAdminEmailByContactType(array $formData): string
    {
        $contactType = $formData['contact_type'] ?? '';

        if ($contactType === self::CONTACT_TYPE_OEM) {
            log_info('OEM contact type detected - routing to OEM email', [
                'contact_type' => $contactType,
                'target_email' => self::OEM_EMAIL,
            ]);
            return self::OEM_EMAIL;
        }

        $adminEmail = $this->BaseInfo->getEmail02();
        log_info('Standard contact type - routing to admin email', [
            'contact_type' => $contactType,
            'target_email' => $adminEmail,
        ]);
        return $adminEmail;
    }
}

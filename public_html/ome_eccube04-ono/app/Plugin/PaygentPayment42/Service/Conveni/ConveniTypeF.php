<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright (c) 2006 PAYGENT Co.,Ltd. All rights reserved.
 *
 * https://www.paygent.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

namespace Plugin\PaygentPayment42\Service\Conveni;

use Eccube\Common\EccubeConfig;

/**
 * コンビニ接続タイプFの処理
 */
class ConveniTypeF
{

    /**
     * @param $eccubeConfig EccubeConfig
     */
    public function __construct(
        EccubeConfig     $eccubeConfig
    ) {
        $this->eccubeConfig = $eccubeConfig;
    }


    /**
     * コンビニの種類(コンビニ接続タイプF)選択肢の取得
     */
    public function getConvenienceTypeChoices()
    {
        $arrConveni = [$this->eccubeConfig['paygent_payment']['cvs_form_non_select'] => ''];
        foreach ($this->eccubeConfig['paygent_payment']['cvs_type_f_company_id'] as $conveniId) {
            $arrConveni[$this->eccubeConfig['paygent_payment']['cvs_type_f_company_id_to_name'][$conveniId]] = $conveniId;
        }
        return $arrConveni;
    }

    /**
     * 選択されたコンビニ毎に受付番号、特記事項、電話番号を設定する処理
     */
    public function getPaymentParams($cvsCompanyId, $phoneNumber)
    {

        // 選択されたコンビニ毎の処理
        switch ($cvsCompanyId) {
            // セブンイレブンの場合
            case $this->eccubeConfig['paygent_payment']['cvs_type_f_company_id']['seven-eleven']:
                $arrConfirmMessage['receipt_num_name'] = "払込票番号";
                break;

            // デイリーヤマザキの場合
            case $this->eccubeConfig['paygent_payment']['cvs_type_f_company_id']['daily-yamazaki']:
                $arrConfirmMessage['receipt_num_name'] = "オンライン決済番号";
                break;

            // ローソン、ミニストップの場合
            case $this->eccubeConfig['paygent_payment']['cvs_type_f_company_id']['law-son_mini-stop']:
                $arrConfirmMessage['receipt_num_name'] = "支払番号";
                $arrConfirmMessage['phone_num'] = $phoneNumber;
                break;

            // ファミリーマートの場合
            case $this->eccubeConfig['paygent_payment']['cvs_type_f_company_id']['family-mart']:
                $arrConfirmMessage['receipt_num_name'] = "収納番号";
                break;

            // セイコーマートの場合
            case $this->eccubeConfig['paygent_payment']['cvs_type_f_company_id']['seiko-mart']:
                $arrConfirmMessage['receipt_num_name'] = "オンライン決済番号";
                break;

            default:
                break;
        }

        $arrConfirmMessage['confirm_memo'] = "";

        return $arrConfirmMessage;

    }
}
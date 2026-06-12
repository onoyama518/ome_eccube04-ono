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

namespace Plugin\PaygentPayment42\Service\Credit;

use Eccube\Common\EccubeConfig;
use Eccube\Repository\PluginRepository;
use Plugin\PaygentPayment42\Repository\ConfigRepository;
use Plugin\PaygentPayment42\Service\PaygentBaseService;

/**
 * クレジットの売上変更の妥当性確認
 */
class CreditChangeCommitValidation extends PaygentBaseService {

    private $settlementDetail = [];

    /**
     * @param $configRepository ConfigRepository
     * @param $configRepository PluginRepository
     * @param $eccubeConfig EccubeConfig
     */
    public function __construct(
        ConfigRepository $configRepository,
        PluginRepository $pluginRepository,
        EccubeConfig $eccubeConfig
    ) {
        $this->configRepository = $configRepository;
        $this->pluginRepository = $pluginRepository;
        $this->eccubeConfig = $eccubeConfig;
    }

    /**
     * 関数名：canChengeCommit
     * 処理内容：売上変更が実行可能かどうかを返す
     * 決済情報照会電文を呼んで決済ステータスが消込済みなら実行可能。
     * 戻り値：可否
     */
    public function canChengeCommit($arrSendParam)
    {

        // 決済情報を照会する
        $this->settlementDetail = $this->getSettlementDetail($arrSendParam);

        // 通信正常かつ消込済の場合true
        if ($this->settlementDetail['resultStatus'] === $this->eccubeConfig['paygent_payment']['result_success']) {
            if ($this->settlementDetail['payment_status'] === $this->eccubeConfig['paygent_payment']['status_pre_cleared']) {
                return true;
            }
        }

        return false;
    }

    /**
     * 関数名：getErrorMessage
     * 処理内容：エラー時のメッセージを取得する
     * 戻り値：エラーメッセージ
     */
    public function getErrorMessage()
    {
        if ($this->settlementDetail['resultStatus'] === $this->eccubeConfig['paygent_payment']['result_success']) {
            return "決済ステータスが消込済の場合のみ売上変更が可能です。";
        } else {
            return "受注情報照会電文の処理結果が異常です。";
        }
    }

}

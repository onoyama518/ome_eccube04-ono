<?php
/**
 *
 * Daily Cron
 *
 * [やることリスト]
 * ①受注から7日経過したユーザーに対してメールを送信する
 *
 * @auther H.Nakamoto
 * @copyright Copyright (C) 2009 white-son.com All Rights Reserved.
 *
 */
require_once(dirname(__FILE__) . "/../require.php");
require_once(dirname(__FILE__) . "/../../data/class/batch/SC_Batch_Mail.php");
$objMail = new SC_Batch_Mail();
$objMail->execute($argv);

?>
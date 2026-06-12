<!doctype html>
<?php /*
This file is part of EC-CUBE

Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.

http://www.ec-cube.co.jp/

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
*/ ?>
<html lang="<?php echo $locale; ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ただいまメンテナンス中です</title>
    <link rel="icon" href="<?php echo $baseUrl; ?>/html/template/<?php echo $templateCode; ?>/assets/img/common/favicon.ico">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/html/template/<?php echo $templateCode; ?>/assets/css/style.css">
</head>

<style>
    .ec-off4Grid .ec-off4Grid__cell {
        width: 100%;
        margin-left: 0;
    }

    .contents-page {
        font-size: 15px;
        width: 90%;
        max-width: 1000px;
        margin: auto;
        padding: 0 0;
        text-align: center;
        line-height: 2;
    }

    .contents-page h2 {
        font-size: 25px;
        text-align: center;
        margin-bottom: 30px;
        font-weight: bold;
    }

    .contents-page p {
        padding-bottom: 15px;
    }

    .contents-page-underline {
        border-bottom: 1px solid #000;
    }

    .cp-underline-red {
        border-bottom: 1px solid red;
    }

    .cp-list {
        margin-left: 30px;
        margin-bottom: 0px;
    }

    .cp-list li {
        padding-bottom: 30px;
        line-height: 30px;
    }

    .cp-list p {
        font-weight: bold;
    }

    .cp-list b {
        color: red;
    }

    .attention {
        color: red;
    }
</style>

<body>
    <div class="ec-layoutRole">
        <div class="ec-404Role">
            <div class="ec-off4Grid">
                <div class="ec-off4Grid__cell">
                    <div style="font-size:100px;text-align:center;">
                        <div class="ec-404Role__icon ec-icon">
                            <img src="<?php echo $baseUrl; ?>/html/template/<?php echo $templateCode; ?>/assets/icon/exclamation-pale.svg" alt="">
                        </div>
                    </div>
                    <div id="lp-wrap">
                        <div class="contents-page">
                            <h2>ただいま臨時メンテナンス中です</h2>
                            <p>いつもome エンタープライズをご利用いただき、誠にありがとうございます。</p>
                            <p>現在、オンラインショップの臨時メンテナンスを実施しております。<br>
                                メンテナンス時間は2026年6月2日 AM2:00〜AM10:00を予定しております。<br>
                                上記時間内での復旧を予定しておりますが、作業状況により前後する場合がございます。<br>
                                終了次第ご利用可能となりますので、しばらく時間をおいて再度お試しください。
                            </p>
                            <p>お急ぎのご注文につきましては、以下の方法でご連絡ください。<br>
                                ■ご注文方法<br>
                                <a href="tel:0120-965-583">TEL：0120-965-583</a><br>
                                FAX：06-6252-3774<br>
                                <a href="mailto:info@ome-shouzai.com">Mail：info@ome-shouzai.com</a><br>
                                商品名・数量・お名前・お届け先ご住所・電話番号・メールアドレスを明記の上、ご連絡ください。
                            </p>
                            <p>お客様にはご不便をおかけし申し訳ございませんが、<br>
                                快適にご利用いただけるよう改修を進めております。<br>
                                ご理解とご協力のほど、何卒よろしくお願い申し上げます。
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
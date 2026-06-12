<?php
require_once '../../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';
require_once CLASS_EX_REALDIR . 'helper_extends/SC_Helper_CSV_Ex.php';

/**
 * ユーザーカスタマイズ用のページクラス
 *
 * 管理画面から自動生成される
 *
 * ----------------------------------------------------------------------
 * 2011.11.28 H.Nakamoto customized
 * アンケート項目を画面とCSVに出力出来るように対応
 * ①アンケート内容を$csvLabelsに定義
 *   質問の追加は、question1,question2,question3・・・としていけば
 *   画面にもCSVにも反映される
 * ②アンケート内容を変更する際は、CSVの項目合わせのために、
 *   public_html/user_data/enquete.csvを削除する事
 * ----------------------------------------------------------------------
 *
 * @package Page
 */
class LC_Page_User extends LC_Page_Ex {
	// 顧客情報の項目
	var $customerLabels = array(
		'customer_id' => 'ID',
		'name01' => '姓',
		'name02' => '名',
		'email' => 'メールアドレス',
	);
	// アンケート項目(この配列を拡張してアンケート項目を増やす)
	var $csvLabels = array(
		'question1' => array(
			'require' => false,
			'type' => 'radio',
			'label' => '問1',
			'body' => '臭い',
			'answer' => array(
				'1',
				'2',
				'3',
				'4',
				'5'
			)
		),
		'question2' => array(
			'require' => false,
			'type' => 'radio',
			'label' => '問2',
			'body' => '刺激',
			'answer' => array(
				'1',
				'2',
				'3',
				'4',
				'5'
			)
		),
		'question3' => array(
			'require' => false,
			'type' => 'radio',
			'label' => '問3',
			'body' => '操作性',
			'answer' => array(
				'1',
				'2',
				'3',
				'4',
				'5'
			)
		),
		'question4' => array(
			'require' => false,
			'type' => 'radio',
			'label' => '問4',
			'body' => '付き',
			'answer' => array(
				'1',
				'2',
				'3',
				'4',
				'5'
			)
		),
		'question5' => array(
			'require' => false,
			'type' => 'radio',
			'label' => '問5',
			'body' => '低刺激グルーの商品化を希望しますか',
			'answer' => array(
				'する',
				'しない'
			)
		),
		'question6' => array(
			'require' => false,
			'type' => 'textarea',
			'label' => '問6',
			'body' => '商品化を希望される場合、価格はどれくらいを希望しますか',
			'answer' => array(
				'',
			)
		),
		'question7' => array(
			'require' => false,
			'type' => 'radio',
			'label' => '問7',
			'body' => 'グルーの発注頻度を教えてください',
			'answer' => array(
				'1ヶ月に1度',
				'2ヶ月に1度',
				'3ヶ月以上に1度',
				'その他',
			)
		),
		'question8' => array(
			'require' => false,
			'type' => 'textarea',
			'label' => '問8',
			'body' => 'その他ご意見や気になった点がありましたらご記入下さい',
			'answer' => array(
				'',
			)
		),
	);
	// エラー文言
	var $labelError = array(
		'radio' => 'いずれかをご選択ください',
		'textarea' => '入力されていません'
	);
	// アクセス用トークン
	var $enquete_uid;

	// エラー格納配列
	var $Error = array();

	/**
     * Page を初期化する.
     *
     * @return void
     */
    function init() {
        parent::init();
        $masterData = new SC_DB_MasterData_Ex();
        $this->arrMAILTPLPATH =  $masterData->getMasterData("mtb_mail_tpl_path");
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        parent::process();

        // トランザクションIDの取得
        $this->doValidToken();
        $this->setTokenTo();

        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action() {
    	// パラメータを取得する
    	$this->enquete_uid = isset($_GET['uid'])?$_GET['uid']:(isset($_POST['enquete_uid'])?$_POST['enquete_uid']:"");
    	if($this->enquete_uid == ""){
    		$this->Error['token'] = "不正なアクセスです";
    	}
    	else{
    		// 回答内容をCSVにダンプする
    		if($_POST['answer_submit']){
    			// データを整形する
    			$baseData = $this->createBaseData();
    			// CSV形式でデータを取得する
				$data = $this->createCsvData($baseData);
    			if(count($this->Error) == 0){
    				// 書き込み
    				$file_name = USER_REALDIR."enquete2.csv";
    				$this->writeLine($file_name,$data);
    				// 通知メールを送信する
    				$mailData = $this->createMailData($baseData);
    				$this->sendNotifyMail($mailData);
    				// サンキューページに飛ぶ
					$this->jumpThanksPage($this->enquete_uid);
    			}
    		}
    	}
    }
    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }
    /**
     * ベースになるデータを作成する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function createBaseData(){
    	$output = array();
    	$csv = "";
    	$file_name = USER_REALDIR."enquete.csv";

    	// ファイルがなければ新規作成のため、タイトル行を付ける
    	if(!file_exists($file_name)){
    		$titles = $this->getTitles();
    		$this->writeLine($file_name,$titles);
    	}
    	// 顧客情報
    	$customerData = $this->tokenToCustomerInfo($_POST['enquete_uid']);
    	foreach($this->customerLabels as $field => $label){
    		$output[$field] = $customerData[$field];
    	}
    	// 一行をCSV形式に変換
    	foreach($this->csvLabels as $name => $params){
    		// アンケート回答
    		if((!isset($_POST[$name]) || $_POST[$name] == "") && $params['require']){
    			// 回答がなかった
    			$this->Error[$name] = $this->labelError[$params['type']];
    		}
    		else{
    			$output[$name] = $_POST[$name];
    			$this->postData[$name] = $_POST[$name];
    		}
    	}
    	return $output;
    }
    /**
     * CSV形式のデータを作成する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function createCsvData($_baseData){
    	$output = array();
    	foreach($this->customerLabels as $field => $label){
    		$output[] = $_baseData[$field];
    	}
    	foreach($this->csvLabels as $name => $params){
    		$output[] = $_baseData[$name];
    	}
    	return $output;
    }
    /**
     * メール形式のデータを取得する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function createMailData($_baseData){
    	$output = array();
    	foreach($this->customerLabels as $field => $label){
    		$output[$label] = $_baseData[$field];
    	}
    	foreach($this->csvLabels as $name => $params){
    		$output[$params['label']] = $_baseData[$name];
    	}
    	return $output;
    }
    /**
     * タイトル配列を取得する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function getTitles(){
    	// 顧客情報
    	foreach($this->customerLabels as $label){
    		$titles[] = $label;
    	}
    	// アンケート項目
    	foreach($this->csvLabels as $name => $params){
    		$titles[] = $params['label'];
    	}
    	return $titles;
    }
    /**
     * トークンを元に顧客情報を取得する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function tokenToCustomerInfo($_token){
    	// パラメータを取得する
    	if(isset($_token) && $_token != ""){
    		$objQuery =& SC_Query_Ex::getSingletonInstance();
    		$where = "MD5(CONCAT(?,customer_id)) = ?";
    		$result = $objQuery->select("customer_id,name01,name02,email", "dtb_customer", $where, array(AUTH_MAGIC,$_token));
    		if($result[0]){
    			$output = $result[0];
    		}
    		else{
    			$output = array(
	    			'customer_id' => '不明',
	    			'name01' => '不明',
	    			'name02' => '不明',
	    			'email' => '不明'
    			);
    		}
    	}
    	return $output;
    }
    /**
     * CSVにデータを追記する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function writeLine($_path,$_param){
    	$objCSV = new SC_Helper_CSV_Ex();
    	$csv = $objCSV->sfArrayToCsv($_param);
    	$csv = mb_convert_encoding($csv,"SJIS-win","UTF-8");
    	$csv .= "\r\n";
    	$fp = fopen($_path,'a');
    	set_file_buffer($fp,0);
    	// flockはflockを排他する事が懸念されるが、
    	// ロックファイルを作成する排他制御はfclose前にプロセスが落ちると判定が出来なくなるため、敢えて採用しない
    	flock($fp,LOCK_EX);
    	fputs($fp,$csv);
    	flock($handle,LOCK_UN);
    	fclose($fp);
    }
    /**
     * サンキューページへの遷移
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function jumpThanksPage($_uid){
		header("Location: /enquete/after_order_thanks.php?uid=".$_uid);
		exit;
    }
    /**
     * 回答内容を通知するメールを送信する
     * @param
     * @return
     * @auther H.Nakamoto
     */
    function sendNotifyMail($_enquete){
    	$objQuery =& SC_Query_Ex::getSingletonInstance();
    	$arrInfo = SC_Helper_DB_Ex::sfGetBasisData();

    	// メールテンプレート情報
    	$tpl_id = 8;
    	$tplpath = SMARTY_TEMPLATES_REALDIR."default/mail_templates/enquete_notify_mail.tpl";
    	$where = "template_id = ?";
    	$arrRet = $objQuery->select("subject, header, footer", "dtb_mailtemplate", $where, array($tpl_id));

    	// メール送信処理
    	$objSendMail = new SC_SendMail_Ex();

    	$arrTplVar = new stdClass();
    	$objMailView = new SC_SiteView_Ex();
    	// テンプレート変数の設定
    	$arrTplVar->tpl_header = $arrRet[0]['header'];
    	$arrTplVar->tpl_footer = $arrRet[0]['footer'];
    	$agent = Net_UserAgent_Mobile::singleton();
    	$arrTplVar->carrier = $agent->getCarrierLongName();
    	$arrTplVar->enquete = $_enquete;

    	// メール本文の取得
    	$objMailView->assignobj($arrTplVar);
    	$body = $objMailView->fetch($this->arrMAILTPLPATH[$tpl_id]);

    	$bcc = "";
    	$from = $arrInfo['email03'];
    	$error = $arrInfo['email04'];
    	$objSendMail->setItem('', $arrRet[0]['subject'], $body, $from, $arrInfo['shop_name'], $from, $error, $error, $bcc);
    	$objSendMail->setTo($arrInfo['email02'], $arrInfo['law_company'] . " ". $arrInfo['law_manager'] ." 様");

    	// 送信フラグ:trueの場合は、送信する。
    	$sendResult = $objSendMail->sendMail();
    }
}


$objPage = new LC_Page_User();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();

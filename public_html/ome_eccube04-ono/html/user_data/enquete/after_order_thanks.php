<?php
require_once '../../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

/**
 * ユーザーカスタマイズ用のページクラス
 *
 * 管理画面から自動生成される
 *
 * ----------------------------------------------------------------------
 * 2011.11.28 H.Nakamoto customized
 * アンケート回答後のサンキューページ
 * ----------------------------------------------------------------------
 *
 * @package Page
 */
class LC_Page_User extends LC_Page_Ex {
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
    }

    /**
     * Page のプロセス.
     *
     * @return void
     */
    function process() {
        parent::process();
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
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy() {
        parent::destroy();
    }
}


$objPage = new LC_Page_User();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();

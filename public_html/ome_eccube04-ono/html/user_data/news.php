<?php
require_once '../require.php';
require_once CLASS_EX_REALDIR . 'page_extends/LC_Page_Ex.php';

/**
 * ユーザーカスタマイズ用のページクラス
 *
 * 管理画面から自動生成される
 *
 * @package Page
 */
class LC_Page_User extends LC_Page_Ex {

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
		$this->arrNews = $this->lfGetNews();
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
     * 新着情報を取得する.
     *
     * @return array $arrNewsList 新着情報の配列を返す
     */
    function lfGetNews(){
        $objQuery = SC_Query_Ex::getSingletonInstance();
        $sql = '';
        $sql .= " SELECT ";
        $sql .= "   *, ";
        $sql .= "   cast(news_date as date) as news_date_disp ";
        $sql .= " FROM ";
        $sql .= "   dtb_news ";
        $sql .= " WHERE ";
        $sql .= "   del_flg = '0' ";
        $sql .= " ORDER BY ";
        $sql .= "   rank DESC ";

        $arrNewsList = $objQuery->getAll($sql);
        return $arrNewsList;
    }
}


$objPage = new LC_Page_User();
register_shutdown_function(array($objPage, 'destroy'));
$objPage->init();
$objPage->process();

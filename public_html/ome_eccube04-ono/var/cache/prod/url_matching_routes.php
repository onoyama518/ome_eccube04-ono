<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/administrator/login' => [[['_route' => 'admin_login', '_controller' => 'Eccube\\Controller\\Admin\\AdminController::login'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator' => [[['_route' => 'admin_homepage', '_controller' => 'Eccube\\Controller\\Admin\\AdminController::index'], null, ['GET' => 0], ['https' => 0], true, false, null]],
        '/administrator/sale_chart' => [[['_route' => 'admin_homepage_sale', '_controller' => 'Eccube\\Controller\\Admin\\AdminController::sale'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/change_password' => [[['_route' => 'admin_change_password', '_controller' => 'Eccube\\Controller\\Admin\\AdminController::changePassword'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/search_nonstock' => [[['_route' => 'admin_homepage_nonstock', '_controller' => 'Eccube\\Controller\\Admin\\AdminController::searchNonStockProducts'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/search_customer' => [[['_route' => 'admin_homepage_customer', '_controller' => 'Eccube\\Controller\\Admin\\AdminController::searchCustomer'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/block' => [[['_route' => 'admin_content_block', '_controller' => 'Eccube\\Controller\\Admin\\Content\\BlockController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/block/new' => [[['_route' => 'admin_content_block_new', '_controller' => 'Eccube\\Controller\\Admin\\Content\\BlockController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/cache' => [[['_route' => 'admin_content_cache', '_controller' => 'Eccube\\Controller\\Admin\\Content\\CacheController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/css' => [[['_route' => 'admin_content_css', '_controller' => 'Eccube\\Controller\\Admin\\Content\\CssController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/file_manager' => [[['_route' => 'admin_content_file', '_controller' => 'Eccube\\Controller\\Admin\\Content\\FileController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/file_view' => [[['_route' => 'admin_content_file_view', '_controller' => 'Eccube\\Controller\\Admin\\Content\\FileController::view'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/file_delete' => [[['_route' => 'admin_content_file_delete', '_controller' => 'Eccube\\Controller\\Admin\\Content\\FileController::delete'], null, ['DELETE' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/file_download' => [[['_route' => 'admin_content_file_download', '_controller' => 'Eccube\\Controller\\Admin\\Content\\FileController::download'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/js' => [[['_route' => 'admin_content_js', '_controller' => 'Eccube\\Controller\\Admin\\Content\\JsController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/layout' => [[['_route' => 'admin_content_layout', '_controller' => 'Eccube\\Controller\\Admin\\Content\\LayoutController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/layout/new' => [[['_route' => 'admin_content_layout_new', '_controller' => 'Eccube\\Controller\\Admin\\Content\\LayoutController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/layout/view_block' => [[['_route' => 'admin_content_layout_view_block', '_controller' => 'Eccube\\Controller\\Admin\\Content\\LayoutController::viewBlock'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/maintenance' => [[['_route' => 'admin_content_maintenance', '_controller' => 'Eccube\\Controller\\Admin\\Content\\MaintenanceController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/news' => [[['_route' => 'admin_content_news', '_controller' => 'Eccube\\Controller\\Admin\\Content\\NewsController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/news/new' => [[['_route' => 'admin_content_news_new', '_controller' => 'Eccube\\Controller\\Admin\\Content\\NewsController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/content/page' => [[['_route' => 'admin_content_page', '_controller' => 'Eccube\\Controller\\Admin\\Content\\PageController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/content/page/new' => [[['_route' => 'admin_content_page_new', '_controller' => 'Eccube\\Controller\\Admin\\Content\\PageController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/customer' => [[['_route' => 'admin_customer', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/customer/export' => [[['_route' => 'admin_customer_export', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerController::export'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/customer/new' => [[['_route' => 'admin_customer_new', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerEditController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/shipping_csv_upload' => [[['_route' => 'admin_shipping_csv_import', '_controller' => 'Eccube\\Controller\\Admin\\Order\\CsvImportController::csvShipping'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/csv_template' => [[['_route' => 'admin_shipping_csv_template', '_controller' => 'Eccube\\Controller\\Admin\\Order\\CsvImportController::csvTemplate'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/order/new' => [[['_route' => 'admin_order_new', '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/search/customer/html' => [[['_route' => 'admin_order_search_customer_html', '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::searchCustomerHtml'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/search/customer/id' => [[['_route' => 'admin_order_search_customer_by_id', '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::searchCustomerById'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/order/search/product' => [[['_route' => 'admin_order_search_product', '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::searchProduct'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/search/order_item_type' => [[['_route' => 'admin_order_search_order_item_type', '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::searchOrderItemType'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/order' => [[['_route' => 'admin_order', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/bulk_delete' => [[['_route' => 'admin_order_bulk_delete', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::bulkDelete'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/order/export/order' => [[['_route' => 'admin_order_export_order', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::exportOrder'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/order/export/shipping' => [[['_route' => 'admin_order_export_shipping', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::exportShipping'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/order/export/pdf' => [[['_route' => 'admin_order_export_pdf', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::exportPdf'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/order/export/pdf/download' => [[['_route' => 'admin_order_pdf_download', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::exportPdfDownload'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/category' => [[['_route' => 'admin_product_category', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CategoryController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/category/sort_no/move' => [[['_route' => 'admin_product_category_sort_no_move', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CategoryController::moveSortNo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/category/export' => [[['_route' => 'admin_product_category_export', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CategoryController::export'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/class_category/sort_no/move' => [[['_route' => 'admin_product_class_category_sort_no_move', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassCategoryController::moveSortNo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/class_name' => [[['_route' => 'admin_product_class_name', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassNameController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/class_name/sort_no/move' => [[['_route' => 'admin_product_class_name_sort_no_move', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassNameController::moveSortNo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/class_name/export' => [[['_route' => 'admin_product_class_name_export', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassNameController::export'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/product_csv_upload' => [[['_route' => 'admin_product_csv_import', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::csvProduct'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/category_csv_upload' => [[['_route' => 'admin_product_category_csv_import', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::csvCategory'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/class_name_csv_upload' => [[['_route' => 'admin_product_class_name_csv_import', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::csvClassName'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/class_category_csv_upload' => [[['_route' => 'admin_product_class_category_csv_import', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::csvClassCategory'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/csv_split' => [[['_route' => 'admin_product_csv_split', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::splitCsv'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/csv_split_import' => [[['_route' => 'admin_product_csv_split_import', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::importCsv'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/csv_split_cleanup' => [[['_route' => 'admin_product_csv_split_cleanup', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::cleanupSplitCsv'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product' => [[['_route' => 'admin_product', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/product/image/process' => [[['_route' => 'admin_product_image_process', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::imageProcess'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/product/image/load' => [[['_route' => 'admin_product_image_load', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::imageLoad'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/product/image/revert' => [[['_route' => 'admin_product_image_revert', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::imageRevert'], null, ['DELETE' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/product/new' => [[['_route' => 'admin_product_product_new', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/export' => [[['_route' => 'admin_product_export', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::export'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/product/tag' => [[['_route' => 'admin_product_tag', '_controller' => 'Eccube\\Controller\\Admin\\Product\\TagController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/product/tag/sort_no/move' => [[['_route' => 'admin_product_tag_sort_no_move', '_controller' => 'Eccube\\Controller\\Admin\\Product\\TagController::moveSortNo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/calendar' => [[['_route' => 'admin_setting_shop_calendar', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\CalendarController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/calendar/new' => [[['_route' => 'admin_setting_shop_calendar_new', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\CalendarController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/delivery' => [[['_route' => 'admin_setting_shop_delivery', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\DeliveryController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/delivery/new' => [[['_route' => 'admin_setting_shop_delivery_new', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\DeliveryController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/delivery/sort_no/move' => [[['_route' => 'admin_setting_shop_delivery_sort_no_move', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\DeliveryController::moveSortNo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/mail' => [[['_route' => 'admin_setting_shop_mail', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\MailController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/mail/preview' => [[['_route' => 'admin_setting_shop_mail_preview', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\MailController::preview'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/order_status' => [[['_route' => 'admin_setting_shop_order_status', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\OrderStatusController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/payment' => [[['_route' => 'admin_setting_shop_payment', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/payment/new' => [[['_route' => 'admin_setting_shop_payment_new', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/payment/image/process' => [[['_route' => 'admin_payment_image_process', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::imageProcess'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/payment/image/load' => [[['_route' => 'admin_payment_image_load', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::imageLoad'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/payment/image/revert' => [[['_route' => 'admin_payment_image_revert', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::imageRevert'], null, ['DELETE' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/payment/sort_no/move' => [[['_route' => 'admin_setting_shop_payment_sort_no_move', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::moveSortNo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/shop' => [[['_route' => 'admin_setting_shop', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\ShopController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/tax' => [[['_route' => 'admin_setting_shop_tax', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\TaxRuleController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/tax/new' => [[['_route' => 'admin_setting_shop_tax_new', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\TaxRuleController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/shop/tradelaw' => [[['_route' => 'admin_setting_shop_tradelaw', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\TradeLawController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/authority' => [[['_route' => 'admin_setting_system_authority', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\AuthorityController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/log' => [[['_route' => 'admin_setting_system_log', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\LogController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/login_history' => [[['_route' => 'admin_setting_system_login_history', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\LoginHistoryController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/masterdata' => [[['_route' => 'admin_setting_system_masterdata', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MasterdataController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/masterdata/edit' => [[['_route' => 'admin_setting_system_masterdata_edit', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MasterdataController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/member' => [[['_route' => 'admin_setting_system_member', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MemberController::index'], null, ['GET' => 0, 'PUT' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/member/new' => [[['_route' => 'admin_setting_system_member_new', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MemberController::create'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/security' => [[['_route' => 'admin_setting_system_security', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\SecurityController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/system' => [[['_route' => 'admin_setting_system_system', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\SystemController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/setting/system/system/phpinfo' => [[['_route' => 'admin_setting_system_system_phpinfo', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\SystemController::phpinfo'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/two_factor_auth/auth' => [[['_route' => 'admin_two_factor_auth', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\TwoFactorAuthController::auth'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/two_factor_auth/set' => [[['_route' => 'admin_two_factor_auth_set', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\TwoFactorAuthController::set'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/setting/system/two_factor_auth/edit' => [[['_route' => 'admin_setting_system_two_factor_auth_edit', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\TwoFactorAuthController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/api/search' => [[['_route' => 'admin_store_plugin_owners_search', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::search'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/api/install' => [[['_route' => 'admin_store_plugin_api_install', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::apiInstall'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/api/upgrade' => [[['_route' => 'admin_store_plugin_api_upgrade', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::apiUpgrade'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/api/schema_update' => [[['_route' => 'admin_store_plugin_api_schema_update', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::apiSchemaUpdate'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/api/update' => [[['_route' => 'admin_store_plugin_api_update', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::apiUpdate'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/administrator/store/plugin' => [[['_route' => 'admin_store_plugin', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/install' => [[['_route' => 'admin_store_plugin_install', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::install'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/store/plugin/authentication_setting' => [[['_route' => 'admin_store_authentication_setting', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::authenticationSetting'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/store/template' => [[['_route' => 'admin_store_template', '_controller' => 'Eccube\\Controller\\Admin\\Store\\TemplateController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/administrator/store/template/install' => [[['_route' => 'admin_store_template_install', '_controller' => 'Eccube\\Controller\\Admin\\Store\\TemplateController::install'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/block/auto_new_item' => [[['_route' => 'block_auto_new_item', '_controller' => 'Eccube\\Controller\\Block\\AutoNewItemController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/block/calendar' => [[['_route' => 'block_calendar', '_controller' => 'Eccube\\Controller\\Block\\CalendarController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/block/cart' => [[['_route' => 'block_cart', '_controller' => 'Eccube\\Controller\\Block\\CartController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/block/cart_sp' => [[['_route' => 'block_cart_sp', '_controller' => 'Eccube\\Controller\\Block\\CartController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/block/search_product' => [[['_route' => 'block_search_product', '_controller' => 'Eccube\\Controller\\Block\\SearchProductController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/block/search_product_sp' => [[['_route' => 'block_search_product_sp', '_controller' => 'Eccube\\Controller\\Block\\SearchProductController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/cart' => [[['_route' => 'cart', '_controller' => 'Eccube\\Controller\\CartController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/contact' => [
            [['_route' => 'contact', '_controller' => 'Eccube\\Controller\\ContactController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null],
            [['_route' => 'contact_confirm', '_controller' => 'Eccube\\Controller\\ContactController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null],
        ],
        '/contact/complete' => [[['_route' => 'contact_complete', '_controller' => 'Eccube\\Controller\\ContactController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/entry' => [
            [['_route' => 'entry', '_controller' => 'Eccube\\Controller\\EntryController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null],
            [['_route' => 'entry_confirm', '_controller' => 'Eccube\\Controller\\EntryController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null],
        ],
        '/entry/complete' => [[['_route' => 'entry_complete', '_controller' => 'Eccube\\Controller\\EntryController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/forgot' => [[['_route' => 'forgot', '_controller' => 'Eccube\\Controller\\ForgotController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/forgot/complete' => [[['_route' => 'forgot_complete', '_controller' => 'Eccube\\Controller\\ForgotController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/guide' => [[['_route' => 'help_guide', '_controller' => 'Eccube\\Controller\\HelpController::guide'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/help/about' => [[['_route' => 'help_about', '_controller' => 'Eccube\\Controller\\HelpController::about'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/help/privacy' => [[['_route' => 'help_privacy', '_controller' => 'Eccube\\Controller\\HelpController::privacy'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/help/agreement' => [[['_route' => 'help_agreement', '_controller' => 'Eccube\\Controller\\HelpController::agreement'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/install/plugins' => [[['_route' => 'install_plugins', '_controller' => 'Eccube\\Controller\\InstallPluginController::plugins'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/install/plugin/redirect' => [[['_route' => 'install_plugin_redirect', '_controller' => 'Eccube\\Controller\\InstallPluginController::redirectAdmin'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/install/plugin/check_api' => [[['_route' => 'install_plugin_check_api', '_controller' => 'Eccube\\Controller\\InstallPluginController::checkWebApiRequirements'], null, ['PUT' => 0], ['https' => 0], false, false, null]],
        '/install' => [[['_route' => 'install', '_controller' => 'Eccube\\Controller\\InstallPluginController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/install/step1' => [[['_route' => 'install_step1', '_controller' => 'Eccube\\Controller\\InstallPluginController::step1'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/install/step2' => [[['_route' => 'install_step2', '_controller' => 'Eccube\\Controller\\InstallPluginController::step2'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/install/step3' => [[['_route' => 'install_step3', '_controller' => 'Eccube\\Controller\\InstallPluginController::step3'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/install/step4' => [[['_route' => 'install_step4', '_controller' => 'Eccube\\Controller\\InstallPluginController::step4'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/install/step5' => [[['_route' => 'install_step5', '_controller' => 'Eccube\\Controller\\InstallPluginController::step5'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/install/complete' => [[['_route' => 'install_complete', '_controller' => 'Eccube\\Controller\\InstallPluginController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/mypage/change' => [[['_route' => 'mypage_change', '_controller' => 'Eccube\\Controller\\Mypage\\ChangeController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/mypage/change_complete' => [[['_route' => 'mypage_change_complete', '_controller' => 'Eccube\\Controller\\Mypage\\ChangeController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/mypage/delivery' => [[['_route' => 'mypage_delivery', '_controller' => 'Eccube\\Controller\\Mypage\\DeliveryController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/mypage/delivery/new' => [[['_route' => 'mypage_delivery_new', '_controller' => 'Eccube\\Controller\\Mypage\\DeliveryController::edit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/mypage/login' => [[['_route' => 'mypage_login', '_controller' => 'Eccube\\Controller\\Mypage\\MypageController::login'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/mypage' => [[['_route' => 'mypage', '_controller' => 'Eccube\\Controller\\Mypage\\MypageController::index'], null, ['GET' => 0], ['https' => 0], true, false, null]],
        '/mypage/favorite' => [[['_route' => 'mypage_favorite', '_controller' => 'Eccube\\Controller\\Mypage\\MypageController::favorite'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/mypage/withdraw' => [
            [['_route' => 'mypage_withdraw', '_controller' => 'Eccube\\Controller\\Mypage\\WithdrawController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null],
            [['_route' => 'mypage_withdraw_confirm', '_controller' => 'Eccube\\Controller\\Mypage\\WithdrawController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null],
        ],
        '/mypage/withdraw_complete' => [[['_route' => 'mypage_withdraw_complete', '_controller' => 'Eccube\\Controller\\Mypage\\WithdrawController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/shopping/nonmember' => [[['_route' => 'shopping_nonmember', '_controller' => 'Eccube\\Controller\\NonMemberShoppingController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/shopping/customer' => [[['_route' => 'shopping_customer', '_controller' => 'Eccube\\Controller\\NonMemberShoppingController::customer'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/products/list' => [[['_route' => 'product_list', '_controller' => 'Eccube\\Controller\\ProductController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/shopping/shipping_multiple' => [[['_route' => 'shopping_shipping_multiple', '_controller' => 'Eccube\\Controller\\ShippingMultipleController::index'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/shopping/shipping_multiple_edit' => [[['_route' => 'shopping_shipping_multiple_edit', '_controller' => 'Eccube\\Controller\\ShippingMultipleController::shippingMultipleEdit'], null, ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        '/shopping' => [[['_route' => 'shopping', '_controller' => 'Eccube\\Controller\\ShoppingController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/shopping/redirect_to' => [[['_route' => 'shopping_redirect_to', '_controller' => 'Eccube\\Controller\\ShoppingController::redirectTo'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/shopping/confirm' => [[['_route' => 'shopping_confirm', '_controller' => 'Eccube\\Controller\\ShoppingController::confirm'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/shopping/checkout' => [[['_route' => 'shopping_checkout', '_controller' => 'Eccube\\Controller\\ShoppingController::checkout'], null, ['POST' => 0], ['https' => 0], false, false, null]],
        '/shopping/complete' => [[['_route' => 'shopping_complete', '_controller' => 'Eccube\\Controller\\ShoppingController::complete'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/shopping/login' => [[['_route' => 'shopping_login', '_controller' => 'Eccube\\Controller\\ShoppingController::login'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/shopping/error' => [[['_route' => 'shopping_error', '_controller' => 'Eccube\\Controller\\ShoppingController::error'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/sitemap.xml' => [[['_route' => 'sitemap_xml', '_controller' => 'Eccube\\Controller\\SitemapController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/sitemap_category.xml' => [[['_route' => 'sitemap_category_xml', '_controller' => 'Eccube\\Controller\\SitemapController::category'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/sitemap_page.xml' => [[['_route' => 'sitemap_page_xml', '_controller' => 'Eccube\\Controller\\SitemapController::page'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/' => [[['_route' => 'homepage', '_controller' => 'Eccube\\Controller\\TopController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/help/tradelaw' => [[['_route' => 'help_tradelaw', '_controller' => 'Eccube\\Controller\\TradeLawController::index'], null, ['GET' => 0], ['https' => 0], false, false, null]],
        '/administrator/logout' => [[['_route' => 'admin_logout'], null, null, ['https' => 0], false, false, null]],
        '/logout' => [[['_route' => 'logout'], null, null, ['https' => 0], false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/administrator/(?'
                    .'|c(?'
                        .'|ontent/(?'
                            .'|block/(?'
                                .'|(\\d+)/edit(*:58)'
                                .'|(\\d+)/delete(*:77)'
                            .')'
                            .'|layout/(?'
                                .'|(\\d+)/delete(*:107)'
                                .'|(\\d+)/edit(*:125)'
                                .'|(\\d+)/preview(*:146)'
                            .')'
                            .'|news/(?'
                                .'|page(?:/(\\d+))?(*:178)'
                                .'|(\\d+)/edit(*:196)'
                                .'|(\\d+)/delete(*:216)'
                            .')'
                            .'|page/(?'
                                .'|(\\d+)/edit(*:243)'
                                .'|(\\d+)/delete(*:263)'
                            .')'
                        .')'
                        .'|ustomer/(?'
                            .'|page(?:/(\\d+))?(*:299)'
                            .'|(\\d+)/resend(*:319)'
                            .'|(\\d+)/delete(*:339)'
                            .'|(\\d+)/delivery/new(*:365)'
                            .'|(\\d+)/delivery/(\\d+)/edit(*:398)'
                            .'|(\\d+)/delivery/(\\d+)/delete(*:433)'
                            .'|(\\d+)/edit(*:451)'
                        .')'
                    .')'
                    .'|disable_maintenance/(manual|auto_maintenance|auto_maintenance_update)(*:530)'
                    .'|order/(?'
                        .'|(\\d+)/edit(*:557)'
                        .'|search/(?'
                            .'|customer/html/page(?:/(\\d+))?(*:604)'
                            .'|product/page(?:/(\\d+))?(*:635)'
                        .')'
                        .'|(\\d+)/mail(*:654)'
                        .'|page(?:/(\\d+))?(*:677)'
                    .')'
                    .'|s(?'
                        .'|hipping/(?'
                            .'|(\\d+)/order_status(*:719)'
                            .'|(\\d+)/tracking_number(*:748)'
                            .'|(\\d+)/edit(*:766)'
                            .'|preview_notify_mail/(\\d+)(*:799)'
                            .'|notify_mail/(\\d+)(*:824)'
                        .')'
                        .'|etting/s(?'
                            .'|hop/(?'
                                .'|c(?'
                                    .'|alendar/(\\d+)/delete(*:875)'
                                    .'|sv(?:/(\\d+))?(*:896)'
                                .')'
                                .'|delivery/(?'
                                    .'|(\\d+)/edit(*:927)'
                                    .'|(\\d+)/delete(*:947)'
                                    .'|(\\d+)/visibility(*:971)'
                                .')'
                                .'|mail/(?'
                                    .'|(\\d+)(*:993)'
                                    .'|(\\d+)/delete(*:1013)'
                                .')'
                                .'|payment/(?'
                                    .'|(\\d+)/edit(*:1044)'
                                    .'|(\\d+)/delete(*:1065)'
                                    .'|(\\d+)/visible(*:1087)'
                                .')'
                                .'|tax/(\\d+)/delete(*:1113)'
                            .')'
                            .'|ystem/(?'
                                .'|login_history(?:/(\\d+))?(*:1156)'
                                .'|m(?'
                                    .'|asterdata/([^/]++)/edit(*:1192)'
                                    .'|ember/(?'
                                        .'|(\\d+)/edit(*:1220)'
                                        .'|(\\d+)/up(*:1237)'
                                        .'|(\\d+)/down(*:1256)'
                                        .'|(\\d+)/delete(*:1277)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|tore/(?'
                            .'|plugin/(?'
                                .'|api/(?'
                                    .'|search/page(?:/(\\d+))?(*:1337)'
                                    .'|install/(\\d+)/confirm(*:1367)'
                                    .'|delete/(\\d+)/uninstall(*:1398)'
                                    .'|upgrade/(\\d+)/confirm(*:1428)'
                                .')'
                                .'|(\\d+)/update(*:1450)'
                                .'|(\\d+)/enable(*:1471)'
                                .'|(\\d+)/disable(*:1493)'
                                .'|(\\d+)/uninstall(*:1517)'
                            .')'
                            .'|template/(?'
                                .'|(\\d+)/download(*:1553)'
                                .'|(\\d+)/delete(*:1574)'
                            .')'
                        .')'
                    .')'
                    .'|product/(?'
                        .'|c(?'
                            .'|ategory(?'
                                .'|(?:/(\\d+))?(*:1622)'
                                .'|/(?'
                                    .'|(\\d+)/edit(*:1645)'
                                    .'|(\\d+)/delete(*:1666)'
                                .')'
                            .')'
                            .'|lass(?'
                                .'|_(?'
                                    .'|category/(?'
                                        .'|(\\d+)(*:1705)'
                                        .'|(\\d+)/(\\d+)/edit(*:1730)'
                                        .'|(\\d+)/(\\d+)/delete(*:1757)'
                                        .'|(\\d+)/(\\d+)/visibility(*:1788)'
                                        .'|export/([^/]++)(*:1812)'
                                    .')'
                                    .'|name/(?'
                                        .'|(\\d+)/edit(*:1840)'
                                        .'|(\\d+)/delete(*:1861)'
                                    .')'
                                .')'
                                .'|es/(\\d+)/load(*:1885)'
                            .')'
                            .'|sv_template/(\\w+)(*:1912)'
                        .')'
                        .'|p(?'
                            .'|roduct/(?'
                                .'|class/(?'
                                    .'|(\\d+)(*:1950)'
                                    .'|(\\d+)/clear(*:1970)'
                                .')'
                                .'|(\\d+)/edit(*:1990)'
                                .'|(\\d+)/delete(*:2011)'
                                .'|(\\d+)/copy(*:2030)'
                            .')'
                            .'|age(?:/(\\d+))?(*:2054)'
                        .')'
                        .'|bulk/product\\-status/(\\d+)(*:2090)'
                        .'|tag/(\\d+)/delete(*:2115)'
                    .')'
                .')'
                .'|/cart/(?'
                    .'|(up|down|remove)/(\\d+)(*:2157)'
                    .'|buystep/([a-zA-Z0-9]+[_][\\x20-\\x7E]+)(*:2203)'
                .')'
                .'|/entry/activate/([^/]++)(?:/([^/]++))?(*:2251)'
                .'|/forgot/reset/([^/]++)(*:2282)'
                .'|/install/plugin/(\\w+)/enable(*:2319)'
                .'|/mypage/(?'
                    .'|delivery/(?'
                        .'|(\\d+)/edit(*:2361)'
                        .'|([^/]++)/delete(*:2385)'
                    .')'
                    .'|history/([^/]++)(*:2411)'
                    .'|order/([^/]++)(*:2434)'
                    .'|favorite/(\\d+)/delete(*:2464)'
                .')'
                .'|/products/(?'
                    .'|detail/(\\d+)(*:2499)'
                    .'|add_(?'
                        .'|favorite/(\\d+)(*:2529)'
                        .'|cart/(\\d+)(*:2548)'
                    .')'
                .')'
                .'|/s(?'
                    .'|hopping/shipping(?'
                        .'|/(\\d+)(*:2589)'
                        .'|_edit/(\\d+)(*:2609)'
                    .')'
                    .'|itemap_product_(\\d+)\\.xml(*:2644)'
                .')'
                .'|/user_data/((?:[0-9a-zA-Z_\\-]+\\/?)+(?<!\\/))(*:2697)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        58 => [[['_route' => 'admin_content_block_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Content\\BlockController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        77 => [[['_route' => 'admin_content_block_delete', '_controller' => 'Eccube\\Controller\\Admin\\Content\\BlockController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        107 => [[['_route' => 'admin_content_layout_delete', '_controller' => 'Eccube\\Controller\\Admin\\Content\\LayoutController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        125 => [[['_route' => 'admin_content_layout_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Content\\LayoutController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        146 => [[['_route' => 'admin_content_layout_preview', '_controller' => 'Eccube\\Controller\\Admin\\Content\\LayoutController::preview'], ['id'], ['POST' => 0], ['https' => 0], false, false, null]],
        178 => [[['_route' => 'admin_content_news_page', 'page_no' => 1, '_controller' => 'Eccube\\Controller\\Admin\\Content\\NewsController::index'], ['page_no'], ['GET' => 0], ['https' => 0], false, true, null]],
        196 => [[['_route' => 'admin_content_news_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Content\\NewsController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        216 => [[['_route' => 'admin_content_news_delete', '_controller' => 'Eccube\\Controller\\Admin\\Content\\NewsController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        243 => [[['_route' => 'admin_content_page_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Content\\PageController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        263 => [[['_route' => 'admin_content_page_delete', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Content\\PageController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        299 => [[['_route' => 'admin_customer_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerController::index'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        319 => [[['_route' => 'admin_customer_resend', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerController::resend'], ['id'], ['GET' => 0], ['https' => 0], false, false, null]],
        339 => [[['_route' => 'admin_customer_delete', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        365 => [[['_route' => 'admin_customer_delivery_new', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerDeliveryEditController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        398 => [[['_route' => 'admin_customer_delivery_edit', 'did' => null, '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerDeliveryEditController::edit'], ['id', 'did'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        433 => [[['_route' => 'admin_customer_delivery_delete', '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerDeliveryEditController::delete'], ['id', 'did'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        451 => [[['_route' => 'admin_customer_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Customer\\CustomerEditController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        530 => [[['_route' => 'admin_disable_maintenance', '_controller' => 'Eccube\\Controller\\Admin\\Content\\MaintenanceController::disableMaintenance'], ['mode'], ['POST' => 0], ['https' => 0], false, true, null]],
        557 => [[['_route' => 'admin_order_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        604 => [[['_route' => 'admin_order_search_customer_html_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::searchCustomerHtml'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        635 => [[['_route' => 'admin_order_search_product_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Order\\EditController::searchProduct'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        654 => [[['_route' => 'admin_order_mail', '_controller' => 'Eccube\\Controller\\Admin\\Order\\MailController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        677 => [[['_route' => 'admin_order_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::index'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        719 => [[['_route' => 'admin_shipping_update_order_status', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::updateOrderStatus'], ['id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        748 => [[['_route' => 'admin_shipping_update_tracking_number', '_controller' => 'Eccube\\Controller\\Admin\\Order\\OrderController::updateTrackingNumber'], ['id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        766 => [[['_route' => 'admin_shipping_edit', '_controller' => 'Eccube\\Controller\\Admin\\Order\\ShippingController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        799 => [[['_route' => 'admin_shipping_preview_notify_mail', '_controller' => 'Eccube\\Controller\\Admin\\Order\\ShippingController::previewShippingNotifyMail'], ['id'], ['GET' => 0], ['https' => 0], false, true, null]],
        824 => [[['_route' => 'admin_shipping_notify_mail', '_controller' => 'Eccube\\Controller\\Admin\\Order\\ShippingController::notifyMail'], ['id'], ['PUT' => 0], ['https' => 0], false, true, null]],
        875 => [[['_route' => 'admin_setting_shop_calendar_delete', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\CalendarController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        896 => [[['_route' => 'admin_setting_shop_csv', 'id' => 3, '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\CsvController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        927 => [[['_route' => 'admin_setting_shop_delivery_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\DeliveryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        947 => [[['_route' => 'admin_setting_shop_delivery_delete', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\DeliveryController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        971 => [[['_route' => 'admin_setting_shop_delivery_visibility', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\DeliveryController::visibility'], ['id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        993 => [[['_route' => 'admin_setting_shop_mail_edit', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\MailController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        1013 => [[['_route' => 'admin_setting_shop_mail_delete', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\MailController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1044 => [[['_route' => 'admin_setting_shop_payment_edit', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        1065 => [[['_route' => 'admin_setting_shop_payment_delete', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1087 => [[['_route' => 'admin_setting_shop_payment_visible', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\PaymentController::visible'], ['id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        1113 => [[['_route' => 'admin_setting_shop_tax_delete', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\Shop\\TaxRuleController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1156 => [[['_route' => 'admin_setting_system_login_history_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\LoginHistoryController::index'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        1192 => [[['_route' => 'admin_setting_system_masterdata_view', 'entity' => null, '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MasterdataController::index'], ['entity'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        1220 => [[['_route' => 'admin_setting_system_member_edit', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MemberController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        1237 => [[['_route' => 'admin_setting_system_member_up', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MemberController::up'], ['id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        1256 => [[['_route' => 'admin_setting_system_member_down', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MemberController::down'], ['id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        1277 => [[['_route' => 'admin_setting_system_member_delete', '_controller' => 'Eccube\\Controller\\Admin\\Setting\\System\\MemberController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1337 => [[['_route' => 'admin_store_plugin_owners_search_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::search'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        1367 => [[['_route' => 'admin_store_plugin_install_confirm', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::doConfirm'], ['id'], ['GET' => 0], ['https' => 0], false, false, null]],
        1398 => [[['_route' => 'admin_store_plugin_api_uninstall', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::apiUninstall'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1428 => [[['_route' => 'admin_store_plugin_update_confirm', '_controller' => 'Eccube\\Controller\\Admin\\Store\\OwnerStoreController::doUpdateConfirm'], ['id'], ['GET' => 0], ['https' => 0], false, false, null]],
        1450 => [[['_route' => 'admin_store_plugin_update', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::update'], ['id'], ['POST' => 0], ['https' => 0], false, false, null]],
        1471 => [[['_route' => 'admin_store_plugin_enable', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::enable'], ['id'], ['POST' => 0], ['https' => 0], false, false, null]],
        1493 => [[['_route' => 'admin_store_plugin_disable', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::disable'], ['id'], ['POST' => 0], ['https' => 0], false, false, null]],
        1517 => [[['_route' => 'admin_store_plugin_uninstall', '_controller' => 'Eccube\\Controller\\Admin\\Store\\PluginController::uninstall'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1553 => [[['_route' => 'admin_store_template_download', '_controller' => 'Eccube\\Controller\\Admin\\Store\\TemplateController::download'], ['id'], ['GET' => 0], ['https' => 0], false, false, null]],
        1574 => [[['_route' => 'admin_store_template_delete', '_controller' => 'Eccube\\Controller\\Admin\\Store\\TemplateController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1622 => [[['_route' => 'admin_product_category_show', 'parent_id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\CategoryController::index'], ['parent_id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        1645 => [[['_route' => 'admin_product_category_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\CategoryController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        1666 => [[['_route' => 'admin_product_category_delete', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CategoryController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1705 => [[['_route' => 'admin_product_class_category', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassCategoryController::index'], ['class_name_id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        1730 => [[['_route' => 'admin_product_class_category_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassCategoryController::index'], ['class_name_id', 'id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        1757 => [[['_route' => 'admin_product_class_category_delete', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassCategoryController::delete'], ['class_name_id', 'id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1788 => [[['_route' => 'admin_product_class_category_visibility', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassCategoryController::visibility'], ['class_name_id', 'id'], ['PUT' => 0], ['https' => 0], false, false, null]],
        1812 => [[['_route' => 'admin_product_class_category_export', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassCategoryController::export'], ['class_name_id'], ['GET' => 0], ['https' => 0], false, true, null]],
        1840 => [[['_route' => 'admin_product_class_name_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassNameController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        1861 => [[['_route' => 'admin_product_class_name_delete', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ClassNameController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        1885 => [[['_route' => 'admin_product_classes_load', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::loadProductClasses'], ['id'], ['GET' => 0], ['https' => 0], false, false, null]],
        1912 => [[['_route' => 'admin_product_csv_template', '_controller' => 'Eccube\\Controller\\Admin\\Product\\CsvImportController::csvTemplate'], ['type'], ['GET' => 0], ['https' => 0], false, true, null]],
        1950 => [[['_route' => 'admin_product_product_class', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductClassController::index'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        1970 => [[['_route' => 'admin_product_product_class_clear', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductClassController::clearProductClasses'], ['id'], ['POST' => 0], ['https' => 0], false, false, null]],
        1990 => [[['_route' => 'admin_product_product_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        2011 => [[['_route' => 'admin_product_product_delete', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        2030 => [[['_route' => 'admin_product_product_copy', 'id' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::copy'], ['id'], ['POST' => 0], ['https' => 0], false, false, null]],
        2054 => [[['_route' => 'admin_product_page', 'page_no' => null, '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::index'], ['page_no'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        2090 => [[['_route' => 'admin_product_bulk_product_status', '_controller' => 'Eccube\\Controller\\Admin\\Product\\ProductController::bulkProductStatus'], ['id'], ['POST' => 0], ['https' => 0], false, true, null]],
        2115 => [[['_route' => 'admin_product_tag_delete', '_controller' => 'Eccube\\Controller\\Admin\\Product\\TagController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        2157 => [[['_route' => 'cart_handle_item', '_controller' => 'Eccube\\Controller\\CartController::handleCartItem'], ['operation', 'productClassId'], ['PUT' => 0], ['https' => 0], false, true, null]],
        2203 => [[['_route' => 'cart_buystep', '_controller' => 'Eccube\\Controller\\CartController::buystep'], ['cart_key'], ['GET' => 0], ['https' => 0], false, true, null]],
        2251 => [[['_route' => 'entry_activate', 'qtyInCart' => null, '_controller' => 'Eccube\\Controller\\EntryController::activate'], ['secret_key', 'qtyInCart'], ['GET' => 0], ['https' => 0], false, true, null]],
        2282 => [[['_route' => 'forgot_reset', '_controller' => 'Eccube\\Controller\\ForgotController::reset'], ['reset_key'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        2319 => [[['_route' => 'install_plugin_enable', '_controller' => 'Eccube\\Controller\\InstallPluginController::pluginEnable'], ['code'], ['PUT' => 0], ['https' => 0], false, false, null]],
        2361 => [[['_route' => 'mypage_delivery_edit', 'id' => null, '_controller' => 'Eccube\\Controller\\Mypage\\DeliveryController::edit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, false, null]],
        2385 => [[['_route' => 'mypage_delivery_delete', '_controller' => 'Eccube\\Controller\\Mypage\\DeliveryController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        2411 => [[['_route' => 'mypage_history', '_controller' => 'Eccube\\Controller\\Mypage\\MypageController::history'], ['order_no'], ['GET' => 0], ['https' => 0], false, true, null]],
        2434 => [[['_route' => 'mypage_order', '_controller' => 'Eccube\\Controller\\Mypage\\MypageController::order'], ['order_no'], ['PUT' => 0], ['https' => 0], false, true, null]],
        2464 => [[['_route' => 'mypage_favorite_delete', '_controller' => 'Eccube\\Controller\\Mypage\\MypageController::delete'], ['id'], ['DELETE' => 0], ['https' => 0], false, false, null]],
        2499 => [[['_route' => 'product_detail', '_controller' => 'Eccube\\Controller\\ProductController::detail'], ['id'], ['GET' => 0], ['https' => 0], false, true, null]],
        2529 => [[['_route' => 'product_add_favorite', '_controller' => 'Eccube\\Controller\\ProductController::addFavorite'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        2548 => [[['_route' => 'product_add_cart', '_controller' => 'Eccube\\Controller\\ProductController::addCart'], ['id'], ['POST' => 0], ['https' => 0], false, true, null]],
        2589 => [[['_route' => 'shopping_shipping', '_controller' => 'Eccube\\Controller\\ShoppingController::shipping'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        2609 => [[['_route' => 'shopping_shipping_edit', '_controller' => 'Eccube\\Controller\\ShoppingController::shippingEdit'], ['id'], ['GET' => 0, 'POST' => 1], ['https' => 0], false, true, null]],
        2644 => [[['_route' => 'sitemap_product_xml', '_controller' => 'Eccube\\Controller\\SitemapController::product'], ['page'], ['GET' => 0], ['https' => 0], false, false, null]],
        2697 => [
            [['_route' => 'user_data', '_controller' => 'Eccube\\Controller\\UserDataController::index'], ['route'], ['GET' => 0], ['https' => 0], false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];

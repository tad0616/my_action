<?php
use XoopsModules\Tadtools\Utility;

if (empty($op)) {
    $op = 'index';
}
if (empty($op_prfix)) {
    $op_prfix = substr(basename($_SERVER['PHP_SELF']), 0, -4);
}
$TadMod->get_menu('toolbar');
$xoopsTpl->assign('now_op', "{$op_prfix}_{$op}");

$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . basename(__DIR__) . '/css/module.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/tadtools/css/my-input.css');
include_once XOOPS_ROOT_PATH . '/footer.php';

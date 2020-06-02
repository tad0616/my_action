<?php
use Xmf\Request;

require_once dirname(dirname(dirname(__DIR__))) . '/include/cp_header.php';

xoops_loadLanguage('main', $xoopsModule->dirname());

$xoopsOption['template_main'] = $xoopsModule->dirname() . "_admin.tpl";

if (!isset($xoopsTpl) || !is_object($xoopsTpl)) {
    require_once XOOPS_ROOT_PATH . '/class/template.php';
    $xoopsTpl = new \XoopsTpl();
}

xoops_cp_header();

// Define Stylesheet and JScript
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/css/admin.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/' . $xoopsModule->dirname() . '/css/module.css');
$xoTheme->addStylesheet(XOOPS_URL . '/modules/tadtools/css/my-input.css');

$op = Request::getString('op');
$self = Request::getString('PHP_SELF', '', 'SERVER');
$from = Request::getString('HTTP_REFERER', '', 'SERVER');

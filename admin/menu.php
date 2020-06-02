<?php
use XoopsModules\Tadtools\TadMod;
$TadMod = new TadMod(basename(__DIR__));
$TadMod->add_adm_menu('活動管理', 'admin/main.php');
$TadMod->add_adm_menu('分類管理', 'admin/cate.php', 'images/admin/group.png');
$adminmenu = $TadMod->get_adm_menu();

<?php
use XoopsModules\Tadtools\TadMod;
$TadMod = new TadMod(basename(__DIR__));

$TadMod->setup('活動報名', '1.0', '2020/05/31', 'tad0616@gmail.com', 'Tad');
$TadMod->add_config('show_num', '每頁顯示資料數', '', 'textbox', 'int', 20);
$TadMod->add_blocks('action_list', '活動一覽', '', ['顯示資料數' => 5]);

$lang = $TadMod->get_lang('mi');
foreach ($lang as $const_arr) {
    foreach ($const_arr as $const => $value) {
        define($const, $value);
    }
}
$modversion = $TadMod->xoops_version();

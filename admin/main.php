<?php
use XoopsModules\Tadtools\TadModData;
use XoopsModules\Tadtools\Utility;
require_once "header.php";

$Model = new TadModData('my_action');
$clean = $Model->clean();
$cate_arr = $Model->get_arr('my_action_cate', 'cate_id', 'cate_title');
$enable_arr = [1 => '啟用', 0 => '關閉'];
$Model->use_select('cate_id', $cate_arr);
$Model->use_radio('enable', $enable_arr);
$Model->use_ckeditor('action_content', ['setHeight' => 150, 'setToolbarSet' => 'tadSimple']);
$Model->set_file('action_id');
$Model->set_require('action_title', ['minSize' => 3, 'maxSize' => 30]);
$Model->set_require('action_date');
$Model->set_require('action_end_date');
$Model->replace('cate_id', $cate_arr);
$Model->replace('enable', $enable_arr);
$Model->uid_name();
$Model->disable('action_id', ['index', 'show']);
$Model->disable('action_content', ['index']);
$Model->set_link('action_title', 'main.php', ['op' => 'show', 'action_id']);
$Model->pagebar(10);

switch ($op) {
    case "create":
        $Model->create();
        break;

    case "edit":
        $Model->edit($clean['action_id']);
        break;

    case "show":
        $Model->show($clean['action_id']);
        break;

    case "update":
        $Model->update($clean['action_id']);
        header("location:{$self}");
        exit;

    case "store":
        $Model->store();
        header("location:{$self}");
        exit;

    case "destroy":
        $Model->destroy($clean['action_id']);
        header("location:{$self}");
        exit;

    default:
        $Model->index();
        break;
}
require_once "footer.php";

<?php
use XoopsModules\Tadtools\TadModData;
use XoopsModules\Tadtools\Utility;
require_once "header.php";

$Model = new TadModData('my_action_cate');
$Model->set_sort('cate_sort');
$clean = $Model->clean();

switch ($op) {
    case "create":
        $Model->create();
        break;

    case "edit":
        $Model->edit($clean['cate_id']);
        break;

    case "show":
        $Model->show($clean['cate_id']);
        break;

    case "update":
        $Model->update($clean['cate_id']);
        header("location:{$self}");
        exit;

    case "store":
        $Model->store();
        header("location:{$self}");
        exit;

    case "destroy":
        $Model->destroy($clean['cate_id']);
        header("location:{$self}");
        exit;

    default:
        $Model->index();
        break;
}
require_once "footer.php";

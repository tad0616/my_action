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
$Model->replace('cate_id', $cate_arr);
$Model->replace('enable', $enable_arr);
$Model->uid_name();
$Model->disable('action_id', ['index', 'show']);
$Model->disable('action_title', ['show']);
$Model->disable('action_content', ['index']);
$Model->set_link('action_title', '', ['op' => 'show', 'action_id']);
$Model->pagebar(10);
$Model->set_func('create', 'admin/main.php');
$Model->set_func('edit', 'admin/main.php');
$Model->set_func('destroy', false);
$Model->add_button('我要報名', '', ['op' => 'create', 'action_id'], ['class' => 'btn btn-sm btn-primary'], ['index', 'show']);
$Model->set_attr('table', ['class' => 'table table-hover table-striped table-sm']);
$Model->set_attr('tr1', ['class' => 'bg-warning white']);

$ApplyModel = new TadModData('my_action_apply');
$ApplyModel->set_hidden('action_id', $clean['action_id']);
$ApplyModel->set_hidden('apply_date', date("Y-m-d H:i:s"));
$ApplyModel->set_require('phone', ['custom' => 'phone']);
$ApplyModel->set_submit('op', 'store', '我要報名', 'fa-plus');
$ApplyModel->allow(['create', 'edit', 'store', 'update', 'destroy'], [2]);
$ApplyModel->set_attr('table', ['class' => 'table table-hover table-striped']);
$ApplyModel->set_attr('tr1', ['class' => 'bg-success white']);

switch ($op) {
    case "create":
        $ApplyModel->create();
        break;

    case "edit":
        $ApplyModel->edit($clean['apply_id']);
        break;

    case "show":
        $Model->show($clean['action_id']);
        $ApplyModel->where(['action_id' => $clean['action_id']]);
        $ApplyModel->uid_name();
        $ApplyModel->disable('action_id');
        $ApplyModel->disable('phone', ['index'], [1]);
        $ApplyModel->replace('uid', [], ['substr_replace' => ['this', '〇', 3, 3]], [1]);
        $ApplyModel->index();
        break;

    case "update":
        $ApplyModel->update($clean['apply_id']);
        header("location:{$from}");
        exit;

    case "store":
        $ApplyModel->store();
        header("location:{$from}");
        exit;

    case "destroy":
        $ApplyModel->destroy($clean['apply_id']);
        header("location:{$from}");
        exit;

    default:
        $Model->index();
        break;
}
require_once "footer.php";

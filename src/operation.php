<?
session_start();
$action = $_POST['btn'];
switch ($action) {
    case 'Add':
        if($_POST['todo']==''){
            return header('Location:/index.php');
            
        }
         if (gettype($_SESSION['list']) == 'array') {
            array_push($_SESSION['list'], $_POST['todo']);
        } else {
            $_SESSION['list'] = array($_POST['todo']);
        }
        break;
    case 'Update':
        array_splice($_SESSION['list'], $_GET['id'], 1, $_POST['todo']);
        break;
    case 'update':
        array_splice($_SESSION['todo'], $_GET['id'], 1, $_POST['todo']);
    
}
header('Location:/index.php');
$op = $_GET['op'];
switch ($op) {
    case 'del':
        array_splice($_SESSION['list'], $_GET['id'], 1);
        break;
    case 'c':
        if (gettype($_SESSION['todo']) == 'array') {
            array_push($_SESSION['todo'], $_SESSION['list'][$_GET['id']]);
            array_splice($_SESSION['list'], $_GET['id'], 1);
        } else {
            $_SESSION['todo'] = array($_SESSION['list'][$_GET['id']]);
            array_splice($_SESSION['list'], $_GET['id'], 1);
        }
        break;
    case 'deld':
        array_splice($_SESSION['todo'], $_GET['id'], 1);
        break;


}
header('Location:/index.php');

<?php
$action  = isset($_GET['act']) ? $_GET['act'] : 'index';

switch ($action) {
    case 'admin':
        include '../views/admin/index.php';
        break;
    case 'product';
        include '../views/admin/product/list.php';
        break;
    case 'product-create';
        include '../views/admin/category/create.php';
        break;
    case 'product-edit';
        include '../views/admin/category/edit.php';
        break;
    case 'category';
        include '../views/admin/category/list.php';
        break;

    case 'category-create';
        include '../views/admin/category/create.php';
        break;
    case 'category-edit';
        include '../views/admin/category/edit.php';
        break;
    //=======================================================================

    case 'index';
        include '../views/client/index.php';
        break;
        case 'login';
        include '../views/client/auth/login.php';
        break;
        case 'register';
        include '../views/client/auth/register.php';
        break;
}

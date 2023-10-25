<?php
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    switch($page) {
        case'';
        case 'home':
            file_exists('partials/pages/home.php') ? include 'partials/pages/home.php' : include 'partials/pages/404.php';
            break;
            case 'user-read':
                file_exists('partials/pages/user/userRead.php') ? include 'partials/pages/user/userRead.php' : include 'partials/pages/404.php';
                break;
            case 'user-add':
                file_exists('partials/pages/user/userAdd.php') ? include 'partials/pages/user/userAdd.php' : include 'partials/pages/404.php';
                break;
            case 'user-update':
                file_exists('partials/pages/user/userEdit.php') ? include 'partials/pages/user/userEdit.php' : include 'partials/pages/404.php';
                break;
            case 'user-delete':
                file_exists('partials/pages/user/userDelete.php') ? include 'partials/pages/user/userDelete.php' : include 'partials/pages/404.php';
                break;
            case 'mahasiswa-read':
                file_exists('partials/pages/mahasiswa/mahasiswaRead.php') ? include 'partials/pages/mahasiswa/mahasiswaRead.php' : include 'partials/pages/404.php';
                break;
            case 'mahasiswa-add':
                file_exists('partials/pages/mahasiswa/mahasiswaAdd.php') ? include 'partials/pages/mahasiswa/mahasiswaAdd.php' : include 'partials/pages/404.php';
                break;
            case 'mahasiswa-update':
                file_exists('partials/pages/mahasiswa/mahasiswaEdit.php') ? include 'partials/pages/mahasiswa/mahasiswaEdit.php' : include 'partials/pages/404.php';
                break;
            case 'mahasiswa-delete':
                file_exists('partials/pages/mahasiswa/mahasiswaDelete.php') ? include 'partials/pages/mahasiswa/mahasiswaDelete.php' : include 'partials/pages/404.php';
                break;
            default :
            include 'partials/pages/404.php';
    } 
} else {
    include 'partials/pages/home.php';
}
?>
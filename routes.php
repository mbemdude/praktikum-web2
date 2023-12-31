<?php
if(isset($_GET['page'])) {
    $page = $_GET['page'];

    if (isset($_SESSION['user_id'])) {
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
                case 'dosen-read':
                    file_exists('partials/pages/dosen/dosenRead.php') ? include 'partials/pages/dosen/dosenRead.php' : include 'partials/pages/404.php';
                    break;
                case 'dosen-add':
                    file_exists('partials/pages/dosen/dosenAdd.php') ? include 'partials/pages/dosen/dosenAdd.php' : include 'partials/pages/404.php';
                    break;
                case 'dosen-update':
                    file_exists('partials/pages/dosen/dosenEdit.php') ? include 'partials/pages/dosen/dosenEdit.php' : include 'partials/pages/404.php';
                    break;
                case 'dosen-delete':
                    file_exists('partials/pages/dosen/dosenDelete.php') ? include 'partials/pages/dosen/dosenDelete.php' : include 'partials/pages/404.php';
                    break;
                default :
                include 'partials/pages/404.php';
        } 
    } else {
        header("Location: login.php");
        exit();
    }
} else {
    include 'partials/pages/home.php';
}
?>
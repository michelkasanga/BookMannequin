<?php

use App\App;
use App\Controller\Admin\AdminController;
use App\Controller\Admin\ProfileController;
use App\Controller\LoadController;
use App\Controller\UserController;

define('ROOT', dirname(__DIR__));
require ROOT . '/App/App.php';
App::load();
$app = new App();

if (isset($_GET['src'])) {
    $src = $_GET['src'];
} else {
    $src = 'home';
}

if ($src === 'home') {
    $controller = new LoadController();
    $controller->index();
} elseif ($src === 'eadc0b9a6acab4fd42a4f6ea816e8e27e162216e') {
    $controller = new LoadController();
    $controller->findNotice();
} elseif ($src === 'file') {
    require ROOT . '/App/View/pages/file.php';
} elseif ($src === 'pages.oneNew') {
    $controller = new LoadController();
    $controller->oneNew();
} elseif ($src === 'pages.oneModel') {
    $controller = new LoadController();
    $controller->oneModel();
} elseif ($src === 'findCompetition') {
    $controller = new LoadController();
    $controller->findCompetition();
} elseif ($src === '9f3642c94c2f071704f2ac2ad3a0b1891634b9b9') {
    $controller = new LoadController();
    $controller->About();
} elseif ($src === '34d2405248f96f68a53d744975dace088147607a') {
    $controller = new LoadController();
    $controller->ArticleFind();
} elseif ($src === 'a9d24446cc1e471bf68005f34aa199e18f46287f') {
    $controller = new LoadController();
    $controller->Articles();
} elseif ($src === 'login') {

    $controller = new UserController();
    $controller->login();
} elseif ($src === 'competition') {
    $controller = new LoadController();
    $controller->Competition();
} elseif ($src === '3c6bdcddc94f64bf77deb306aae490a90a6fc300') {
    $controller = new LoadController();
    $controller->News();
} elseif ($src === '5854a82bc4373373f08e11b4ba52e373bc3ccdc7') {
    $controller = new LoadController();
    $controller->getForbidden();
} elseif ($src === 'a83d4bf9070ae6eb080b4cc7b2703e17a51172ae') {
    $controller = new LoadController();
    $controller->getNotFound();
} elseif ($src === 'e2bdf092171e62ed1823a26b139c920be4aa8ad0') {
    $controller = new AdminController();
    $controller->index();
} elseif ($src === 'addNotice') {
    $controller = new AdminController();
    $controller->AddNotice();
} elseif ($src === 'tables') {
    $controller = new AdminController();
    $controller->tables();
} elseif ($src === 'addModel') {
    $controller = new AdminController();
    $controller->AddModel();
} elseif ($src === 'addService') {
    $controller = new AdminController();
    $controller->AddService();
} elseif ($src === 'addNews') {
    $controller = new AdminController();
    $controller->AddNews();
} elseif ($src === 'addArticle') {
    $controller = new AdminController();
    $controller->AddArticle();
} elseif ($src === 'addEvent') {
    $controller = new AdminController();
    $controller->addEvent();
} elseif ($src === 'addCategory_model') {
    $controller = new AdminController();
    $controller->addCategory_model();
} elseif ($src === 'addCompet') {
    $controller = new AdminController();
    $controller->AddCompetition();
} elseif ($src === 'addManager') {
    $controller = new AdminController();
    $controller->addManager();
} elseif ($src === 'addPersonne') {
    $controller = new AdminController();
    $controller->AddPersonne();
} elseif ($src === 'editNews') {
    $controller = new AdminController();
    $controller->editNews();
} elseif ($src === 'editArticle') {
    $controller = new AdminController();
    $controller->editArticle();
} elseif ($src === 'editLevel') {
    $controller = new AdminController();
    $controller->editLevel();
} elseif ($src === 'editCategory_model') {
    $controller = new AdminController();
    $controller->editCategory_model();
} elseif ($src === 'editCompetence') {
    $controller = new AdminController();
    $controller->EditAboutCompetence();
} elseif ($src === 'editContent') {
    $controller = new AdminController();
    $controller->EditAboutContent();
} elseif ($src === 'editpictures') {
    $controller = new AdminController();
    $controller->EditAboutPictures();
} elseif ($src === 'editPicture1') {
    $controller = new AdminController();
    $controller->EditAboutPicture1();
} elseif ($src === 'editPicture2') {
    $controller = new AdminController();
    $controller->EditAboutPicture2();
} elseif ($src === 'editService') {
    $controller = new AdminController();
    $controller->EditService();
} elseif ($src === 'editPicture3') {
    $controller = new AdminController();
    $controller->EditAboutPicture3();
} elseif ($src === 'editNotice') {
    $controller = new AdminController();
    $controller->editNotice();
} elseif ($src === 'editModel') {
    $controller = new AdminController();
    $controller->editModel();
} elseif ($src === 'editCompet') {
    $controller = new AdminController();
    $controller->editCompet();
} elseif ($src === 'editManager') {
    $controller = new AdminController();
    $controller->editManager();
} elseif ($src === 'editeManager') {
    $controller = new AdminController();
    $controller->EditeManager();
} elseif ($src === 'editPersonne') {
    $controller = new AdminController();
    $controller->editPersonne();
} elseif ($src === 'editPersonneContent') {
    $controller = new AdminController();
    $controller->editPersonneContent();
} elseif ($src === 'editPersonnePicture') {
    $controller = new AdminController();
    $controller->editPersonnePicture();
} elseif ($src === 'editPersonneTitle') {
    $controller = new AdminController();
    $controller->editPersonneTitle();
} elseif ($src === 'addAbout') {
    $controller = new AdminController();
    $controller->AddAbout();
} elseif ($src === 'deleteNews') {
    $controller = new AdminController();
    $controller->deleteNews();
} elseif ($src === 'deleteArticle') {
    $controller = new AdminController();
    $controller->deleteArticle();
} elseif ($src === 'deleteNotice') {
    $controller = new AdminController();
    $controller->deleteNotice();
} elseif ($src === 'deleteModel') {
    $controller = new AdminController();
    $controller->deleteModel();
} elseif ($src === 'deleteService') {
    $controller = new AdminController();
    $controller->deleteService();
} elseif ($src === 'deleteCompet') {
    $controller = new AdminController();
    $controller->deleteCompet();
} elseif ($src === 'deletePersonne') {
    $controller = new AdminController();
    $controller->deletePersonne();
} 
elseif($src=== 'deleteEvent'){
    $controller = new AdminController();
    $controller->deleteEvent();
}
elseif ($src === 'delete_1a8565a9dc72048ba03b4156be3e569f22771f23') {
    $controller = new AdminController();
    $controller->deletemanager();
} elseif ($src === 'factory') {
    $controller = new AdminController();
    $controller->factory();
} elseif ($src === 'notice') {
    $controller = new AdminController();
    $controller->noticeFind();
} elseif ($src === 'news') {
    $controller = new AdminController();
    $controller->newsFind();
} elseif ($src === 'model') {
    $controller = new AdminController();
    $controller->modelFind();
} elseif ($src === 'article') {
    $controller = new AdminController();
    $controller->ArticleFind();
} elseif ($src === 'viewEvent') {
    $controller = new AdminController();
    $controller->EventFind();
} 
elseif ($src === 'viewGuests') {
    $controller = new AdminController();
    $controller->GuestFind();
} 
elseif ($src === 'personne') {
    $controller = new AdminController();
    $controller->PersonFind();
} elseif ($src === '_c_o_m_p_e_t_i_t_i_o_n_') {
    $controller = new AdminController();
    $controller->CompetitionFind();
} elseif ($src === 'add_picture_model') {
    $controller = new AdminController();
    $controller->addPictureModel();
} elseif ($src === '5cc91d5ef4ee351d0d02593bdd83b9e3840940c6') {
    $controller = new AdminController();
    $controller->addPictureCompetition();
} elseif ($src === 'profile') {
    $controller = new ProfileController();
    $controller->profile();
} elseif ($src === 'signUp') {
    $controller = new ProfileController();
    $controller->signUp();
} elseif ($src === 'logOut') {
    $controller = new UserController();
    $controller->logOut();
} elseif ($src === 'changeProfilePicture') {
    $controller = new ProfileController();
    $controller->changeProfilePicture();
} elseif ($src === 'setInformationUser') {
    $controller = new ProfileController();
    $controller->setInformationUser();
} elseif ($src === 'setProfile') {
    $controller = new ProfileController();
    $controller->setProfile();
} elseif ($src === 'iconInsert') {
    $controller = new AdminController();
    $controller->icons();
} elseif ($src === 'admin') {
    $controller = new AdminController();
    $controller->index();
} 
elseif ($src === 'roxanne') {
    $controller = new AdminController();
    $controller->index();
} else {
    header('Location:?src=a83d4bf9070ae6eb080b4cc7b2703e17a51172ae');
}

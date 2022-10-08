<?php

namespace App\Controller\Admin;

use App\App;
use App\Controller\Admin\AppController;

class AdminController extends AppController
{
    public function __construct()
    {

        parent::__construct();
        $this->loadClass("Notice");
        $this->loadClass("News");
        $this->loadClass("Model");
        $this->loadClass("About");
        $this->loadClass("Comment");
        $this->loadClass("File");
        $this->loadClass('Category_model');
        $this->loadClass('Article');
        $this->loadClass('Competition');
        $this->loadClass('Level_competition');
        $this->loadClass('Manager');
        $this->loadClass('Club');
        $this->loadClass('Comment_article');
        $this->loadClass('Auth');
        $this->loadClass('Service');
        $this->loadClass('Icons');
        $this->loadClass('Event');
        $this->loadClass('GuestEvent');
    }
    public function index()
    {

        $notice = $this->Notice->noticeSelect();
        $notice_all = $this->Notice->all();
        $news = $this->News->lastNews();
        $news_all = $this->News->all();
        $model = $this->Model->all();
        $about = $this->About->all();
        $comment = $this->Comment->all();
        $article = $this->Article->all();
        $event = $this->Event->all();
    



        $notice_count = count($notice_all);
        $pourcentage_notice =  ($notice_count * 100) / 5000;
        $news_count = count($news_all);
        $pourcentage_news = ($news_count * 100) / 5000;
        $model_count = count($model);
        $pourcentage_model = ($model_count * 100) / 5000;
        $article_count = count($article);
        $pourcentage_article = ($article_count * 100) / 5000;

        if (count($this->Level_competition->all()) == 0) {
            $this->Level_competition->create([
                'title' => "finale remporter",
                'percentage' => 100,
                'color' => "#15ff00",
                'stars' => "&#8902 &#8902 &#8902 &#8902 &#8902 &#8902 ",
                'number_stars' => 6
            ]);

            $this->Level_competition->create([
                'title' => "finale perdue",
                'percentage' => 90,
                'color' => "#0044ff",
                'stars' => " &#8902 &#8902 &#8902 &#8902 &#8902 ",
                'number_stars' => 5
            ]);

            $this->Level_competition->create([
                'title' => "Eliminer en demi-finale",
                'percentage' => 75,
                'color' => "#00d9ff",
                'stars' => "&#8902 &#8902 &#8902 &#8902 ",
                'number_stars' => 4
            ]);

            $this->Level_competition->create([
                'title' => "Eliminer en quart de finale",
                'percentage' => 60,
                'color' => "#fbff00",
                'stars' => "&#8902 &#8902 &#8902 ",
                'number_stars' => 3
            ]);

            $this->Level_competition->create([
                'title' => "Eliminer en huitième de finale",
                'percentage' => 45,
                'color' => "#ffa600",
                'stars' => " &#8902 &#8902 ",
                'number_stars' => 2
            ]);

            $this->Level_competition->create([
                'title' => "Eliminer en phase de groupe",
                'percentage' => 30,
                'color' => "#e75c259c",
                'stars' => " &#8902 ",
                'number_stars' => 1
            ]);

            $this->Level_competition->create([
                'title' => "Participer mais rejeter ",
                'percentage' => 15,
                'color' => "#fd00009c",
                'stars' => " ",
                'number_stars' => 0
            ]);
        }

       

        $this->defaultAdmin(
            "pages.admin.pages.index",
            compact(
                "notice_count",
                "notice_all",
                "pourcentage_notice",
                "article_count",
                "pourcentage_article",
                "model_count",
                "pourcentage_model",
                "news_count",
                "pourcentage_news",
                "news",
                "model",
                "about",
                "event"
            )
        );
    }
    public function tables()
    {
        $news = $this->News->all();
        $models = $this->Model->all();
        $category = $this->Category_model->all();
        $article = $this->Article->all();
        $competition = $this->Competition->all();
        $clubs = $this->Club->all();
        $services = $this->Service->allDESC();




        $this->defaultAdmin("pages.admin.pages.tables", compact('news', 'models', 'category', 'article', 'competition', 'clubs', 'services'));
    }
    public function AddAbout()
    {
        $title = 'parlez a propos de vous';

        $lien = '?src=factory&id=' . $_GET['id'];
        $picture1 = $this->File->upload('picture1', 'App/Photo/About/');
        $picture2 = $this->File->upload('picture2', 'App/Photo/About/');
        $picture3 = $this->File->upload('picture3', 'App/Photo/About/');
        if (!empty($_POST['title']) and !empty($_POST['content']) and !empty($_POST['competence'])) :
            if (isset($_POST['title']) and isset($_POST['content']) and isset($_POST['competence']) and isset($picture1) and isset($picture2) and isset($picture3)) :

                $this->About->create([

                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'competence' => $_POST['competence'],
                    'picture1' => $picture1,
                    'picture2' => $picture2,
                    'picture3' => $picture3

                ]);
                header('Location:?src=factory');
            endif;
        endif;
        $this->find("pages.admin.pages.addAbout", compact('title', 'lien'));
    }

    public function AddService()
    {
        $title = 'Ajouter un service';
        $findIcon = $this->Icons->all();

        if (!empty($_POST['title']) and !empty($_POST['content']) and !empty($_POST['icon'])) :
            if (isset($_POST['title']) and isset($_POST['icon']) and isset($_POST['content'])) :

                $this->Service->create([
                    'title' => $_POST['title'],
                    'idIcon' => $_POST['icon'],
                    'detail' => $_POST['content'],
                    'date' => date('Y-m-d H:i:s')

                ]);

                header('Location:?src=tables');
            endif;
        endif;

        $this->find("pages.admin.pages.addService", compact('title', 'findIcon'));
    }

    public function AddNotice()
    {
        $title = 'ajouter une annoce';
        $view ="";
        if (!empty($_POST['title']) and !empty($_POST['content'])) :
            if (isset($_POST['title']) and isset($_POST['content']) ) :
                if($_POST['view'] == "on"){
                $res = $this->Notice->create([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'date' => date('Y-m-d H:i:s'),
                    'view' =>1
                ]);
            }else{
                $res = $this->Notice->create([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'date' => date('Y-m-d H:i:s'),
                    'view' =>0
                ]);
            }
                header('Location:?src=e2bdf092171e62ed1823a26b139c920be4aa8ad0');
            endif;
        endif;
        $this->default2("pages.admin.pages.addNotice", compact("title"));
    }

    public function AddNews()
    {
        $title = 'Ajouter une Nouvelle';
        $time = time();
        $picture = $this->File->upload('picture', 'App/Photo/NewsPicture/');
        if (!empty($_POST['title']) and !empty($_POST['content'])) :
            if (isset($_POST['title']) and isset($_POST['content']) and isset($picture)) :

                $res = $this->News->create([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'picture' => "$picture",
                    'date' => date('Y-m-d H:i:s'),
                    'time' => "$time"
                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find2("pages.admin.pages.addNews", compact('title'));
    }
    public function AddPersonne()
    {
        $title = 'Ajouter une personne de votre club';
        $time = time();
        $picture = $this->File->upload('picture', 'App/Photo/ClubPicture/');
        if (!empty($_POST['title']) and !empty($_POST['content']) and !empty($_POST['url'])  and !empty($_POST['name'])) :
            if (isset($_POST['title']) and isset($_POST['content']) and isset($_POST['url']) and isset($_POST['name']) and isset($picture)) :

                $res = $this->Club->create([
                    'name' => $_POST['name'],
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'url' => $_POST['url'],
                    'picture' => "$picture",
                    'date' => date('Y-m-d H:i:s'),

                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find("pages.admin.pages.addPersonne", compact('title'));
    }
    public function AddArticle()
    {
        $title = 'Ajouter un Article';
        $time = time();
        $picture = $this->File->upload('picture', 'App/Photo/ArticlePicture/');
        if (!empty($_POST['title']) and !empty($_POST['content'])) :
            if (isset($_POST['title']) and isset($_POST['content']) and isset($picture)) :
                if($_POST['view'] == 'on'){
                     $res = $this->Article->create([
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'picture' => "$picture",
                    'date' => date('Y-m-d H:i:s'),
                    'time' => "$time",
                    'view'=>1
                ]);
                }else{
                    $res = $this->Article->create([
                        'title' => $_POST['title'],
                        'content' => $_POST['content'],
                        'picture' => "$picture",
                        'date' => date('Y-m-d H:i:s'),
                        'time' => "$time",
                        'view'=>0
                    ]); 
                }
               
                header('Location:?src=tables');
            endif;
        endif;
        $this->default2("pages.admin.pages.addArticle", compact('title'));
    }

    public function AddModel()
    {
        $time = time();
        $category = $this->Category_model->all();
        $picture = $this->File->upload('picture', 'App/Photo/ModelPicture/');
        if (!empty($_POST['category'])) :
            if (isset($_POST['category']) and isset($picture)) :

                $res = $this->Model->create([
                    'picture' => "$picture",
                    'picture2' => '',
                    'date' => date('Y-m-d H:i:s'),
                    'time' => "$time",
                    'category_id' => $_POST['category']

                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find2("pages.admin.pages.addModel", compact('category'));
    }

    public function  addEvent()
    {
       $model = "";
        $time = time();
        $picture = $this->File->upload('picture', 'App/Photo/EventPicture/');

        if (!empty($_POST)) :
            if (isset($_POST)) :
                $this->Event->create([
                    'title' => $_POST['title'],
                    'dateEvent' => $_POST['dateEvent'],
                    'detail' => $_POST['detail'],
                    'picture' => "$picture",
                    'date' => date('Y-m-d H:i:s'),
                    'time' => "$time"


                ]);
                header('Location:?src=admin');
            endif;
        endif;
        $this->default2("pages.admin.pages.addEvent", compact('model'));
    }

    public function AddCompetition()
    {
        $title = 'Ajouter une Competition';
        $time = time();
        $level = $this->Level_competition->all();
        $manager = $this->Manager->all();
        $picture = $this->File->upload('picture', 'App/Photo/CompetitionPicture/');

        if (
            !empty($_POST['name_compet']) and !empty($_POST['link_compet'])
            and !empty($_POST['level']) and !empty($_POST['info_manager'])
            and !empty($_POST['detail'])
        ) :

            if (
                isset($_POST['name_compet']) and isset($_POST['link_compet'])
                and isset($_POST['level']) and isset($_POST['info_manager'])
                and isset($_POST['detail']) and isset($picture)
            ) :

                $res = $this->Competition->create([
                    'name_compet' => $_POST['name_compet'],
                    'link_compet' => $_POST['link_compet'],
                    'level' => $_POST['level'],
                    'info_manager' => $_POST['info_manager'],
                    'detail' => $_POST['detail'],
                    'picture' => "$picture",
                    'picture2' => '',
                    'date' => date('Y-m-d H:i:s'),
                    'time' => "$time"

                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find2("pages.admin.pages.addCompet", compact('level', 'title', 'manager'));
    }

    public function addCategory_model()
    {
        $title = "Ajouter une categories ";
        if (!empty($_POST['category'])) :
            if (isset($_POST['category'])) :

                $res = $this->Category_model->create([

                    'title' => $_POST['category']

                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find2("pages.admin.pages.addCategory_model", compact("title"));
    }

    public function addManager()
    {
        $title = 'Ajouter un mannager';
        if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['number_phone']) and !empty($_POST['sex']) and !empty($_POST['nationality']) and !empty($_POST['year_b'])) :
            if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['number_phone']) and isset($_POST['sex']) and isset($_POST['nationality']) and isset($_POST['year_b'])) :

                $res = $this->Manager->create([

                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'number_phone' => $_POST['number_phone'],
                    'sex' => $_POST['sex'],
                    'nationality' => $_POST['nationality'],
                    'year_b' => $_POST['year_b'],
                    'date' => date('Y-m-d H:i:s')

                ]);
                header('Location:?src=factory');
            endif;
        endif;
        $this->find2("pages.admin.pages.addManager", compact('title'));
    }

    public function EditAboutCompetence()
    {
        $title = 'Editer vos competences';

        $lien = '?src=factory&id=' . $_GET['id'];
        $find = $this->About->find($_GET['id']);

        if (!empty($_POST['competence'])) :
            if (isset($_POST['competence'])) :

                $this->About->update($_GET['id'], [
                    'competence' => $_POST['competence']

                ]);
                header('Location:?src=factory');
            endif;
        endif;
        $this->find("pages.admin.pages.editAboutCompetence", compact('title', 'lien', 'find'));
    }
    public function EditAboutPictures()
    {
        $title = 'Modifier vos photos';

        $find = $this->About->find($_GET['id']);


        $this->find("pages.admin.pages.views", compact('title', 'find'));
    }
    public function EditAboutPicture1()
    {
        $title = 'Modifier la photo';

        $find = $this->About->find($_GET['id']);


        $picture = $this->File->upload('picture', 'App/Photo/About/');

        if (isset($picture)) :

            $this->About->update($_GET['id'], [


                'picture1' => "$picture"


            ]);
            header('Location:?src=editpictures&id=' . $_GET['id']);
        endif;

        $this->find("pages.admin.pages.editPicture1", compact('title', 'find'));
    }
    public function EditAboutPicture2()
    {
        $title = 'Modifier la photo';

        $find = $this->About->find($_GET['id']);


        $picture = $this->File->upload('picture', 'App/Photo/About/');

        if (isset($picture)) :

            $this->About->update($_GET['id'], [


                'picture2' => "$picture"


            ]);
            header('Location:?src=editpictures&id=' . $_GET['id']);
        endif;

        $this->find("pages.admin.pages.editPicture2", compact('title', 'find'));
    }
    public function EditAboutPicture3()
    {
        $title = 'Modifier la photo';

        $find = $this->About->find($_GET['id']);


        $picture = $this->File->upload('picture', 'App/Photo/About/');

        if (isset($picture)) :

            $this->About->update($_GET['id'], [


                'picture3' => "$picture"


            ]);
            header('Location:?src=editpictures&id=' . $_GET['id']);
        endif;

        $this->find("pages.admin.pages.editPicture3", compact('title', 'find'));
    }
    public function  editEvent()
    {
      
        $find = $this->Event->find($_GET['id']);
        if (!empty($_POST)) :
            if (isset($_POST)) :
                $this->Event->update($_GET['id'],[
                    'title' => $_POST['title'],
                    'dateEvent' => $_POST['dateEvent'],
                    'detail' => $_POST['detail']
                    


                ]);
                header('Location:?src=admin');
            endif;
        endif;
        $date = date_format(date_create($find->dateEvent),'d-m-Y  H:i');
        $this->default2("pages.admin.pages.editEvent", compact('find','date'));
    }

    public function EditService()
    {
        $title = 'editer  ce  Service';
        $findIcon = $this->Icons->all();
        $find = $this->Service->find($_GET['id']);
        if (!empty($_POST['title']) and !empty($_POST['content']) and !empty($_POST['icon'])) :
            if (isset($_POST['title']) and isset($_POST['icon']) and isset($_POST['content'])) :

                $this->Service->update($_GET['id'], [
                    'title' => $_POST['title'],
                    'idIcon' => $_POST['icon'],
                    'detail' => $_POST['content'],

                ]);

                header('Location:?src=tables');
            endif;
        endif;

        $this->find("pages.admin.pages.editService", compact('title', 'findIcon', 'find'));
    }

    public function EditAboutContent()
    {
        $title = 'Editer vos  contenus';

        $lien = '?src=factory&id=' . $_GET['id'];
        $find = $this->About->find($_GET['id']);

        if (!empty($_POST['content'])) :
            if (isset($_POST['content'])) :

                $this->About->update($_GET['id'], [
                    'content' => $_POST['content']

                ]);
                header('Location:?src=factory');
            endif;
        endif;
        $this->find("pages.admin.pages.editAboutContent", compact('title', 'lien', 'find'));
    }
    public function editPersonne()
    {
        $find = $this->Club->find($_GET['id']);
        $type = 'text';
        $title = 'Editer le contenue de ' . $find->name;
        $reset = 'tables&id=' . $_GET['id'];
        $titre = 'Titre de la personne';


        if (!empty($_POST['title']) and !empty($_POST['content'])) :
            if (isset($_POST['title']) and isset($_POST['content'])) :

                $this->Club->update($_GET['id'], [

                    'title' => $_POST['title'],
                    'content' => $_POST['content']


                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find("pages.admin.pages.editPersonne", compact('title', 'find', 'type', 'reset', 'titre'));
    }
    public function editPersonneContent()
    {
        $find = $this->Club->find($_GET['id']);
        $type = 'hidden';
        $title = 'Editer le contenue de ' . $find->name;
        $reset = 'personne&id=' . $_GET['id'];
        $titre  = '';


        if (!empty($_POST['content'])) :
            if (isset($_POST['content'])) :

                $this->Club->update($_GET['id'], [


                    'content' => $_POST['content']


                ]);
                header('Location:?src=personne&id=' . $_GET['id']);
            endif;
        endif;
        $this->find("pages.admin.pages.editPersonne", compact('title', 'find', 'type', 'reset', 'titre'));
    }
    public function editPersonnePicture()
    {
        $find = $this->Club->find($_GET['id']);
        $title = 'Editer le contenue de ' . $find->name;
        $reset = 'personne&id=' . $_GET['id'];

        $picture = $this->File->upload('picture', 'App/Photo/ClubPicture/');

        if (isset($picture)) :

            $this->Club->update($_GET['id'], [


                'picture' => "$picture"


            ]);
            header('Location:?src=personne&id=' . $_GET['id']);
        endif;

        $this->find("pages.admin.pages.editPicture", compact('title', 'find', 'reset'));
    }
    public function editPersonneTitle()
    {
        $find = $this->Club->find($_GET['id']);
        $title = 'Editer le contenue de ' . $find->name;
        $reset = 'personne&id=' . $_GET['id'];


        if (!empty($_POST['title'])) :
            if (isset($_POST['title'])) :

                $this->Club->update($_GET['id'], [


                    'title' => $_POST['title']


                ]);
                header('Location:?src=personne&id=' . $_GET['id']);
            endif;
        endif;

        $this->find("pages.admin.pages.editTitle", compact('title', 'find', 'reset'));
    }

    public function editManager()
    {
        $find = $this->Manager->find($_GET['id']);

        if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['number_phone']) and !empty($_POST['sex']) and !empty($_POST['nationality']) and !empty($_POST['year_b'])) :
            if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['number_phone']) and isset($_POST['sex']) and isset($_POST['nationality']) and isset($_POST['year_b'])) :

                $this->Manager->update($_GET['id'], [

                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'number_phone' => $_POST['number_phone'],
                    'sex' => $_POST['sex'],
                    'nationality' => $_POST['nationality'],
                    'year_b' => $_POST['year_b']

                ]);
                header('Location:?src=factory');
            endif;
        endif;
        $this->find2("pages.admin.pages.editManager", compact('find'));
    }

    public function EditeManager()
    {
        $find = $this->Manager->find($_GET['id']);
        $fd = $this->Competition->all();
        foreach ($fd as $fid) {
            $fi = $fid->ID;
        }

        $lien = '?src=_c_o_m_p_e_t_i_t_i_o_n_&id=' . $fi;
        if (!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['number_phone']) and !empty($_POST['sex']) and !empty($_POST['nationality']) and !empty($_POST['year_b'])) :
            if (isset($_POST['name']) and isset($_POST['email']) and isset($_POST['number_phone']) and isset($_POST['sex']) and isset($_POST['nationality']) and isset($_POST['year_b'])) :

                $this->Manager->update($_GET['id'], [

                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'number_phone' => $_POST['number_phone'],
                    'sex' => $_POST['sex'],
                    'nationality' => $_POST['nationality'],
                    'year_b' => $_POST['year_b']

                ]);
                header('Location:?src=_c_o_m_p_e_t_i_t_i_o_n_&id=' . $fi);
            endif;
        endif;
        $this->find2("pages.admin.pages.editManager", compact('find', 'lien'));
    }

    public function editCompet()
    {

        $level = $this->Level_competition->all();
        $manager = $this->Manager->all();
        $find = $this->Competition->find($_GET['id']);
        $title = 'Editer la  Competition ' . $find->name_compet;

        if (
            !empty($_POST['name_compet'])
            and !empty($_POST['level'])
            and !empty($_POST['detail'])
        ) :

            if (isset($_POST['name_compet']) and isset($_POST['level']) and isset($_POST['detail'])) :

                $res = $this->Competition->update($_GET['id'], [
                    'name_compet' => $_POST['name_compet'],
                    'level' => $_POST['level'],
                    'detail' => $_POST['detail']
                ]);
                header('Location:?src=tables');
            endif;
        endif;
        $this->find2("pages.admin.pages.editCompet", compact('level', 'title', 'find', 'manager'));
    }
    public function editNews()
    {
        $find = $this->News->find($_GET['id']);
        $title = 'Editer une nouvelle';
        if (!empty($_POST)) :

            $res = $this->News->update($_GET['id'], [
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);
            header('Location:?src=tables');
        endif;
        $this->find("pages.admin.pages.editNews", compact('find', 'title'));
    }
    public function editArticle()
    {
        $find = $this->Article->find($_GET['id']);
        $title = 'Editer un Article';
        if (!empty($_POST['title']) AND !empty($_POST['content'])) :
            if($_POST['view'] == 'on'){
                 $res = $this->Article->update($_GET['id'], [
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'view'=>1
            ]);
            }else{
                $res = $this->Article->update($_GET['id'], [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'view'=>0
                ]);
            }
           
            header('Location:?src=tables');
        endif;
        $this->default2("pages.admin.pages.editNotice", compact('find', 'title'));
    }
    public function editCategory_model()
    {
        $find = $this->Category_model->find($_GET['id']);
        if (!empty($_POST)) :

            $res = $this->Category_model->update($_GET['id'], [
                'title' => $_POST['category']

            ]);
            header('Location:?src=tables');
        endif;
        $this->find2("pages.admin.pages.editCategory_model", compact('find'));
    }

    public function editNotice()
    {
        $find = $this->Notice->find($_GET['id']);
        $title = 'Editer une Annonce';
        if (!empty($_POST['title']) AND !empty($_POST['content'])) :
            if($_POST['view'] == 'on'){
                $res = $this->Notice->update($_GET['id'], [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'view'=>1
                ]);
            }else{
                $res = $this->Notice->update($_GET['id'], [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'view'=>0
                ]);
            }
           
            header('Location:?src=e2bdf092171e62ed1823a26b139c920be4aa8ad0');
        endif;
        $this->default2("pages.admin.pages.editNotice", compact('find', 'title'));
    }

    public function editLevel()
    {
        $find = $this->Level_competition->find($_GET['id']);
        if (!empty($_POST['title'])) :
            if (isset($_POST['title'])) :
                $this->Level_competition->update($_GET['id'], ['title' => $_POST['title']]);
                header('Location:?src=factory');
            endif;
        endif;
        $this->find2("pages.admin.pages.editLevel", compact('find'));
    }

    public function editModel()
    {
        $category = $this->Category_model->all();

        if (!empty($_POST)) :

            $res = $this->Model->update($_GET['id'], [
                'category_id' => $_POST['category']
            ]);
            header('Location:?src=tables');
        endif;
        $this->find("pages.admin.pages.editModel", compact('category'));
    }


    public function deleteNews()
    {
        if (!empty($_POST)) {
            $this->News->delete($_POST['id']);
            $this->News->deleteComment($_POST['id']);
            header('Location:?src=tables');
        }
    }
    public function deleteArticle()
    {
        if (!empty($_POST)) {
            $this->Article->delete($_POST['id']);

            header('Location:?src=tables');
        }
    }
    public function deleteNotice()
    {
        if (!empty($_POST)) {
            $this->Notice->delete($_POST['id']);
            header('Location:?src=e2bdf092171e62ed1823a26b139c920be4aa8ad0');
        }
    }
    public function deletemanager()
    {
        if (!empty($_POST)) {
            $this->Manager->delete($_POST['id']);
            header('Location:?src=factory');
        }
    }
    public function deleteModel()
    {
        if (!empty($_POST)) {
            $this->Model->delete($_POST['id']);
            header('Location:?src=tables');
        }
    }
    public function deleteService()
    {
        if (!empty($_POST)) {
            $this->Service->delete($_POST['id']);
            header('Location:?src=tables');
        }
    }
    public function deleteEvent(){
        if (!empty($_POST)) {
            $this->Event->delete($_POST['id']);
            $this->GuestEvent->delete($_POST['id']);
            header('Location:?src=admin');
        }
    }
    public function deletePersonne()
    {
        if (!empty($_POST)) {
            $this->Club->delete($_POST['id']);
            header('Location:?src=tables');
        }
    }
    public function deleteCompet()
    {
        if (!empty($_POST)) {
            $this->Competition->delete($_POST['id']);
            header('Location:?src=tables');
        }
    }

    public function noticeFind()
    {
        $findNotice = $this->Notice->find($_GET['id']);
        $this->find("pages.admin.pages.finds.notice", compact('findNotice'));
    }
    public function newsFind()
    {
        $findNews = $this->News->find($_GET['id']);
        $commentaire = $this->Comment->find($_GET['id']);
        $this->find("pages.admin.pages.finds.news", compact('findNews', 'commentaire'));
    }
    public function modelFind()
    {
        $findModel = $this->Model->find($_GET['id']);
        $this->find("pages.admin.pages.finds.model", compact('findModel'));
    }
    public function ArticleFind()
    {
        $findArticle = $this->Article->find($_GET['id']);
        $commentaire = $this->Comment_article->find($_GET['id']);
        $this->find("pages.admin.pages.finds.article", compact('findArticle', 'commentaire'));
    }
    public function CompetitionFind()
    {
        $find = $this->Competition->find($_GET['id']);
        $annees =   (int)date('Y') - (int)$find->year_b;
        $this->find('pages.admin.pages.finds.compet', compact('find', 'annees'));
    }

    public function EventFind()
    {
        $find = $this->Event->find($_GET['id']);
        $guest = $this->GuestEvent->findGuestEvent($_GET['id']);
        if(!empty($_POST)){
            if(isset($_POST)){

                $letter = ucfirst(substr($_POST['name'], 0, 1));
                $nameLog  = strlen($_POST['name']);
                $firstNameLog  = strlen($_POST['firstName']);
                $addLog = ((int)$nameLog + (int)$firstNameLog + (int)date('Y'))-rand(1,100);
                $code = $letter.''.$addLog;
                $this->GuestEvent->create([
                    'name'=> $_POST['name'],
                    'firstName'=> $_POST['firstName'],
                    'code'=>"$code",
                    'idEvent'=>$find->id
                ]);

                header('Location:?src=viewEvent&id='.$find->id);
            }
        }
        $this->event('pages.admin.pages.finds.event', compact('find','guest'));
    }

    public function GuestFind()
    {
        $find = $this->Event->find($_GET['id']);
        $guest = $this->GuestEvent->findGuestEvent($_GET['id']);
        
        $this->event('pages.admin.pages.finds.guest', compact('find','guest'));
    }
    public function PersonFind()
    {
        $find = $this->Club->find($_GET['id']);
        $this->find('pages.admin.pages.finds.personne', compact('find'));
    }
    public function addPictureModel()
    {
        $title = 'Ajouter des photos';
        $find = $this->Model->findModel($_GET['id']);
        $picture1 = $this->File->upload('picture1', 'App/Photo/ModelPicture/');
        $picture20 = $this->File->upload('picture2', 'App/Photo/ModelPicture/');
        $picture3 = $this->File->upload('picture3', 'App/Photo/ModelPicture/');
        $picture4 = $this->File->upload('picture4', 'App/Photo/ModelPicture/');
        $picture5 = $this->File->upload('picture5', 'App/Photo/ModelPicture/');
        $picture6 = $this->File->upload('picture6', 'App/Photo/ModelPicture/');
        $picture = $find->picture2;
        if (strlen($picture) === 0) {
            if (isset($picture1) and isset($picture20) and isset($picture3) and isset($picture4) and isset($picture5) and isset($picture6)) {
                $this->Model->update($_GET['id'], [
                    'picture2' => "DEBUT <a href='App/Photo/ModelPicture/$picture1' class='at'  data-lightbox='mygellary'>
                        <img src='App/Photo/ModelPicture/$picture1' class='img-responsive'>
                     </a> FIN
                     DEBUT <a href='App/Photo/ModelPicture/$picture20' class='at'  data-lightbox='mygellary'>
                     <img src='App/Photo/ModelPicture/$picture20' class='img-responsive'>
                  </a> FIN
                  DEBUT <a href='App/Photo/ModelPicture/$picture3' class='at'  data-lightbox='mygellary'>
                  <img src='App/Photo/ModelPicture/$picture3' class='img-responsive'>
               </a> FIN 
               DEBUT <a href='App/Photo/ModelPicture/$picture4' class='at'  data-lightbox='mygellary'>
               <img src='App/Photo/ModelPicture/$picture4' class='img-responsive'>
            </a> FIN 
            DEBUT <a href='App/Photo/ModelPicture/$picture5' class='at'  data-lightbox='mygellary'>
            <img src='App/Photo/ModelPicture/$picture5' class='img-responsive'>
         </a> FIN
             DEBUT <a href='App/Photo/ModelPicture/$picture6' class='at'  data-lightbox='mygellary'>
                    <img src='App/Photo/ModelPicture/$picture6' class='img-responsive'>
                 </a> FIN
                    "
                ]);
                header('Location:?src=model&id=' . $find->id);
            }
        } else {
            if (isset($picture1) and isset($picture20) and isset($picture3) and isset($picture4) and isset($picture5) and isset($picture6)) {
                $this->Model->update($_GET['id'], [
                    'picture2' => "$picture DEBUT <a href='App/Photo/ModelPicture/$picture1' class='at'  data-lightbox='mygellary'>
                        <img src='App/Photo/ModelPicture/$picture1' class='img-responsive'>
                     </a> FIN
                     DEBUT <a href='App/Photo/ModelPicture/$picture20' class='at'  data-lightbox='mygellary'>
                     <img src='App/Photo/ModelPicture/$picture20' class='img-responsive'>
                  </a> FIN
                  DEBUT <a href='App/Photo/ModelPicture/$picture3' class='at'  data-lightbox='mygellary'>
                  <img src='App/Photo/ModelPicture/$picture3' class='img-responsive'>
               </a> FIN 
               DEBUT <a href='App/Photo/ModelPicture/$picture4' class='at'  data-lightbox='mygellary'>
               <img src='App/Photo/ModelPicture/$picture4' class='img-responsive'>
            </a> FIN 
            DEBUT <a href='App/Photo/ModelPicture/$picture5' class='at'  data-lightbox='mygellary'>
            <img src='App/Photo/ModelPicture/$picture5' class='img-responsive'>
         </a> FIN
             DEBUT <a href='App/Photo/ModelPicture/$picture6' class='at'  data-lightbox='mygellary'>
                    <img src='App/Photo/ModelPicture/$picture6' class='img-responsive'>
                 </a> FIN
                    "
                ]);
                header('Location:?src=model&id=' . $_GET['id']);
            }
        }
        $this->find2("pages.admin.pages.update.modelPicture", compact('title'));
    }
    public function addPictureCompetition()
    {
    $title = 'Ajouter des photos';
    $find = $this->Competition->findCompetition($_GET['id']);
    $picture1 = $this->File->upload('picture1', 'App/Photo/CompetitionPicture/');
    $picture20 = $this->File->upload('picture2', 'App/Photo/CompetitionPicture/');
    $picture3 = $this->File->upload('picture3', 'App/Photo/CompetitionPicture/');
    $picture4 = $this->File->upload('picture4', 'App/Photo/CompetitionPicture/');
    $picture5 = $this->File->upload('picture5', 'App/Photo/CompetitionPicture/');
    $picture6 = $this->File->upload('picture6', 'App/Photo/CompetitionPicture/');
    $picture = $find->picture2;
    if (strlen($picture) === 0) {
        if (isset($picture1) and isset($picture20) and isset($picture3) and isset($picture4) and isset($picture5) and isset($picture6)) {
        $this->Competition->update($_GET['id'], [
            'picture2' => ",$picture1? ,$picture20? ,$picture3? ,$picture4? ,$picture5? ,$picture6? "
        ]);
        header('Location:?src=_c_o_m_p_e_t_i_t_i_o_n_&id=' . $find->id);
    }
  
        } else {
            if (isset($picture1) and isset($picture20) and isset($picture3) and isset($picture4) and isset($picture5) and isset($picture6)) {
                $this->Competition->update($_GET['id'], [
                    'picture2' => "$picture ,$picture1? ,$picture20?  ,$picture3? ,$picture4? ,$picture5? ,$picture6? "
                ]);
                header('Location:?src=_c_o_m_p_e_t_i_t_i_o_n_&id=' . $_GET['id']);
            }
        }
        $this->find2("pages.admin.pages.update.competitionPicture", compact('title'));
    }

    public function factory()
    {
        $manager =  $this->Manager->all();
        $level =  $this->Level_competition->all();
        $abouts = $this->About->all();
        $this->defaultAdmin("pages.admin.pages.billing", compact('manager', 'level', 'abouts'));
    }

    public function icons()
    {
        $icon = $this->Icons->all();
        if (!empty($_POST)) {
            if (isset($_POST)) {
                $this->Icons->create([
                    'title' => $_POST['icon'],
                    'name' => $_POST['name']
                ]);
                header('Location:?src=iconInsert');
            }
        }

        $this->find("pages.admin.pages.icon", compact('icon'));
    }
}

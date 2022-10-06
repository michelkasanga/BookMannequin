<?php

use App\App;

$user = App::getTable('Auth')->find($_SESSION['auth']);
?>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 text-center mx-auto">
                    <h1 class="text-white mb-2 mt-5">Edit</h1>
                    <p class="text-lead text-white"><?= $title ;?><b><?= $user->username;?></b> </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <!-- <h5>Insrivez-vous </h5> -->
                    </div>

                    <div class="card-body">

                        <form method="post" action="" enctype="multipart/form-data" role="form">
                            <div class="mb-3">
                                <input type="text" name="title" class="form-control" value="<?=htmlspecialchars($find->title);?>"  placeholder="Nom  de l'evenement " aria-label="Name">
                            </div>
                            
                            <div class="mb-3">
                        
                                <textarea name="content" class="form-control" placeholder="contenu" value="<?=$find->content;?>" aria-label="Name"><?=htmlspecialchars($find->content);?></textarea>
                            </div>
                            <div class="mt-2 mb-5 d-flex">
                              <h6 class="mb-0">Non / Oui</h6>
                              <div class="form-check form-switch ps-0 ms-auto my-auto" >
                              <input class="form-check-input mt-1 ms-auto"  type="checkbox" name="view" <?php if($find->view == '1'){ ?> checked <?php } ?>>
                              </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Ajouter</button>
                            </div>

                        </form>

                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


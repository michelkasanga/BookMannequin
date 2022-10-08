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
                    <h1 class="text-white mb-2 mt-5">Event</h1>
                    <p class="text-lead text-white">Editer un Evennement <b><?= $user->username;?></b> </p>
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
                                <input type="text" name="title" class="form-control" value="<?= $find->title;?>" placeholder="Nom  de l'evenement " aria-label="Name">
                            </div>
                            <div class="mb-3">
                                <input type="datetime-local" name="dateEvent" class="form-control" placeholder="date de l'evenement" aria-label="Date">

                            </div>
                            <div class="mb-3">
                                <input type="text" name="detail" class="form-control" value="<?= $find->detail;?>" placeholder="detail de l'evennement" aria-label="Name">
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
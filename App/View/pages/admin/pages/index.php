<?php $title = 'Dashboard';?>
<div class="container-fluid py-4">
  <div class="row">

    <!-- annonce -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Annonces</p>
                <h5 class="font-weight-bolder">
                  <?=$notice_count;?>
                </h5>
                <p class="mb-0">soit
                  <span class="text-success text-sm font-weight-bolder"><?='' . $pourcentage_notice . '%';?></span>
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- fin annonce -->

    <!-- nouvelles -->
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">N e w s</p>
                <h5 class="font-weight-bolder">
                  <?=$news_count;?>
                </h5>
                <p class="mb-0">soit
                  <span class="text-success text-sm font-weight-bolder"><?="$pourcentage_news%";?></span>
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- fin news -->


    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">articles</p>
                <h5 class="font-weight-bolder">
                  <?="$article_count";?>
                </h5>
                <p class="mb-0">soit
                  <span class="text-success text-sm font-weight-bolder"><?="$pourcentage_article%";?></span>

                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">modeles</p>
                <h5 class="font-weight-bolder">
                  <?="$model_count";?>
                </h5>
                <p class="mb-0">soit
                  <span class="text-success text-sm font-weight-bolder"><?="$pourcentage_model%";?></span>
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Sales overview</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">Histogramme</span>
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line" class="chart-canvas" height="300">99 </canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card card-carousel overflow-hidden h-100 p-0">
        <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
          <div class="carousel-inner border-radius-lg h-100">

            <div class="carousel-item h-100 active" style="background-image: url('public/css/assets/img/7.jpg'); background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-camera-compact text-dark opacity-10"></i>
                </div>
              </div>
            </div>
            <?php foreach ($model as $models): ?>
              <div class="carousel-item h-100" style="background-image: url('App/Photo/ModelPicture/<?=$models->picture;?>');
      background-size: cover;">
                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">

                  <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                    <i class="ni ni-bulb-61 text-dark opacity-10"></i>

                  </div>
                </div>
              </div>
            <?php endforeach;?>
            <!-- <div class="carousel-item h-100" style="background-image: url('../App/View/template/admin/assets/img/9.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                </div>

              </div>
            </div>
            <div class="carousel-item h-100" style="background-image: url('../App/View/template/admin/assets/img/8.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                </div>

              </div>
            </div>
            <div class="carousel-item h-100" style="background-image: url('../App/View/template/admin/assets/img/5.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-trophy text-dark opacity-10"></i>
                </div>

              </div>
            </div>
            <div class="carousel-item h-100" style="background-image: url('../App/View/template/admin/assets/img/draya_footer.jpg');
      background-size: cover;">
              <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                  <i class="ni ni-trophy text-dark opacity-10"></i>
                </div> -->

          </div>
        </div>
      </div>
      <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>
</div>
<div class="row mt-4">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card ">
      <div class="card-header pb-0 p-3">
        <div class="d-flex justify-content-between">
          <h5 class="mb-2">Table Annonces</h5> <span class="btn btn-primary"> <a href="?src=addNotice"> AJOUTER</a></span>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center ">

          <thead>
            <tr>
              <td>
                <div class="text-center">
                  <h6 class="text-sm mb-0">ID</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <h6 class="text-sm mb-0">Titre</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <h6 class="text-sm mb-0">Date Ajout</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <h6 class="text-sm mb-0">En ligne</h6>
                </div>
              </td>
              <td>
                <div class="text-center">
                  <h6 class="text-sm mb-0">Action</h6>
                </div>
              </td>


            </tr>

          </thead>

          <tbody>
            <?php foreach ($notice_all as $all): ?>
              <tr>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0"><?=$all->id;?></h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">
                      <?php
if (strlen($all->title) <= 15) {
    echo $all->title;
} else {
    echo substr($all->title, 0, 15) . '...';
}

?></h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <?php ?>
                    <h6 class="text-sm mb-0"><i><?=date_format(date_create($all->date), 'd M Y  H:i');?></i></h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">

                    <h6 class="text-sm mb-0"><i>
                      <?php if ($all->view == '1') {
    echo 'OUI';
} else {echo 'NON';}?></i></h6>
                  </div>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">
                    <a href="?src=editNotice&id=<?=$all->id;?>">
                      <div class="btn btn-warning">
                        modif
                      </div>
                    </a>

                    <form action="?src=deleteNotice" method="post" style="display: inline;">
                      <input type="hidden" name="id" value="<?=$all->id;?>">
                      <button href="?src=deleteNotice&id=<?=$all->id;?>" class="btn btn-danger">Supp</button>
                    </form>

                  </span>
                </td>

                <td>
                  <a href="?src=notice&id=<?=$all->id;?>">
                    <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                      <i class="ni ni-bold-right" aria-hidden="true"></i>
                    </button>
                  </a>

                </td>



              </tr>
            <?php endforeach;?>
          </tbody>

        </table>
      </div>
    </div>
  </div>
  <div class="col-lg-5">
    <div class="card">
      <div class="card-header pb-0 p-3">
        <h6 class="mb-0">Event</h6>
      </div>
      <div class="col-md-10 d-flex justify-content-end align-items-center">

        <small><a href="?src=addEvent" style="color:deeppink; font-weight:800;">Ajouter</a></small>
      </div>
      <div class="card-body p-3">
        <ul class="list-group">
          <?php foreach ($event as $events): ?>
            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
              <div class="d-flex align-items-center">
                <div class="  px-2">
                  <div>
                    <img src="App/Photo/EventPicture/<?=$events->picture;?>" class="avatar avatar-sm rounded-circle me-2" alt="">
                  </div>

                </div>
                <div class="d-flex flex-column">
                  <h6 class="mb-1 text-dark text-sm"> <a href="?src=viewEvent&id=<?=$events->id;?>"><?=$events->title;?></a></h6>
                  <span class="text-xs bold"><?=date_format(date_create($events->dateEvent), 'd M Y  à  H:i');?> ,

                    <span class="font-weight-bold" style="color:deeppink; font-family:cursive; ">, invités(<?=count($this->GuestEvent->findGuestEvent($events->id));?>)</span>
                </span>
                </div>
              </div>
              <div class=" d-flex">

                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                  <a style="font-size: 15px;" class="icon icon-pencil" href="?src=editEvent&id=<?=$events->id;?>" aria-hidden="true"></a>
                </button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                  <a style="font-size: 15px;" class="icon icon-users" href="?src=viewGuests&id=<?=$events->id;?>" aria-hidden="true"></a>
                </button>&nbsp;&nbsp;&nbsp;

                <form action="?src=deleteEvent&id=<?=$events->id;?>" method="post" class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                  <input type="hidden" name="id" value="<?=$events->id;?>">
                  <button style="font-size: 15px; border: none; background:none; color:red;" href="?src=deleteEvent&id=<?=$events->id;?>" class="icon icon-trash"></button>

                </form>&nbsp;&nbsp;

                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                  <a style="font-size: 15px;" class="ni ni-bold-right" href="?src=viewEvent&id=<?=$events->id;?>"></a>
                </button>
                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                  <a class="" aria-hidden=" true"></a>
                </button>

              </div>
            </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
</div>
<footer class="footer pt-3  ">
  <div class="container-fluid">
    <div class="row align-items-center justify-content-lg-between">
      <div class="col-lg-6 mb-lg-0 mb-4">
        <div class="copyright text-center text-sm text-muted text-lg-start">

        </div>
      </div>

    </div>
  </div>
</footer>
</div>
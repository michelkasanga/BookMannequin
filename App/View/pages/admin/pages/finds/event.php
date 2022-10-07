<?php $title =  $find->title;?>

<div class="vide"></div> <div class="vide"></div> <div class="vide"></div> <div class="vide"></div><div class="vide"></div>
<div class="wrapper_blog">
  <div class="blog_post">
    <div class="img_pod">
      <img src="App\Photo\EventPicture\<?= $find->picture;?>" alt="<?= $find->picture;?>" id="img">
    </div>
    <div class="container_copy">
      <h3 id="h3"><?=  date_format(date_create($find->dateEvent),'l d M Y   à  H:i');?></h3>
      <h1 id="h1"><?= $find->title;?></h1>
      <p id="p"><?= $find->detail;?></p>
    </div>
    <!-- <a class="btn_primary" href='#'>Read More</a> -->
  </div>
</div>


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
            
              <h6 class="mb-0"></h6>
            </div>
            <div class="card-body pt-4 p-3">
             
              <ul class="list-group">

<?php foreach($guest as $guests):?>
<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
  <div class="d-flex flex-column">
    <h6 class="mb-3 text-sm"><?= ucfirst($guests->firstName).' '. ucwords($guests->name); ?></h6>

    
    
    <span class="mb-2 text-xs">Code : 
  <div class="ms-auto text-end">
                    
  <h3 class="text-dark font-weight-bold ms-sm-2"><?= $guests->code;?></h3>
  </div>
  </span>
  </div>
</li>
<?php endforeach;?>


</ul>
              
              
            </div>
          </div>
        </div>

      

        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0"> </h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                  <i class="far fa-calendar-alt me-2"></i>
                  <small><?php  /*date_format(date_create($find->dt),'d M Y  H:i:s'); */?></small>
                </div>
              </div>
            </div>
          
            <div class="card-body pt-4 p-3">
              <h6 class=" text-body text-xs font-weight-bolder mb-3">
                  <p>
                 
                  </p>
              </h6>
  <form method="post" action="" enctype="multipart/form-data">
      <div class="mb-3">
          <input type="text" class="form-control form-control-lg" name="name" placeholder="votre nom" required>
      </div>
      <div class="mb-3">
          <input type="text" class="form-control form-control-lg" name="firstName" placeholder="votre nom" required>
      </div>
     

      <div class="text-center">
          <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Ajouter</button>
      </div>
  </form>
            </div>
          </div>
        </div>
      </div>
</div>

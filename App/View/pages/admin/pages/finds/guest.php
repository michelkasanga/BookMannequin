<?php $title= $find->title.'   ';?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
            
              <h6 class="mb-0"><?= $title;?></h6>
              <h4><?=  date_format(date_create($find->dateEvent),'l d M Y   à  H:i');?></h4>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                  
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  
                    <div class="d-flex text-sm flex-column" >
                        <div class="ms-auto text-end"  >  

                        </div>
                        <div class="post-thumb" >
                            <img class="img-fluid" id="img-fluid" src="App/Photo/EventPicture/<?= $find->picture;?>" alt="<?= $find->picture;?>" >
                        </div>
                    </div>
                </li>

                
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                <h6 class="mb-0">Detail</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small><?= App\Model\php\Time::timing($find->date,$find->time);?></small>
                                </div>
                            </div>
                        </div>
                    
                        <div class="card-body pt-4 p-3">
                            <h6 class=" text-body text-xs font-weight-bolder mb-3">
                                <p>
                                <?= $find->detail;?>
                                </p>
                            </h6>
                        
                        </div>
                    </div>
                
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-body pt-4 p-3">
                <ul class="list-group">
                    <!-- insert un commentaire -->
                    
                        
                    
                    

                    <!-- commentaire -->
                    <div class="col-md-6">
                                <h6 class="mb-0">Invites</h6>
                                </div>
                    <?php foreach($guest as $guests):?>
                
                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg" style="padding: 1px;">
                  <div class="d-flex text-sm flex-column" >
                  
                  
                
                        <h6 class="mb-3 text-sm"><?= ucfirst($guests->firstName).' '. ucwords($guests->name); ?></h6>

                        
                        
                        <span class="mb-2 text-xs">Code : 
                    <div class="ms-auto text-end">
                                        
                    <h3 class="text-dark font-weight-bold ms-sm-2"><?= $guests->code;?></h3>
                    </div>
                    </span>
                   
                    
                
                  </div>

                  <div class="ms-auto text-end">
                    <form action="?src=viewGuests&id=<?= $guests->idEvent;?>" method="post">
                          <input type="hidden" name="id"   value="<?=$guests->idGuest;?>">
                          <button href="?src=viewGuests&id=<?=$guests->idGuest;?>" class="icon icon-bin" style="border: none; background:none; color:red;"></button>
                  
                        </form>
                        <?php 
                    if(!empty($_POST))
                    {
                        $this->GuestEvent->deleteGuest($_POST['id']);  
                    }
                    
                    ?>
                  </div>
                 
                
                    </li>
                    <?php endforeach;?>


                    
                </ul>
                </div>
            </div>
        </div>
      </div>
</div>
<!-- end article -->



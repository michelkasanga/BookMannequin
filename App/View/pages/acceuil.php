
    <!-- Hero Start  annonce -->
    <section class="hero" >
        <div class="container">
            <div class="row">
                <div class="col-12 offset-md-1 ">
                
                    <div class="swiper-container hero-slider">
                        <div class="swiper-wrapper">

                        <?php foreach($notice as $notices):?>

                            <div class="swiper-slide slide-content d-flex align-items-center">
                                <div class="single-slide content ">
                                    
                                            <h1 data-aos="fade-right" data-aos-delay="200"><?= $notices->title; ?>
                                            </h1>
                                            <p data-aos="fade-right" data-aos-delay="600"><?= htmlspecialchars(substr($notices->content,0,150).'...'); ?>
                                            </p>
                                         
                                            <a data-aos="fade-right" data-aos-delay="900" href="index.php?src=eadc0b9a6acab4fd42a4f6ea816e8e27e162216e&id=<?=$notices->id;?>" class="btn btn-primary">See
                                                More</a>
                                      
                                </div>
                            </div>

                        <?php endforeach;?>    
                    
                        </div>

                    
                                    </div> 
                </div>
            </div>
            <!-- Add Control -->
            <span class="arr-left"><i class="fa fa-angle-left"></i></span>
            <span class="arr-right"><i class="fa fa-angle-right"></i></span>
        </div>
        <div class="texture"></div>
        <div class="diag-bg"></div>
    </section>
    <!-- Hero End -->
    <!-- Call To Action Start  -->
    <section class="cta" data-aos="fade-up" data-aos-delay="0">
        <div class="container" >
        <?php foreach($competition as $compet):?>
            <div class="cta-content d-xl-flex align-items-center justify-content-around text-center text-xl-center" >    
                
                <div class="content" data-aos="fade-right" data-aos-delay="200">
                    <h2 style="color:white; font-weight:bold;"><?= $compet->name_compet;?></h2>
                    <label >
                        <small><i style="color:<?= $compet->color;?>;"><?= $compet->title;?></i></small>
                        <br>
                        <small><h3 style="color:gold;"><?= $compet->stars;?></h3></small>
                    
                    </label>
                <div  class=" text-center text-lg-center px-4">
                    <p class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-lg-0 mx-auto "><?= htmlspecialchars(substr($compet->detail,0,190).'...');?></p>
                    
                </div>
                    
                </div>
                <div class="subscribe-btn" data-aos="fade-left" data-aos-delay="400" data-aos-offset="0">
                    <a href="?src=findCompetition&id=<?= $compet->ID;?>" class="btn btn-primary">Voir le detail</a>
                </div>
                
            </div>
            <?php endforeach;?>
        </div>
    </section>
    
<div class="all" style="padding-bottom: 0px;">
    <h1 class="titre">news</h1>
    
<section class=""  style="padding-bottom: 0px;">
    <ul id="autoWidth" class="cs-hidden">
        <?php foreach($news as $new):?>
        <li class="item-a">
            <div class="box">
                <div class="slide-img">
                    <img src="App/Photo/NewsPicture/<?=$new->picture;?>" alt="<?=$new->picture;?>">
                    <div class="overlay">
                        <a href="?src=pages.oneNew&id=<?=$new->id;?>" class="buy-btn">Detail</a>
                    </div>
                </div>
                <div class="detail-box">
                    <div class="type">
                        <a href="?src=pages.oneNew&id=<?=$new->id;?>"><?=$new->title;?></a>
                        <?php
                    
                    $b = App\Model\php\Time::timing($new->date,$new->time);
                ?>
                <span class="price"><?=$b;  ?></span>
                    </div>
                    
                    
                </div>
            </div>
            
        </li>
        <?php endforeach;?>
        
    </ul>

</section>
</div>


<div id="fh5co-page">
		<div class="fh5co-blog-style-1">
			<div class="container gallery">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp titre" data-wow-duration="1s" data-wow-delay=".5s">model</h2>
						<!-- <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p> -->
					</div>
				</div>
				<div class="row p-b "  id=" lightgallery">

            
    
    <?php foreach($model as $models): ?>
        <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4" id="box" style="height: 200px; padding:0;">
            <div id="gallery" class="gallery">    
            
                    <div  id="lightgallery" class="lightgallery" style="width: 100%; height:100%;">
                        <a href="App/Photo/ModelPicture/<?=$models->picture;?>" data-aos="fade-up"  data-aos-delay="200" data-aos-duration="400">
                            <img class="img-fluid" src="App/Photo/ModelPicture/<?=$models->picture;?>" alt="Gallery Image" style="width: 100%; height:100%;">
                            <i class="fa fa-caret-right"></i>
                        </a>
                        
                    </div>
                
                <div id="overlay">
                    <div class="detail-box">
                        <div id="type">
                            <a href="?src=pages.oneModel&id=<?=$models->id;?>"><?=$models->title;?></a>
                            <?php $b = App\Model\php\Time::timing($models->date,$models->time);?>
                            <span><?=$b;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>


        </div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                    
            <div class="text-center">
                <a href="?src=a9d24446cc1e471bf68005f34aa199e18f46287f" class="btn btn-primary">VOIR PLUS</a>
            </div>
    
					</div>
				</div>
			</div>
		</div>
</div>
                    
    <!-- Call To Action End -->
    <!-- Services Start -->
    <!--<section class="services">
                        
        <div class="container">
            <div class="title text-center">
                <h6>Our Speakers</h6>
                <h1 class="title-blue">Why Choose Us</h1>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                            <img class="mr-4" src="assets/images/service1.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Web Development</h5>
                                Donec volutpat tincidunt neque, vitae lobortis libero mattis sed tempus.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">
                            <img class="mr-4" src="assets/images/service2.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Testing for perfection</h5>
                                Donec volutpat tincidunt neque, vitae lobortis libero mattis sed tempus.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                            <img class="mr-4" src="assets/images/service3.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Discussion of the idea</h5>
                                Donec volutpat tincidunt neque, vitae lobortis libero mattis sed tempus.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
                            <img class="mr-4" src="assets/images/service4.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Modern style</h5>
                                Donec volutpat tincidunt neque, vitae lobortis libero mattis sed tempus.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="400" data-aos-duration="600">
                            <img class="mr-4" src="assets/images/service1.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Web Development</h5>
                                Donec volutpat tincidunt neque, vitae lobortis libero mattis sed tempus.
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="media" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800">
                            <img class="mr-4" src="assets/images/service5.png" alt="Web Development">
                            <div class="media-body">
                                <h5>Elaboration of the core</h5>
                                Donec volutpat tincidunt neque, vitae lobortis libero mattis sed tempus.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                        -->
    
    <!-- Services End -->
    <!-- Featured Start a propos de moi-->
    
    <!-- Featured End -->

    <div id="fh5co-page">
		<div class="fh5co-blog-style-1">
			<div class="container">
				<div class="row p-b">
					<div class="col-md-6 col-md-offset-3 text-center">
						<h2 class="fh5co-heading wow fadeInUp titre" data-wow-duration="1s" data-wow-delay=".5s">Articles</h2>
						<!-- <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p> -->
					</div>
				</div>
				<div class="row p-b">

				<?php foreach($article as $articles):?>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12">
						<div class="fh5co-post wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="1.1s">
							<div class="fh5co-post-image">
								<div class="fh5co-overlay"></div>	
									<!-- <div class="fh5co-category"><a href="#">Tutorial</a></div> -->
								<img src="App/Photo/ArticlePicture/<?= $articles->picture;?>" alt="<?= $articles->picture;?>" class="img-responsive">
							</div>
							<div class="fh5co-post-text">
								<h3><a href="?src=34d2405248f96f68a53d744975dace088147607a&id=<?= $articles->id;?>"><?= ucfirst($articles->title) ;?></a></h3>
								<div class="card-body pt-0 p-0">
									<h5 class=" text-body text-xs  mb-1">
										<p> <?= htmlspecialchars(substr($articles->content,0,190).'...');?></p>
									</h5>
								</div>
								
							</div>
							<div class="fh5co-post-meta">
								<span ><i class="icon-comment"></i> <?= count( $this-> Comment_article->find($articles->id));?></span>
								<span ><i class="icon-clock2"></i> <?= App\Model\php\Time::timing($articles->date,$articles->time);?></span>
							</div>
						</div>
					</div>
					
				<?php endforeach;?>
					
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                    
            <div class="text-center">
                <a href="?src=a9d24446cc1e471bf68005f34aa199e18f46287f" class="btn btn-primary">VOIR PLUS</a>
            </div>
    
					</div>
				</div>
			</div>
		</div>
</div>
    <!-- article -->

    <!-- article End -->


    <!-- Trust Start photo recent-->
    <section class="trust">
        <div class="container">
            <div class="row">
                <?php foreach($about as $abouts):?>
                <div class="offset-xl-1 col-xl-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
                    <div class="title">
                        <h6 class="title-primary">a propos de moi
                        </h6>
                        <h1><?=$abouts->title;?></h1>
                    </div>
                     <p><?=htmlspecialchars(substr($abouts->content,0,300).'...');?> <a href="?src=9f3642c94c2f071704f2ac2ad3a0b1891634b9b9"><i>voir plus</i></a></p>
                    <h5>mes competences</h5>
                    <?php 
                    $a = str_replace(',','<li>', $abouts->competence);?>
                    <ul class="list-unstyled">
                        <?=$a;?>
                    </ul> 
                </div>
                <div class="col-xl-5 gallery">
                    <div class="row no-gutters h-100" id="lightgallery">
                        <a href="App/Photo/About/<?=$abouts->picture1;?>" class="w-50 h-100 gal-img" data-aos="fade-up"
                            data-aos-delay="200" data-aos-duration="400">
                            <img class="img-fluid" src="App/Photo/About/<?=$abouts->picture1;?>" alt="Gallery Image">
                            <i class="fa fa-caret-right"></i>
                        </a>
                        <a href="App/Photo/About/<?=$abouts->picture2;?>" class="w-50 h-50 gal-img" data-aos="fade-up"
                            data-aos-delay="400" data-aos-duration="600">
                            <img class="img-fluid" src="App/Photo/About/<?=$abouts->picture2;?>" alt="Gallery Image">
                            <i class="fa fa-caret-right"></i>
                        </a>
                        <a href="App/Photo/About/<?=$abouts->picture3;?>" class="w-50 h-50 gal-img gal-img3" data-aos="fade-up"
                            data-aos-delay="0" data-aos-duration="600">
                            <img class="img-fluid" src="App/Photo/About/<?=$abouts->picture3;?>" alt="Gallery Image">
                            <i class="fa fa-caret-right"></i>
                        </a>
                    
                        
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- Trust End -->
    <!-- Pricing Start service
    <section class="pricing-table">
        <div class="container">
            <div class="title text-center">
                <h6 class="title-primary">Our prices</h6>
                <h1 class="title-blue">Price Table List</h1>
            </div>
            <div class="row no-gutters">
                <div class="col-md-4">
                    <div class="single-pricing text-center" data-aos="fade-up" data-aos-delay="0"
                        data-aos-duration="600">
                        <span>Monthly</span>
                        <h2>Starter</h2>
                        <p class="desc">Here goes some description</p>
                        <p class="price">$39.00</p>
                        <p>Create excepteur sint occaecat cupidatat non proident</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                        <svg viewBox="0 0 170 193">
                            <path fill-rule="evenodd" fill="rgb(238, 21, 21)"
                                d="M39.000,31.999 C39.000,31.999 -21.000,86.500 9.000,121.999 C39.000,157.500 91.000,128.500 104.000,160.999 C117.000,193.500 141.000,201.000 150.000,183.000 C159.000,165.000 172.000,99.000 167.000,87.000 C162.000,75.000 170.000,63.000 152.000,45.000 C134.000,27.000 128.000,15.999 116.000,11.000 C104.000,6.000 89.000,-0.001 89.000,-0.001 L39.000,31.999 Z" />
                        </svg>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-pricing text-center" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="600">
                        <span>Monthly</span>
                        <h2>Starter</h2>
                        <p class="desc">Here goes some description</p>
                        <p class="price">$39.00</p>
                        <p>5GB Storage Space</p>
                        <p>20GB Monthly Bandwidth</p>
                        <p>My SQL Databases</p>
                        <p>100 Email Account</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                        <svg viewBox="0 0 170 193">
                            <path fill-rule="evenodd" fill="rgb(238, 21, 21)"
                                d="M39.000,31.999 C39.000,31.999 -21.000,86.500 9.000,121.999 C39.000,157.500 91.000,128.500 104.000,160.999 C117.000,193.500 141.000,201.000 150.000,183.000 C159.000,165.000 172.000,99.000 167.000,87.000 C162.000,75.000 170.000,63.000 152.000,45.000 C134.000,27.000 128.000,15.999 116.000,11.000 C104.000,6.000 89.000,-0.001 89.000,-0.001 L39.000,31.999 Z" />
                        </svg>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-pricing text-center" data-aos="fade-up" data-aos-delay="600"
                        data-aos-duration="600">
                        <span>Monthly</span>
                        <h2>Starter</h2>
                        <p class="desc">Here goes some description</p>
                        <p class="price">$39.00</p>
                        <p>Create excepteur sint occaecat cupidatat non proident</p>
                        <a href="#" class="btn btn-primary">Buy Now</a>
                        <svg viewBox="0 0 170 193">
                            <path fill-rule="evenodd" fill="rgb(238, 21, 21)"
                                d="M39.000,31.999 C39.000,31.999 -21.000,86.500 9.000,121.999 C39.000,157.500 91.000,128.500 104.000,160.999 C117.000,193.500 141.000,201.000 150.000,183.000 C159.000,165.000 172.000,99.000 167.000,87.000 C162.000,75.000 170.000,63.000 152.000,45.000 C134.000,27.000 128.000,15.999 116.000,11.000 C104.000,6.000 89.000,-0.001 89.000,-0.001 L39.000,31.999 Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Pricing End -->
    <!-- Testimonial and Clients Start -->
     <section class="testimonial-and-clients " style="margin-top:15px;">
        <div class="container py-4">
        <h3 class="titre">Club</h3>

            
            <div class="testimonials">
                <div class="swiper-container test-slider">
                    <div class="swiper-wrapper">
                    <?php foreach($clubs as $club):?>
                        <div class="swiper-slide text-center">
                            <div class="row">
                                <div class="offset-lg-1 col-lg-10">
                                    <div class="test-img" data-aos="fade-up" data-aos-delay="0" data-aos-offset="0" style="border: 2px solid white;"><img
                                            src="App/Photo/ClubPicture/<?=$club->picture;?>" alt="<?=$club->picture;?>" ></div>
                                    <h5 data-aos="fade-up" data-aos-delay="200" data-aos-duration="600"
                                        data-aos-offset="0"><?=$club->name;?></h5>
                                    <span data-aos="fade-up" data-aos-delay="400" data-aos-duration="600"
                                        data-aos-offset="0"><?=$club->title;?></span>

                                    <div class=" d-xl-flex align-items-center justify-content-around text-center text-xl-left">
                                        <div class="content" data-aos="fade-right" data-aos-delay="200">
                                            <span data-aos="fade-up" data-aos-delay="600" data-aos-duration="600"
                                        data-aos-offset="0" class="col-xl-12 col-md-12 col-lg-12">
                                                <p><?=$club->content;?></p>
                                            </span>
                                        </div>
                                    </div>
                                    </div>
                                    
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                    <div class="test-pagination"></div>
                </div>
            </div>
            
            
            
        
        </div>
    </section> 
    <!-- Testimonial and Clients End -->
    <!-- Call To Action 2 Start -->
<section class="cta " data-aos="fade-up" data-aos-delay="0">
        <div class="container px-0 py-4" >
        <?php foreach($competition as $compet):?>
            <div class="cta-content d-xl-flex align-items-center justify-content-around text-center text-xl-center" >    
                
                <div class="content" data-aos="fade-right" data-aos-delay="200">
                    <h2 style="color:white; font-weight:bold;"><?= $compet->name_compet;?></h2>
                    <label >
                        <small><i style="color:<?= $compet->color;?>;"><?= $compet->title;?></i></small>
                        <br>
                        <small><h3 style="color:gold;"><?= $compet->stars;?></h3></small>
                    
                    </label>
                <div  class=" text-center text-lg-center px-4">
                    <p class="col-xl-12 col-lg-12 col-md-12 d-flex flex-column mx-lg-0 mx-auto "><?= htmlspecialchars(substr($compet->detail,0,190).'...');?></p>
                    
                </div>
                    
                </div>
                <div class="subscribe-btn" data-aos="fade-left" data-aos-delay="400" data-aos-offset="0">
                    <a href="?src=findCompetition&id=<?= $compet->ID;?>" class="btn btn-primary">Voir le detail</a>
                </div>
                
            </div>
            <?php endforeach;?>
        </div>
    </section>
    
    <!-- Call To Action 2 End -->
    
    
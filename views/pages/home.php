<main>
        <section id="aboutus">
           <div class="container">
               <div class="row">
                   <?php $text = select_table("texts");
                        foreach($text as $t):
                            if($t->id_text == 1 || $t->id_text == 2 ):
                   ?>

                   <div class="col-12 col-md-6 mt-3">
                        <div class="card rounded-0 shadow" >
                            <h2 class='text-center'><?=$t->heading?></h2>
                        <img src="<?=$t->src?>" class="card-img-top rounded-0 img-fluid" alt="<?=$t->heading?>">
                        <div class="card-body">
                            <p class="card-text"><?=$t->text?></p>
                        </div>
                        </div>
                   </div>
                   <?php endif; endforeach;?>
               </div>
           </div>
        </section>
        <section id="ik-offers" class="ik-bg-pink mt-5">
            <div class="container py-5">
            <?php $text = select_table("texts");
                        foreach($text as $t):
                            if($t->id_text == 3):
                   ?>
                <div class="row">
                
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center" >
                        <div>
                        <h2 class="text-capitalize ik-color-white mb-5"><?=$t->heading?></h2>
                        <p class="ik-color-white"><?=$t->text?>
                        </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="<?=$t->src?>" alt="<?=$t->heading?>" style="width:100%;" class="img-fluid">
                    </div>
                </div>
                <?php endif; endforeach;?>
            </div>
        </section>
        <section id="partners">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 mb-4 text-center">
                        <h2>Our partners</h2>
                        <span class="ik-border mx-auto"></span>
                    </div>
                    <?php
                        $brand_picture = select_table("brand_picture");
                        foreach($brand_picture as $b):
                    ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-4" >
                        <img src="<?=$b->src?>" style="width:100%" class="img-fluid" alt="<?=$b->alt?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
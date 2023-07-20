<?php 
   
?>
<main>
    <div class="container py-5">
            <div class="row">
                <div class="col-12 col-md-6">
                    <img src="assets/img/picture-author.jpg" alt="Author picture" class="img-fluid">
                </div>
                <div class="col-12 col-md-6">
                    <div class="ik-auts">
                    <p>First name: Ignjat</p>
                        <p>Last name: Koički</p>
                        <p>Index: 220/21</p>
                        <p>Biography: I was born on January 26, 1997 in Novi Sad. Elementary school and
                            and high school I finished in Belgrade. I'm attending ICT college now.   
                        </p>
                    
                    <ul id="ik-about-ul">
                        <li><a href="https://www.linkedin.com/in/ignjat-koicki-687378221/">
                        <i class="bi ik-icons me-2 ik-color-blue ik-icons bi-linkedin"></i> Linkedin profil</a></li>
                        <li><i class="bi ik-icons me-2 ik-color-blue ik-icons bi-telephone-outbound"></i> +381601110387</li>
                        <li><i class="bi ik-icons me-2 ik-color-blue ik-icons bi-geo-alt"></i> Nede Spasojević 4/9, 
                            Beograd, Srbija</li>
                    </ul>
                    
                </div>
                <div class="col-12">
                    <form action="models/export_word.php" method="POST">
                    <button class="btn btn-primary" name="exp_word" id="exp_word">Export Word</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
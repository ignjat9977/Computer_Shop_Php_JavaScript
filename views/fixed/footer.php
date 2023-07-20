<footer>
        <div id="footer-1" class="ik-bg-pink">
            <div class="container py-5">
                <div class="row">
                        <div class="col-12 col-md-6 col-lg-3">  
                            <div class="d-flex">
                                <img src="assets/img/Logo.png" alt="Logo"> <h4 class="ik-color-white mt-2">Lap Shop</h4>
                            </div>
                            <p class="ik-color-white">
                            Something about Lap Shop
                            </p>
                            <ul>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-geo-alt"></i>Adress 123</a></li>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-envelope"></i>example@gmail.com</a></li>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-telephone-outbound"></i>+123456788</a></li>
                                <li><a href="sitemap.xml">Sitemap</a></li>
                                <li><a href="documentation.pdf">Documentation</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h4 class="ik-color-white">Social</h4>
                            <span class="ik-border"></span>
                            <ul>    
                                <li><a href="#"><i class="bi ik-icons me-2 bi-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-instagram"></i>Instagram</a></li>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-youtube"></i>Youtube</a></li>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-linkedin"></i>Linkedin</a></li>
                                <li><a href="#"><i class="bi ik-icons me-2 bi-twitter"></i>Twitter</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h4 class="ik-color-white">Quick Links</h4>
                            <span class="ik-border"></span>
                            <ul class="navbar-nav ms-auto">
                                <?php $x = select_table("nav");
                                foreach($x as $i):?>
                                <li class="nav-item">
                                <a class="nav-link active ik-color-white" href="<?=$i->path?>"><?=$i->name?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <h4 class="ik-color-white">Newsletter</h4>
                            <span class="ik-border"></span>
                            <form action="">
                                <div class="form-row">
                                    <div class="form-group col-12 mt-2">
                                        <label for="" class="ik-color-white">Name:</label>
                                        <input type="text" name="" id="" class="form-control rounded-0">
                                    </div>
                                    <div class="form-group col-12 mt-2">
                                        <label for="" class="ik-color-white">Email:</label>
                                        <input type="text" name="" id="" class="form-control rounded-0">
                                    </div>
                                    <div class="form-group col-12 mt-2">
                                        <button class="btn btn-outline-light form-control rounded-0">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-2" class="ik-bg-black">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-2">
                    <p class="ik-color-white">
                        Designed By Ignjat Koicki All Rights Reserved
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
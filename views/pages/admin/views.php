<div class="container-fluid">
<div class="row">
    <div class="col-12">
        <h2>All time statistic of accessing the pages</h2>
    </div>
<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2 px-2">
        <?php
            $file = fopen(LOG_FILE, "r");
            $content = fread($file, filesize(LOG_FILE));
            $arr = explode("\n", $content);
            $number = count($arr);
            $arr_page=[];
            $em = 0;
            $emm = 0;
            for($i=0;$i<count($arr);$i++){
                $data = explode("__", $arr[$i]);
                if(isset($data[3])){
                    if($data[3] == "unauthorized"){
                        $em++;
                    }else{
                        $emm++;
                    }
                }
                
                array_push($arr_page, $data[0]);
            }
            $x = "?page=";
            $cart = 0;
            $payment = 0;
            $login= 0;
            $register = 0;
            $contact = 0;
            $shop = 0;
            $product = 0;
            $author = 0;
            $admin = 0;
            for($i=0;$i<count($arr_page);$i++){
                $data = explode("php", $arr_page[$i]);
                if(isset($data[1])){
                    if($data[1]==$x."cart"){
                        $cart++;
                    }else
                    if($data[1]==$x."payment"){
                        $payment++;
                    }else if($data[1]==$x."login"){
                        $login++;
                    }else if($data[1]==$x."register"){
                        $register++;
                    }else if($data[1]==$x."contact"){
                        $contact++;
                    }else if($data[1]==$x."shop"){
                        $shop++;
                    }else if($data[1]==$x."product"){
                        $product++;
                    }else if($data[1]==$x."author"){
                        $author++;
                    }else{
                        $admin++;
                    }
                }

            }

        ?>
        <div class="row">
            <div class="col-12 text-center">
            <p>All visits on page are: <span id="ik-all"><?=$number?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on shopping cart page: <span id="ik-cart"><?=$cart?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on payment page:<span id="ik-pay"><?=$payment?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on login page: <span id="ik-log"><?=$login?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on register page: <span id="ik-reg"><?=$register?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on author page: <span id="ik-au"><?=$author?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on product page: <span id="ik-prod"><?=$product?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on shop page: <span id="ik-shop"><?=$shop?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on contact page: <span id="ik-con"><?=$contact?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on admin page: <span id="ik-admin"><?=$admin?></span></p>
            </div>
            <div class="col-12 col-lg-6">
                <p>Num of unauthorized users <span><?=$em?></span></p>
            </div>
            <div class="col-12 col-lg-6">
                <p>Num of authorized users <span><?=$emm?></span></p>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2 px-2">
            <div id="chart">

            </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-12">
        <h2>Last 24h statistic of accessing the pages</h2>
    </div>
    <div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2 px-2">
        <?php
            $file = fopen(LOG_FILE, "r");
            $content = fread($file, filesize(LOG_FILE));
            $arr = explode("\n", $content);
            
            $arr_page=[];
            $arr_date = [];
            $em = 0;
            $emm = 0;
            for($i=0;$i<count($arr);$i++){
                $data = explode("__", $arr[$i]);
                if(isset($data[3])){
                    $date_time = strtotime($data[1]);
                    if($data[3] == "unauthorized" && time()-$date_time <= 86400){
                        $em++;
                    }else if($data[3] != "unauthorized" && time()-$date_time <= 86400){
                        $emm++;
                    }
                }
                
                array_push($arr_page, $data[0]);
                if(isset($data[1])):
                array_push($arr_date, $data[1]);
                endif;
               
            }
            $x = "?page=";
            $cart = 0;
            $payment = 0;
            $login= 0;
            $register = 0;
            $contact = 0;
            $shop = 0;
            $product = 0;
            $author = 0;
            $admin = 0;
            for($i=0;$i<count($arr_page);$i++){
                $data = explode("php", $arr_page[$i]);
                if(isset($data[1])){
                    $date_time = strtotime($arr_date[$i]);
                    if($data[1]==$x."cart" && time() - $date_time<= 86400){
                        $cart++;
                    }else
                    if($data[1]==$x."payment" && time() - $date_time<= 86400){
                        $payment++;
                    }else if($data[1]==$x."login" && time() - $date_time<= 86400){
                        $login++;
                    }else if($data[1]==$x."register" && time() - $date_time<= 86400){
                        $register++;
                    }else if($data[1]==$x."contact" && time() - $date_time<= 86400){
                        $contact++;
                    }else if($data[1]==$x."shop" && time() - $date_time<= 86400){
                        $shop++;
                    }else if($data[1]==$x."product" && time() - $date_time<= 86400){
                        $product++;
                    }else if($data[1]==$x."author" && time() - $date_time<= 86400){
                        $author++;
                    }else if(time() - $date_time<= 86400){
                        $admin++;
                    }
                }

            }
            $number = $cart + $payment + $login + $register + $contact + $shop + $product + $author +$admin;

        ?>
        <div class="row">
            <div class="col-12 text-center">
            <p>All visits on page are: <span id="ik-all1"><?=$number?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on shopping cart page: <span id="ik-cart1"><?=$cart?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on payment page:<span id="ik-pay1"><?=$payment?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on login page: <span id="ik-log1"><?=$login?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on register page: <span id="ik-reg1"><?=$register?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on author page: <span id="ik-au1"><?=$author?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on product page: <span id="ik-prod1"><?=$product?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on shop page: <span id="ik-shop1"><?=$shop?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on contact page: <span id="ik-con1"><?=$contact?></span></p>
            </div>
            <div class="col-12 col-lg-6">
            <p>Visits on admin page: <span id="ik-admin1"><?=$admin?></span></p>
            </div>
            <div class="col-12 col-lg-6">
                <p>Num of unauthorized users <span><?=$em?></span></p>
            </div>
            <div class="col-12 col-lg-6">
                <p>Num of authorized users <span><?=$emm?></span></p>
            </div>
            <div class="col-12">
                Who logged in in last 24 hours
                <?php 
                    $file = fopen(LOG_ACC, "r");
                    $content = fread($file, filesize(LOG_FILE));
                    $arr = explode("\n", $content);
                    $arr_email = [];
                    $arr_time = [];
                    for($i=0; $i<count($arr); $i++):
                        $data = explode("__", $arr[$i]);
                        
                        if(isset($data[0])&&isset($data[1])):
                            $t = strtotime($data[1]);
                        if(time() - $t <= 86400):

                    
                ?>
                <p>Account email: <?=$data[0]?></p>
                <?php endif;endif; endfor;?>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-info shadow h-100 py-2 px-2">
            <div id="chart1">

            </div>
    </div>
</div>
</div>
</div>
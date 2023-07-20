
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="col-12 py-3">
                <?php if(!empty($_SESSION["cart"])):?>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $sum=0;$sum_all=0;
                        foreach($_SESSION["cart"] as $c):
                            if($c["Quantity"]==""){$c["Quantity"]=1;}
                            (float)$sum = (float)$c["Price"]*(int)$c["Quantity"];
                            (float)$sum_all += $sum;
                            
                        ?>
                            <tr>
                                <td><?=$c["Name"]?></td>
                                <td><img src="<?=$c["Img"]?>" style="width:50px;height:50px;"alt="<?=$c["Name"]?>"></td>
                                <td><?=$c["Quantity"]?></td>
                                <td><?=$c["Price"]?></td>
                                <td><?=$sum?></td>
                                
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
                <div class="col-12 py-3">
                    <form  class="mt-3">
                    <div class="form-row d-flex flex-wrap mt-3">
                        <div class="form-group col-12 col-md-6 px-3">
                            <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-123"></i> Card Number:</label> 
                            <div class="d-flex align-items-center">
                                <input type="text" name="card_number" id="card_number" class="form-control rounded-0">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-6 px-3">
                            <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-credit-card"></i> Card type:</label>
                            <div class="d-flex align-items-center">
                                <select name="" id="card_type" class="form-control rounded-0">
                                    <option value="0">Choose</option>
                                        <?php
                                            $card = select_table("card");
                                            foreach($card as $c):?>
                                            <option value="<?=$c->card_id?>"><?=$c->name?></option>
                                        <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-4 px-3">
                            <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-lock-fill"></i> Security Code:</label>
                            <div class="d-flex align-items-center">
                                <input type="password" name="security_code" id="security_code" class="form-control rounded-0">
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-4 px-3">
                            <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-lock-fill"></i> Expiration month:</label>
                            <div class="d-flex align-items-center">
                                <select name="" id="exp_m" class="form-control rounded-0">
                                    <option value="0">Choose</option>
                                    <?php
                                        $month = [1,2,3,4,5,6,7,8,9,10,11,12];
                                        for($i=0; $i<count($month); $i++):?>
                                        <option value="<?=$i+1?>"><?=$month[$i]?></option>
                                    <?php endfor;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-12 col-md-4 px-3">
                            <label for=""><i class="bi ik-icons ik-color-blue me-2 bi-lock-fill"></i> Expiration year:</label>
                            <div class="d-flex align-items-center">
                                <select name="" id="exp_y" class="form-control rounded-0">
                                <option value="0">Choose</option>
                                    <?php
                                        $year = [23,24,25,26,27,28,29,30,31,32,33,34];
                                        for($i=0; $i<count($year); $i++):?>
                                            <option value="<?=$i+1?>"><?=$year[$i]?></option>
                                        <?php endfor;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 d-flex align-items-end flex-column pe-3">
                            <p>Total: <?=$sum_all?></p>
                            <input type="hidden" id="ammount" value="<?=$sum_all?>">
                        </div>
                        <div class="form-group col-12 px-3 mt-3 d-flex justify-content-end">
                            <a class="btn btn-primary rounded-0" id="payment_btn"> Buy</a>
                        </div>
                    </div>
                    </form>
                </div>
                <?php else:
                echo "<script>window.location.href='404.php'</script>";
                 endif;
                ?>
            </div>
            </div>
        </div>
    </div>



</main>

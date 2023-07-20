
<main>

    <div class="container">
        <div class="row">
            <div class="col-12 py-4 text-center">
                <h2>CART</h2>
            </div>
            <div class="col-12 py-3">
                <?php if(!empty($_SESSION["cart"])):?>
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Picture</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Remove</th>
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
                                <td><img src="<?=$c["Img"]?>" style="width:50px;height:50px;"
                                alt="<?=$c["Name"]?>"></td>
                                <td><?=$c["Quantity"]?></td>
                                <td><?=$c["Price"]?></td>
                                <td><?=$sum?></td>
                                <td>
                                    <form action="models/cart/manage_cart.php" method="POST">
                                        <input type="hidden" name="id_delete" value="<?=$c["Id"]?>"/>
                                        <button class="btn btn-danger" name="cart_delete_btn">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <div class="col-12 d-flex align-items-end flex-column">
                    <p>Total: <?=$sum_all?></p>
                    <form action="models/cart/manage_cart.php" method="POST">
                        <button class="btn btn-danger" name="cart_delete_all_btn">
                        Remove All
                        </button>
                    </form>
                    <form action="models/cart/cart.php" class="mt-3" method="POST">
                        <button class="btn btn-primary" name="purchase_btn">
                            Buy
                        </button>
                    </form>
                </div>
                <?php else:?>
                <h2>Cart is empty!!!</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>

</main>
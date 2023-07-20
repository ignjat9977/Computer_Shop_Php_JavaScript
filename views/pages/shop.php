<?php
    
?>
<main>
    <div class="container py-5">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="col-3 pe-3">
                    <label for="">Search</label>
                    <input type="search" name="" id="ik-search" class="form-control rounded-0">
                </div>
                <div class="col-9 ps-4 pe-2">
                    <label for="">Sort</label>
                    <select name="" id="ik-sort" class="form-control rounded-0">
                        <option value="0">Choose</option>
                        <?php $x = "ik_sort";
                        $sort = select_table($x);
                            foreach($sort as $s):?>
                        <option value="<?=$s->sort_id?>"><?=$s->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
                <div class="col-12 col-lg-3 px-2 mt-3">
                <ul class="list-group rounded-0 mt-2">
                    <li class="list-group-item active" aria-current="true">Brand</li>
                    <?php $brand = select_table("brand");
                    foreach($brand as $b):?>
                    <li class="list-group-item">
                        <input type="checkbox" name="" value="<?=$b->brand_id?>" class="brands ik-click"> <?=$b->name?>
                    </li>
                    <?php endforeach;?>
                </ul>
                <ul class="list-group rounded-0 mt-2">
                    <li class="list-group-item active" aria-current="true">Resolution</li>
                    <?php $res = select_table("resolution");
                    foreach($res as $r):?>
                    <li class="list-group-item">
                        <input type="checkbox" name="" value="<?=$r->resolution_id?>" class="resolutions ik-click"> <?=$r->name?>
                    </li>
                    <?php endforeach;?>
                </ul>
                <ul class="list-group rounded-0 mt-2">
                    <li class="list-group-item active" aria-current="true">Color</li>
                    <?php $color = select_table("color");
                    foreach($color as $c):?>
                    <li class="list-group-item">
                        <input type="checkbox" name="" value="<?=$c->color_id?>" class="colors ik-click"> <?=$c->name?>
                    </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <div class="col-12 col-lg-9 mt-2 ik-shop-items row ms-2">
                <?php 
                    global $product;
                    foreach($product as $p):?>
                    <div class="col-lg-4 col-sm-6 col-12 px-3 py-3">
                    <div class="shadow border ik-item">
                        <div class="col-12">
                            <img src="<?=$p->href?>" alt="<?=$p->alt?>" style="width:100%;" class="img-fluid"/>
                        </div>
                        <div class="col-12 px-2">
                            <p class="ik-no-margin-bottom"><?=$p->prod_name?></p>
                            <p class="ik-no-margin-bottom"><?=$p->color_name?></p>
                            <p class="ik-no-margin-bottom">$ <?=$p->price?></p>
                            <p class="ik-no-margin-bottom d-flex justify-content-end">Quantity</p>
                        </div>
                        <div class="col-12 px-2 mb-2 d-flex justify-content-end">
                            <form action="index.php?page=product" method="GET">
                                <input type="hidden" name="product_id" value="<?=$p->product_id?>"/>
                                <input type="hidden" name="page" value="product"/>
                                <button class="btn rounded-0 btn-primary" name="btn_view">View</button>
                            </form>
                            <form action="models/cart/manage_cart.php" class="d-flex" method="POST">
                                <input type="hidden" name="price" value="$<?=$p->price?>"/>
                                <input type="hidden" name="id" value="$<?=$p->product_id?>"/>
                                <input type="hidden" name="img" value="$<?=$p->href?>"/>
                                <input type="hidden" name="name" value="<?=$p->prod_name?>"/>                            
                                <button name="btn" class="btn rounded-0 btn-dark ms-2">Add To Cart</button>
                                <input type="number" name="quantity" min="1" class="ms-2 form-control ik-input"/>
                            </form>
                        </div>
                        <div class="col-4 ik-dis ">
                            <p class="ik-no-margin-bottom ik-color-white text-center"> <?=$p->value?$p->value."%":"";?> </p>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                    
                </div>
                
            </div>
            <div class="row">
            <div class="col-9 offset-md-3 offset-0">
                <nav aria-label="..." class="ms-4">
                <ul class="pagination pagination-lg" id="div-pag">
                    <?php $num = number_of_pages();
                    $n = ceil($num->num/6);
                    for($i=0; $i<$n; $i++):?>
                    <li class="page-item"><a class="page-link" data-li = "<?= $i ?>"><?=($i+1)?></a></li>
                    <?php endfor;?>
                </ul>
                </nav>
                </div>
            </div>
    </div>
</main>
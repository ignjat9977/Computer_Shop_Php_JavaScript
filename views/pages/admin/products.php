<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card shadow px-2 py-2">
                <h2>Add product</h2>
                <form action="models/admin/add_product.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group col-12">
                        <label for="">Product Name </label>
                        <div class="d-flex align-items-center">
                            <input type="text" name="name" id="name" placeholder="" class="form-control rounded-0"/>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Product image description</label>
                        <div class="d-flex align-items-center">
                            <input type="text" name="alt" id="alt" placeholder="" class="form-control rounded-0"/>
                        </div>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Description</label>
                        <textarea name="des" id="des" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Price: </label>
                        <input type="text" name="price" id="price" class="form-control"/>
                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Discount: </label>
                        <select name="dis" id="" class="form-control">
                            <?php
                                $x = select_table("discount");
                                foreach($x as $d):
                            ?>
                            <option value="<?=$d->discount_id?>"><?=$d->value?$d->value:"No discount"?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Image Regular: </label>
                        <input class="form-control" name="regular" type="file" id="formFile">
                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Image Thumbnail: </label>
                        <input class="form-control" name="thumb" type="file" id="formFile">
                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Color: </label>
                        <select name="color" id="" class="form-control">
                            <?php
                                $x = select_table("color");
                                foreach($x as $d):
                            ?>
                            <option value="<?=$d->color_id?>"><?=$d->name?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Brand: </label>
                        <select name="brand" id="" class="form-control">
                            <?php
                                $x = select_table("brand");
                                foreach($x as $d):
                            ?>
                            <option value="<?=$d->brand_id?>"><?=$d->name?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group col-12">
                        <label for="">Product Resolution: </label>
                        <select name="resolution" id="" class="form-control">
                            <?php
                                $x = select_table("resolution");
                                foreach($x as $d):
                            ?>
                            <option value="<?=$d->resolution_id?>"><?=$d->name?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group col-12">
                        <input type="submit" value="OK" name="btn" id="btn" class="btn btn-primary">
                    </div>
                </form>
                <div class="col-12">
                    <?php if(isset($_SESSION["er"])):
                    foreach($_SESSION['er'] as $e):?>
                        <p class="alert alert-danger">
                            <?=$e?>
                        </p>
                    <?php endforeach;
                    unset($_SESSION["er"]);
                    endif;?>
                </div>
            </div>
        
        </div>
        <div class="col-12 col-xl-6">
            <div class="card shadow px-2 py-2 row d-flex flex-wrap flex-row">
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
                        </div>
                        <div class="col-12 px-2 mb-2 d-flex justify-content-end">
                            <form action="models/admin/delete_product.php" method="POST">
                                <input type="hidden" name="product_id" value="<?=$p->product_id?>"/>
                                <button class="btn rounded-0 btn-danger" name="btn">Delete</button>
                            </form>
                        </div>
                    </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="col-12">
                        <nav aria-label="..." class="ms-4">
                            <ul class="pagination pagination-lg">
                            <?php $num = number_of_pages();
                            $n = ceil($num->num/6);
                            for($i=0; $i<$n; $i++):?>
                            <li class="page-item"><a class="page-link" href="admin.php?x=4321&limit=<?=$i?>&page=products"><?=($i+1)?></a></li>
                            <?php endfor;?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
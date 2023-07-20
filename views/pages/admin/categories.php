<div class="container-fluid py-5">

    <div class="row">
        <div class="col-12 text-center">
            <h2 class="ik-color-blue1">Modify Categories of Products From Shop</h2>
        </div>
        <div class="col-12 col-lg-4 mt-3">
            <div class="col-12 card px-3 py-3 shadow border-left-primary">
            <h3 class="ik-color-blue1">Brand</h3>
            <div class="dropdown-divider"></div>
            <form action="models/admin/delete_category.php" method="POST" class="mt-1">
                <label for="">DELETE</label>
                <select name="category_select" id="" class="form-control mt-3 w-75">
                    <option value="0">Select</option>
                    <?php 
                        $b = select_table("brand");
                        foreach($b as $x):
                    ?>
                    <option value="<?=$x->brand_id?>"><?=$x->name?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" name="table" value="brand">
                <?php
                     if(isset($_SESSION["errDel"])&&$_SESSION["table"]=="brand"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["errDel"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-danger mt-3" name="btn">Delete</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="models/admin/update_category.php" method="POST" class="mt-1 d-flex flex-column">
                <label for="">UPDATE</label>
                <select name="select" id="update_brand" class="form-control mt-3 w-75">
                <option value="0">Select</option>
                    <?php 
                        $b = select_table("brand");
                        foreach($b as $x):
                    ?>
                    <option value="<?=$x->brand_id?>"><?=$x->name?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" name="table" value="brand">
                <input type="hidden" class="form-control mt-3 w-75" name="edit" id="edit_brand"/>
                <?php
                     if(isset($_SESSION["errEdit"])&&$_SESSION["table"]=="brand"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["errEdit"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-primary mt-3 ik-width" name="btn">Update</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="models/admin/add_category.php" method="POST" class="mt-1">
                <label for="">ADD</label>
                <input type="text" class="form-control mt-3 w-75" name="add" id="add_brand"/>
                <input type="hidden" name="table" value="brand">
                <?php
                     if(isset($_SESSION["err"])&&$_SESSION["table"]=="brand"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["err"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-primary mt-3" name="btn">Add</button>
            </form>
            </div>
          
        </div>
        <div class="col-12 col-lg-4 mt-3">
            <div class="col-12 card shadow px-3 py-3 border-left-primary">

            <h3 class="ik-color-blue1">Color</h3>
            <div class="dropdown-divider"></div>
            <form action="models/admin/delete_category.php" method="POST" class="mt-1">
                <label for="">DELETE</label>
                <select name="category_select" id="" class="form-control mt-3 w-75">
                    <option value="0">Select</option>
                    <?php 
                        $b = select_table("color");
                        foreach($b as $x):
                    ?>
                    <option value="<?=$x->color_id?>"><?=$x->name?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" name="table" value="color">
                <?php
                     if(isset($_SESSION["errDel"])&&$_SESSION["table"]=="color"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["errDel"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-danger mt-3" name="btn">Delete</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="models/admin/update_category.php" method="POST" class="mt-1 d-flex flex-column">
                <label for="">UPDATE</label>
                <select name="select" id="update_color" class="form-control mt-3 w-75">
                <option value="0">Select</option>
                    <?php 
                        $b = select_table("color");
                        foreach($b as $x):
                    ?>
                    <option value="<?=$x->color_id?>"><?=$x->name?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" name="table" value="color">
                <input type="hidden" class="form-control mt-3 w-75" name="edit" id="edit_color"/>
                <?php
                     if(isset($_SESSION["errEdit"])&&$_SESSION["table"]=="color"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["errEdit"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-primary mt-3 ik-width" name="btn">Update</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="models/admin/add_category.php" class="mt-1" method="POST">
                <label for="">ADD</label>
                <input type="text" class="form-control mt-3 w-75" name="add" id="add_color"/>
                <input type="hidden" name="table" value="color">
                <?php
                     if(isset($_SESSION["err"])&&$_SESSION["table"]=="color"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["err"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-primary mt-3" name="btn">Add</button>
            </form>
            </div>
            
        </div>
        <div class="col-12 col-lg-4 mt-3">
            
            <div class="col-12 card shadow px-3 py-3 border-left-primary">
            <h3 class="ik-color-blue1">Resolution</h3>
            <div class="dropdown-divider"></div>
            <form action="models/admin/delete_category.php" method="POST" class="mt-1">
                <label for="">DELETE</label>
                <select name="category_select" id="" class="form-control mt-3 w-75">
                    <option value="0">Select</option>
                    <?php 
                        $b = select_table("resolution");
                        foreach($b as $x):
                    ?>
                    <option value="<?=$x->resolution_id?>"><?=$x->name?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" name="table" value="resolution">
                <?php
                     if(isset($_SESSION["errDel"])&&$_SESSION["table"]=="resolution"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["errDel"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-danger mt-3" name="btn">Delete</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="models/admin/update_category.php" method="POST" class="mt-1 d-flex flex-column">
                <label for="">UPDATE</label>
                <select name="select" id="update_resolution" class="form-control mt-3 w-75">
                <option value="0">Select</option>
                    <?php 
                        $b = select_table("resolution");
                        foreach($b as $x):
                    ?>
                    <option value="<?=$x->resolution_id?>"><?=$x->name?></option>
                    <?php endforeach;?>
                </select>
                <input type="hidden" name="table" value="resolution">
                <input type="hidden" class="form-control mt-3 w-75" name="edit" id="edit_resolution"/>
                <?php
                     if(isset($_SESSION["errEdit"])&&$_SESSION["table"]=="resolution"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["errEdit"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-primary mt-3 ik-width" name="btn">Update</button>
            </form>
            <div class="dropdown-divider"></div>
            <form action="models/admin/add_category.php" class="mt-1" method="POST">
                <label for="">ADD</label>
                <input type="text" class="form-control mt-3 w-75" name="add" id="add_resolution"/>
                <input type="hidden" name="table" value="resolution">
                <?php
                     if(isset($_SESSION["err"])&&$_SESSION["table"]=="resolution"):                   
                ?>
                <p class="alert alert-danger w-75"><?=$_SESSION["err"]?></p>
                <?php endif;
                ?>
                <button class="btn btn-primary mt-3" name="btn">Add</button>
            </form>
            </div>
            
        </div>
    </div>
    <?php unset($_SESSION["err"]);
          unset($_SESSION["table"]);
          unset($_SESSION["errDel"]);
          unset($_SESSION["errEdit"]);?>

</div>
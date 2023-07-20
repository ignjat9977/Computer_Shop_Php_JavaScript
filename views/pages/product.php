<?php if(isset($_GET["btn_view"])):?>
<main>
    <div class="container">
        <div class="row">
            <?php global $id;
            $p = select_product("thumbnale", $id);
            ?>
            <div class="col-12 d-flex flex-wrap">
                <div class="col-6">
                    <img src="<?=$p->href?>" style="width:100%;" alt="<?=$p->alt?>"/>
                </div>
                <div class="col-6 py-5 d-flex flex-column justify-content-center">
                    <p>Name: <?=$p->prod_name?></p>
                    <p>Brand: <?=$p->brand_name?></p>
                    <p>Color: <?=$p->color_name?></p>
                    <p>Resolution: <?=$p->res_name?></p>
                    <p>Desctiption: <?=$p->description?></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contaner">
        <div class="row px-5">
            <h3>Comments:</h3>
            <?php if(!isset($_SESSION["user"])):?>
            <div class="col-12">
                <h3>Please Register or Log in to make a comment</h3>
            </div>
            <?php
                endif;
                $comment = select_comment($id);
                if(!empty($comment)):
                    foreach($comment as $c):
            ?>
                <div class="col-12 card my-3 shadow px-3 py-3">
                    <div class="header-comment d-flex justify-content-between">
                        <p><?=$c->first_name." ".$c->last_name?></p>
                        <p><?=$c->date?></p>
                    </div>
                    <hr/>
                    <div class="body-comment">
                        <p>Message:</p>
                        <h3><?=$c->message?></h3>
                    </div>
                </div>

            <?php
                    endforeach;
                else:
            ?>
            <p>No comments. Register and comment our product</p>
            <?php 
                endif;
                if(isset($_SESSION["user"])):
            ?>
            <div class="col-12 my-3 card shadow py-5 px-5">
                <form action="models/comment.php" method="POST">
                    <label for="">Type your comment here</label>
                    <textarea name="comment" id="" class="form-control"></textarea>
                    <input type="hidden" name="prod_id" value="<?=$id?>">
                    <button class="btn btn-primary mt-2" name ="btn">Comment</button>
                </form>
            </div>
            <?php endif;?>
        </div>
    </div>
    
</main>
<?php else:
    echo "<script>window.location.href='404.php'</script>";
endif;?>
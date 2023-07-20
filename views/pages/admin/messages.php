
<div class="container-fluid">
    <div class="row">
        <div class="col-12 card shadow my-3 px-4 py-4">
            <h2>Send message</h2>
            <form action="models/admin/send_mail.php" method="POST">
                <label for="">To</label>
                <input type="text" name="email" id="" class="form-control">
                <label for="">Message</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
                <button name='btn' class="btn btn-primary">SEND</button>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <h2>Messages</h2>
        <?php 
            $x = select_table_order("contact_message");
            foreach($x as $y):
        ?>
        <div class="col-12 mt-3">
            <div class="card shadow px-2 py-2">
                <p>First Name: <?=$y->f_name?></p>
                <p>Last Name: <?=$y->l_name?></p>
                <p>Email: <?=$y->email?></p>
                <p>Message: <?=$y->message_text?></p>
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center">
            <h2>User information</h2>
        </div>
        <div class="col-12">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $x = select_table("user");
                        foreach($x as $u):
                    ?>
                    <tr>
                        <td><?=$u->first_name?></td>
                        <td><?=$u->last_name?></td>
                        <td><?=$u->email?></td>
                        <td><?=$u->address?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
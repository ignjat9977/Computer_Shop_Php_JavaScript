<?php
    $month = [];
    for($i=1; $i<=12; $i++):
        if(isset($month)):
            $month[$i] = order_ammount_per_month($i);
        endif;
    endfor;
    $mon = [ 1=>"January", 2=> "February", 3=> "March", 4=>"April",
    5=>"May", 6=>"June", 7=>"July", 8=>"August", 9=>"September",
    10=>"October", 11=>"Noveber", 12=>"December"];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-xl-6">
            <?php 
                for($i =1; $i <= count($mon); $i++):
            ?>
           
            <p><?=$mon[$i]?> salaries: <span id="ik_<?=$i?>">
            <?=!empty($month[$i])?(double)($month[$i][0]->amm):0?>
            </span></p>
            <?php endfor; ?>
        </div>
        <div class="col-12 col-xl-6 ik-line-chart">

        </div>
    </div>
</div>


<div class="container-fluid py-5">
    <div class="row">
        <div class="col-12">
            <h2>Spends per order</h2>
            <table class="table table-primary">
                <thead>
                    <tr>
                        <td>User email</td>
                        <td>Spends</td>
                        <td>Date</td>
                    </tr>

                </thead>

                <tbody>
                    <?php 
                        $spent = user_spent();
                        foreach($spent as $s):
                    ?>
                    <tr>
                        <td><?=$s->email?></td>
                        <td><?=$s->amount?></td>
                        <td><?=$s->date?></td>

                    </tr>

                    <?php endforeach;?>
                </tbody>
            </table>
            <form action="models/admin/export_excel.php" method="POST">
                <button class="btn btn-primary" name='btn'>Export table to Excel</button>
            </form>
        </div>
    </div>
</div>
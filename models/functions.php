<?php 

function select_table($x){

    global $conn;
    $sql = "SELECT * FROM $x";
    $res = $conn->query($sql)->fetchAll();
    return $res;
}
function select_table_order($x){

    global $conn;
    $sql = "SELECT * FROM $x ORDER BY message_id DESC";
    $res = $conn->query($sql)->fetchAll();
    return $res;
}
function redirect($x){
    return header("Location: $x");
}
function select_product($type_pic, $q){

    global $conn;
    $sql = "SELECT p.product_id,p.name as prod_name, description, p.date as prod_date,
    c.name as color_name, price, r.name as res_name,
    pr.date as price_date, value, href, alt, b.name as brand_name
    FROM product p join brand b on 
    p.brand_id=b.brand_id join color c on 
    p.color_id = c.color_id join resolution r 
    on p.resolution_id =r.resolution_id join price pr 
    on p.product_id = pr.product_id join discount d 
    on pr.discount_id = d.discount_id join picture pi 
    on p.product_id = pi.product_id join picture_type pt 
    on pi.picture_type_id = pt.picture_type_id 
    WHERE pt.name = '$type_pic' AND p.product_id = $q";
    $res = $conn->query($sql)->fetch();
    return $res;
}
function number_of_pages($query=null){

    global $conn;
    if($query==null){
        $query = "";
    }
    $sql = "SELECT COUNT(*) as num 
    FROM product p join brand b on 
    p.brand_id=b.brand_id join color c on 
    p.color_id = c.color_id join resolution r 
    on p.resolution_id =r.resolution_id join price pr 
    on p.product_id = pr.product_id join discount d 
    on pr.discount_id = d.discount_id join picture pi 
    on p.product_id = pi.product_id join picture_type pt 
    on pi.picture_type_id = pt.picture_type_id 
    WHERE pt.name = 'regular' $query";
    $result = $conn->query($sql)->fetch();
    return $result;
}
function get_products($query, $limit=0){

    global $conn;

    $lim = 6 * $limit;
    $sql = "SELECT p.product_id, p.name as prod_name, description, p.date as prod_date,
    c.name as color_name, price, r.name as res_name,
    pr.date as price_date, value, href, alt 
    FROM product p join brand b on 
    p.brand_id=b.brand_id join color c on 
    p.color_id = c.color_id join resolution r 
    on p.resolution_id =r.resolution_id join price pr 
    on p.product_id = pr.product_id join discount d 
    on pr.discount_id = d.discount_id join picture pi 
    on p.product_id = pi.product_id join picture_type pt 
    on pi.picture_type_id = pt.picture_type_id 
    WHERE pt.name = 'regular' $query"." LIMIT $lim, 6";
    $res = $conn->query($sql)->fetchAll();
    return $res;
}
function insert_contact_message($first,$last,$email,$message){
    global $conn;
    $sql = "INSERT INTO contact_message(f_name, l_name, email, message_text) VALUES 
    (:firstN, :lastN, :mail, :mess)";

    $insert = $conn->prepare($sql);
    $insert->bindParam(":firstN", $first);
    $insert->bindParam(":lastN", $last);
    $insert->bindParam(":mail", $email);
    $insert->bindParam(":mess", $message);

    $result = $insert->execute();

    return $result;
}
function check_login($username, $password){
    global $conn;
    $lock = 0;
    $sql = "SELECT * FROM user WHERE user_name=:u AND password=:p AND lock_user = :l";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":u", $username);
    $stmt->bindParam(":p", $password);
    $stmt->bindParam(":l", $lock);

    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}
function log_page($type_of_action){ 
    $visited_page = $_SERVER['REQUEST_URI'];
    $date_time = date("Y-m-d h:i:s");
    $ip = $_SERVER['REMOTE_ADDR'];

    $user = "unauthorized";


    if(isset($_SESSION['user'])){
        $user = $_SESSION['user']->email;
    }

    $content = $visited_page."__".$date_time."__".$ip."__".$user."__".$type_of_action."\n";

    $file = fopen(LOG_FILE, "a");
    $write = fwrite($file, $content);
    if($write){
        fclose($file);
    }
}
function log_account(){
    $date_time = date("Y-m-d h:i:s");
    $user = $_SESSION['user']->email;
    $content = $user."__".$date_time."\n";

    $file = fopen(LOG_ACC, "a");
    $write = fwrite($file, $content);
    if($write){
        fclose($file);
    }
}
function insert_cart($user_id){
    global $conn;

    $sql="INSERT INTO cart (user_id) VALUES(:u)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":u", $user_id);

    $res = $stmt->execute();
    return $res;
}
function insert_cart_product($quantity, $product_id,$cart_id){
    global $conn;

    $sql = "INSERT INTO product_cart(quantity, product_id, cart_id)
            VALUES(:q,:p,:c)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":q", $quantity);
    $stmt->bindParam(":p", $product_id);
    $stmt->bindParam(":c", $cart_id);

    $res = $stmt->execute();
    return $res;

}
function insert_payment($ammount, $card_id){
    global $conn;

    $sql = "INSERT INTO payment(amount, card_id)
            VALUES(:a,:c)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":a", $ammount);
    $stmt->bindParam(":c", $card_id);

    $res = $stmt->execute();
    return $res;
}
function insert_order_user($user_id,$payment_id){
    global $conn;

    $sql = "INSERT INTO order_user(user_id, payment_id)
            VALUES(:u,:p)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":u", $user_id);
    $stmt->bindParam(":p", $payment_id);

    $res = $stmt->execute();
    return $res;
}
function insert_ik_order($quantity, $product_id, $order_user_id){
    global $conn;

    $sql = "INSERT INTO ik_order(quantity, product_id, order_user_id)
            VALUES(:q,:p,:o)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":q", $quantity);
    $stmt->bindParam(":p", $product_id);
    $stmt->bindParam(":o", $order_user_id);

    $res = $stmt->execute();
    return $res;
}
function delete($id,$table, $id_c){
    global $conn;

    $sql = "DELETE  FROM $table WHERE $id_c = :id";

    $delete = $conn->prepare($sql);
    $delete->bindParam(":id", $id);

    $result = $delete->execute();

    return $result;
}
function add_category($name, $table){
    global $conn;

    $sql = "INSERT INTO $table(name)
    VALUES(:n)";

    $stmt=$conn->prepare($sql);
    $stmt->bindParam(":n", $name);

    $result = $stmt->execute();
    return $result;
}
function update_category($id, $table_id, $edit, $table){
    global $conn;

    $sql = "UPDATE $table
            SET name = :n
            WHERE $table_id = :i";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":n", $edit);
    $stmt->bindParam(":i", $id);
    
    $result = $stmt->execute();
    return $result;
}
function insert_product($name, $des, $brand, $color, $res){
    global $conn;

    $sql = "INSERT INTO product(name, description, brand_id, color_id, resolution_id)
    VALUES(:n,:d,:b,:c,:r)";

    $stmt = $conn->prepare($sql);
    $stmt -> bindParam(":n", $name);
    $stmt -> bindParam(":d", $des);
    $stmt -> bindParam(":b", $brand);
    $stmt -> bindParam(":c", $color);
    $stmt -> bindParam(":r", $res);

    return $stmt->execute();

}
function insert_price($price, $dis, $prod_id){
    global $conn;

    $sql = "INSERT INTO price(price, discount_id, product_id)
    VALUES(:p, :d, :i)";

    $stmt = $conn->prepare($sql);
    $stmt -> bindParam(":p", $price);
    $stmt -> bindParam(":d", $dis);
    $stmt -> bindParam(":i", $prod_id);

    return $stmt->execute();
}
function insert_picture($href,$alt,$prod_id,$pt_id){
    global $conn;

    $sql = "INSERT INTO picture(href, alt, product_id, picture_type_id)
    VALUES(:h, :a, :p, :i)";

    $stmt = $conn->prepare($sql);
    $stmt -> bindParam(":h", $href);
    $stmt -> bindParam(":a", $alt);
    $stmt -> bindParam(":p", $prod_id);
    $stmt -> bindParam(":i", $pt_id);

    return $stmt->execute();
}
function user_spent(){
    global $conn;

    $sql = "Select email, amount, o.date as date
    from user u inner join order_user o on u.user_id = o.user_id
     inner join payment p on o.payment_id = p.payment_id";

    $res = $conn->query($sql)->fetchAll();
    return $res;
}
function order_ammount_per_month($month){
    global $conn;

    $sql = "SELECT SUM(amount) as amm, o.date
    from order_user o inner join payment a on o.payment_id = a.payment_id
    WHere YEAR(o.date) = year(curdate()) AND Month(o.date) = $month
    GROUP BY Month(o.date)";

    $res = $conn->query($sql)->fetchAll();
    return $res;
}
function insert_comment($message, $prod_id, $user_id){
    global $conn;

    $sql = "INSERT INTO comment(message, product_id, user_id)
    VALUES(:m, :p, :u)";

    $stmt = $conn->prepare($sql);
    $stmt -> bindParam(":m", $message);
    $stmt -> bindParam(":p", $prod_id);
    $stmt -> bindParam(":u", $user_id);

    return $stmt->execute();
}
function select_comment($prod_id){
    global $conn;

    $sql = "SELECT c.date, c.message, u.first_name, u.last_name
    FROM comment c inner join user u ON c.user_id = u.user_id
    WHERE product_id = $prod_id
    ORDER BY c.date DESC";

    $res = $conn->query($sql)->fetchAll();
    return $res;
}
function check_user_name($username, $password){
    global $conn;

    $sql = "SELECT * FROM user WHERE user_name=:u AND password!=:p";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":u", $username);
    $stmt->bindParam(":p", $password);

    $stmt->execute();
    $res = $stmt->fetch();
    return $res;
}
function insert_user($first,$last,$user,$email,$adress,$pass){
    global $conn;
    $sql = "INSERT INTO user(first_name, last_name,user_name,email,password ,address,role_id)
    VALUES(:u, :p, :f, :l, :a, :e, :r)";
    $role = 2;


    $insert = $conn->prepare($sql);
    $insert->bindParam(":u", $first);
    $insert->bindParam(":p", $last);
    $insert->bindParam(":f", $user);
    $insert->bindParam(":l", $email);
    $insert->bindParam(":a", $adress);
    $insert->bindParam(":e", $pass);
    $insert->bindParam(":r", $role);

    $result = $insert->execute();
    return $result;
}
function lock_account($email){
    global $conn;

    $sql = "UPDATE user
    SET lock_user = 1
    WHERE email = '$email'";

    return $conn->query($sql)->execute();
}
function unlock_user($email){
    global $conn;

    $sql = "UPDATE user
    SET lock_user = 0
    WHERE email = '$email'";

    return $conn->query($sql)->execute();
}
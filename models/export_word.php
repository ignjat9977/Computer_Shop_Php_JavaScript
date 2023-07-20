<?php
 $doc_body ="
 <p>First name: Ignjat</p>
                        <p>Last name: Koicki</p>
                        <p>Index: 220/21</p>
                        <p>Biography: I was born on January 26, 1997 in Novi Sad. Elementary school and
                            and high school I finished in Belgrade. I'm attending ICT college now.   
                        </p>
 ";
 ?>
 <form name="proposal_form" action="<?=$_SERVER["PHP_SELF"]?>" method="post">
  <input type="submit" name="submit_docs" value="Export as MS Word" class="btn btn- primary" />
</form>
<?php
  if(isset($_POST['submit_docs'])){
          header("Content-Type: application/vnd.msword");
          header("Expires: 0");//no-cache
          header("Cache-Control: must-revalidate, post-check=0, pre-check=0");//no-cache
          header("content-disposition: attachment;filename=author.doc");
  }         
          echo "<html>";
          echo "$doc_body";
          echo "</html>";      
?>
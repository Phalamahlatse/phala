<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>File Handling</title>
    <link rel="stylesheet"  href="style.css">
  </head>
  <body>
    <center>
    <?php
    if(isset($_POST['name'])? $_POST["name"] :"")
    {
      $name=$_POST['name'];
      if(!empty($name)) {
        $file=fopen('fileNames.txt','a');
        fwrite($file,$name . "\n");

        fclose($file);

        $read=file('fileNames.txt');

          foreach($read as $sread){
            echo "Hello ". $sread . "You are welcome ";
          }

        echo '';
      }else {
        echo '';
      }
    }
?>
 <hr><br><br>

 <form class="" action="formFinal.php" method="post">
   <table>
     <tr>
       <td>Name</td><td><input type="text" name="name" value="<?php print isset($_POST["name"]) ? $_POST["name"] :""; ?>" required /></td>
     </tr>
     <tr>
       <td>Province</td>
       <td>
           <select class="" name="Province_txt">
             <option>Select</option>

             <?php
                 $province= file("southafricaprov.txt");
                 foreach ($province as $province)
                 {
                   print "<option values=\"$province\">$province<option>";
                 }
              ?>
           </select>
       </td>
     </tr>
     <tr>
         <td><input type="reset" name="btn_clear" value="Clear"></td>
         <td><input type="submit" name="btn_submit" value="Send"></td>
     </tr>
   </table>
 </form>

       <?php
           #check if the form was_sent
           if(isset($_POST["btn_submit"]))
           {
               #collect the data
               $province = $_POST["Province_txt"];

               #process the data
               $name = strtolower($name);
               $name = ucfirst($name);

               #print the output
               print "<p>
               <p>Please confirm that you are  in $province ";
            }
        ?>


</center>
  </body>
</html>

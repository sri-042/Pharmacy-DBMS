<?php

require_once 'config.php';
require_once 'online.php';
$branchID = $_SESSION['branchID'];
$username = $_SESSION['userName'];

if(isset($_POST['notif']))
{
  notify($_POST['medicineID']);
}

if(isset($_GET['k']))
{
    $k = $_GET['k'];
    $sql = "SELECT medicineID,medicineName,expDate,mfdCompany,mrp,description,img_path,quantity FROM medicine WHERE branchID='$branchID' AND (medicineName LIKE '%{$k}%' OR mfdCOmpany LIKE '%{$k}%' OR description LIKE '%{$k}%')";
}
else 
    $sql = "SELECT medicineID,medicineName,expDate,mfdCompany,mrp,description,img_path,quantity FROM medicine WHERE branchID ='$branchID'";


function notify($medicineID)
{
  global $mysqli,$branchID,$username;
  $sql5 = "SELECT * FROM pending WHERE branchID='$branchID' AND userName = '$username' AND medicineID = '$medicineID'";
  $res1 = $mysqli -> query($sql5);
  
  if($res1->num_rows == 0){
  $sql4 = "INSERT INTO pending(medicineID,branchID,userName) VALUE('$medicineID','$branchID','$username')";
  $res = $mysqli -> query($sql4);
  }
}



$result = $mysqli->query($sql);
?>

<?php while($product  = mysqli_fetch_assoc($result)): ?>
  <div class="card border-primary mb-3" style="width = 100%; margin: 10px 10px;S"  >
    <div class="row g-0">
      <div class="col-md-4">
      <img src=<?php echo $product['img_path'] ?> class="img-fluid rounded-start" alt=<?php echo $product['medicineName']  ?> width = 60% height=60% >
      </div>
      <div class="col-md-8">
      
        <div class="card-body">  
          <h5 class="card-title"><?= $product['medicineName']; ?></h5>
          <p class="card-text"><?= $product['description']; ?></p>
          <p class="card-text">MRP : Rs. <?= $product['mrp']; ?></p>
          
            <?php

            if( $product['quantity'] == 0 )
            {
                echo "<p style='color:red;'>Out Of Stock</p>";
                if(!isset($_POST['notif'])){
                echo "<form method = 'POST'>";
                echo "<input type='hidden' name='medicineID' value=".$product['medicineID'].">";
                echo "<input type='Submit' name='notif' class='btn btn-primary' value='Notify Me'>";
                }
            }
            else{
              echo "<form action='update.php'>";
              echo "<input type='number' id='quantity' name='quantity' min='0' max=".$product['quantity'].">
              <input type='Submit' class=' btn btn-primary'  value='Add To Cart' >";
            }
          ?>
        <input type='hidden' name='medicineID' value=<?php echo $product['medicineID']?>>
        <input type='hidden' name='mrp' value=<?php echo $product['mrp']?>>
        
        </form>
      </div>
      
    </div>
  </div>
</div>
<?php endwhile; ?>
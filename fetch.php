<?php
//fetch.php
include_once 'C:\xampp\htdocs\newtemp\conx\connexion.php';
if(isset($_POST["action"]))
{
 //$connect = mysqli_connect("localhost", "root", "", "testing");
  $cox = new Connexion();
 //$output = '';
 if($_POST["action"] == "idPays")
 {
  $query = "SELECT nomVille,idVille FROM ville WHERE idPays = '".$_POST["query"]."'";
  //$result = mysqli_query($connect, $query);
  $result = $cox->getConnexion()->prepare($query);
  $result->execute();
  $dt = $result->fetchAll();
  //$output .= '<option value="">Select City</option>';

  foreach($dt as $role):?>
  <option value="<?php echo $role['idVille'] ?>"><?php echo $role['nomVille'] ?></option>
  <?php endforeach; ?>

 <?php } ?>
<?php } ?>

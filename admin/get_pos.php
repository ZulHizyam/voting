<?php
//Include database connection
require("../includes/connection.php");
?>
<html>


<?php
$org = trim($_POST['course']);
$sql = "SELECT * FROM positions WHERE course = ?";
if(!$stmt = $db->prepare($sql)) {
    echo $stmt->error;
} else {
    $stmt->bind_param("s", $org);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<option value="">*****Select Position*****</option>
<?php if($result) { ?>
    <?php while($rowPos = $result->fetch_assoc()) { ?>
        <option value="<?php echo $rowPos['pos']; ?>"><?php echo $rowPos['pos']; ?></option>
    <?php } //End while ?>
<?php } //End if ?>

</html>
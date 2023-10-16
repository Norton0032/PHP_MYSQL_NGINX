<form id="myForm" action="create.php" method="post">
<?php
print_r($_POST);
    foreach ($_POST as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
    }
?>
</form>
<script type="text/javascript">
    //document.getElementById('myForm').submit();
</script>

<?php

// if ($_SERVER['REQUEST_METHOD'] == "POST"){
// echo "<form id='myForm' action='create.php' method='post'>";
//     foreach ($_POST as $a => $b) {
//         echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
//     }
// echo "</form>";
// echo "<script type='text/javascript'>";
// echo "<document.getElementById('myForm').submit();>";
// echo "</script>";
// }
// else{
//     echo "Не пост";
// }
?>

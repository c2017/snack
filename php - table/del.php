<?php
    include "contact.php";

    $id=$_GET["id"];
    $db->query("delete from stu where id=$id");
    while($db->affected_rows){
        echo "<script>location.href='table.php'</script>";
    }

?>

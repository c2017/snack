<?php
    include "../public/session.php";
    include "../public/db.php";

    $sql="select * from position";
    $result=$db->query($sql);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        table{
            width:800px;
            border:1px solid #000000;
            border-collapse:collapse;
            margin:0 auto;
            margin-top:40px;
        }
        tr,td{
            height:26px;
            border:1px solid #000;
            line-height:26px;
        }
        td{
            padding-left:15px;
            overflow:hidden;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>推荐位id</th>
        <th>推荐位名称</th>
        <th>编辑</th>
    </tr>
    <?php
        while($row=$result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row["posid"] ?></td>
                <td><?php echo $row["posname"] ?></td>
                <td>
                    <a href="delpos.php?id=<?php echo $row['posid'];?>">删除</a>
                    <a href="editpos.php?id=<?php echo $row['posid'];?>">编辑</a>
                </td>
            </tr>

            <?php
        }
    ?>
</table>
</body>
</html>

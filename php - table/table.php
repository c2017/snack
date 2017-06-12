<?php
    include "contact.php";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        table{
            width:1000px;
            margin:0 auto;
            border:1px solid #000;
            border-collapse:collapse;
            table-layout:fixed;

        }
        tr{
            height:28px;
            line-height:28px;
            border:1px solid #000;
        }
        td{
            width:25%;
            border:1px solid #000;
            text-align:center;
        }
    </style>
</head>
<body>
    <table cellspacing="0" cellspacing="0">
        <tr>
            <th>姓名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>操作</th>
        </tr>
        <?php
            $sql="select * from stu";
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()){
        ?>
             <tr>
                <td><?php echo $row["name"]?></td>
                <td><?php echo $row["age"]?></td>
                <td><?php echo $row["sex"]?></td>
                <td>
                    <a href="update.php?id=<?php echo $row['id']?>">修改</a>
                    <a href="del.php?id=<?php echo $row['id']?>">删除</a>
                </td>
             </tr>
        <?php
            }
        ?> 
    </table>
</body>
</html>

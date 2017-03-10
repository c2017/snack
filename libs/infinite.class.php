<?php

class infinite
{
    function infinite()
    {
        $this->str = "";
    }

    /*
     @param
         $pid    父类别id
         $flag   从第几级分类开始标识
         $table  表名
         $db     数据库名
         $current     获取当前分类的父id
    */
    function tree($pid, $flag, $table, $db,$current=null)
    {
        $currentPid=null;
        if($current){
            $result=$db->query("select * from category where cid=".$current);
            $row=$result->fetch_assoc();
            $currentPid=$row["pid"];
        }

        if($pid==0){
            $this->str.="<option value='0'>一级标题</option>";
        }

        $sql = "select * from $table where pid=" . $pid;
        $result = $db->query($sql);
        $strflag=str_repeat("- ",$flag);
        $flag=$flag+1;
        while ($row = $result->fetch_assoc()) {
            $cid = $row["cid"];
            if($cid==$currentPid){
                $this->str .= "<option value='$cid' selected='selected' >{$strflag}{$row["cname"]}</option>";
            }else{
                $this->str .= "<option value='$cid' >{$strflag}{$row["cname"]}</option>";
            }
            $this->tree($cid, $flag, $table, $db,$current);
        }
    }

    /*
    @param
        $pid    父级别的id
        $flag   标识，区分级别
        $table  表名
        $db     数据库名
   */
    function table($pid, $flag, $table, $db)
    {
        $sql = "select * from $table where pid=".$pid;
        $result = $db->query($sql);
        $strflag=str_repeat("- ",$flag);
        $flag=$flag+1;

        while ($row = $result->fetch_assoc()) {

            $cid = $row["cid"];
            $pid=$row["pid"];
            $cname=$row["cname"];
            $this->str .= "<tr>
                    <td>$cid</td>
                    <td>{$strflag}{$cname}</td>
                    <td>$pid</td>
                   
                    <td>
                        <a href='delCategory.php?id=$cid'>删除</a>
                        <a href='editCategory.php?id=$cid'>编辑</a>
                    </td>
                </tr>";
            $sql1="select * from $table where pid=".$cid;
            $result1=$db->query($sql1);
            if($result1->fetch_assoc()){
                $this->table($cid,$flag,$table,$db);
            }
        }
    }

    /*
    @param
        $table  表名
        $db     数据库名
   */
    function stitle($table, $db)
    {
        $sql = "select * from $table";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
//                推荐位
//                echo $row["posid"];
            $posres=$db->query("select * from position where posid=".$row["posid"]);
            $posrow=$posres->fetch_assoc();
            if($posrow['posid']==0){
                $posname="";
            }else{
                $posname=$posrow['posname'];
            }

            $sid = $row["sid"];
            $stitle=$row["stitle"];
            $stime=$row["stime"];

            $csql="select cname from category where cid=".$row["cid"];
            $result1=$db->query($csql);
            $row1=$result1->fetch_assoc();

            $cname=$row1["cname"];
            $this->str .= "<tr>
                    <td>$sid</td>
                    <td>$cname</td>
                    <td>$stitle</td>
                    <td>$stime</td>
                    <td>$posname</td>
                    <td>
                        <a href='delcon.php?id=$sid'>删除</a>
                        <a href='editcon.php?id=$sid'>编辑</a>
                    </td>
                </tr>";

        }
    }

    /*
     * 后台管理内容的表
    @param
        $table  表名
        $db     数据库连接  使用db.class.php的方式查询
   */
    function audititle($sql,$table, $db)
    {
//        $sql= "select * from $table";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {

            $sid = $row["sid"];
            $stitle=$row["stitle"];
            $stime=$row["stime"];
            $audited=$row["audited"];
            if($audited==0){
                $audited="未审核";
            }else if($audited==1){
                $audited="审核中";
            }else if($audited==2){
                $audited="审核通过";
            }else if($audited==4){
                $audited="审核失败";
            }

            $csql="select cname from category where cid=".$row["cid"];
            $result1=$db->query($csql);
            $row1=$result1->fetch_assoc();


            $cname=$row1["cname"];
            $this->str .= "<tr>
                    <td>$sid</td>
                    <td>$cname</td>
                    <td>$stitle</td>
                    <td>$stime</td>
                    <td>$audited</td>
                    <td>
                        <a href='index.php?m=admin&f=art&a=audited&sid=$sid'>审核</a>
                    </td>
                </tr>";

        }
    }

}








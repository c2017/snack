## 说明
* db.class.php文件是让我可以以更方便的方式来连接数据库和操作数据库
* 作者：常圆圆
* 邮箱：c2017@foxmail.com
* 上传日期：2017-3-2

## 配置
* $hostname  服务器域名 默认localhost
* $dbname    数据库名称 默认demo
* $tablename 要操作的表格的名称，默认为空，在实例化数据库连接对象的时候传参

## 连接数据库
* 连接数据库，默认连接localhost下的demo数据库<br/>
``$db=new db("stu");``
* 更换连接
```php
    $db->hostname="yourhost";
    $db->dbname="datebase";
    $db->tablename="tablename";
    $db->config(); //重新建立连接
    
    $result=$db->select();
    var_dump($result);
```
* 数据库操作
    *  查询 select
    ```php
    /*
     * @param    [string](sql,key)  可以传入sql语句，你要查找的字段名
     * @example  select('name')
     * @example  select('name,sex')
     * @example  select('select * from table');
     * @return   返回一个数组，数组中保存查询到的结果
     * */
    ```
    *  删除 delete
    ```php
    /*
     * @param    [string](sql,string)
     * @example  delete();
     * @example  delete('id=3');
     * @example  delete("delete from table where name='zhangsan'");
     * @return   操作影响的行数 -1表示执行sql语句失败
     * */
    ```
    *  添加 insert
    ```php
    /*
     * @param   [string](sql,string)
     * @example insert();
     * @example insert("name='zhangsan'");
     * @example insert("name='zhangsan' ; age='12'");
     * @example insert("insert into table (name,age) values ('zhangsan','12')")
     * @return  操作影响的行数 -1表示执行sql语句失败
     * */
    ```
    *  修改 update
    ```php
    /*
     * @param   [string](sql,string)
     * @example update();
     * @example update("name='zhangsan' , age='12'");
     * @example update("name='zhangsan' , age='12' where id=1");
     * @example update("update table set name='zhangsan',age='12' where id=1");
     * @return  操作影响的行数 -1表示执行sql语句失败
     * */
    ```
    *  order
    ```php
    /*
     * @param    string
     * @example  order("age desc")
     * @return   当前对象
     * */
    ```
    *  where
    ```php
    /*
     * @param [string]
     * @example where('id=1')
     * @return  当前对象
     * */
    ```
    *  limit
     ```php
      /*
       * @param    string (index,length)
       * @example  limit("0,2")
       * @return   当前对象
       * */
     ```
    *  字段 filed
    ```php
    /*@param    [string] 表示查找的字段
      @example  filed('name,age')  【select】
      @example  filed("name='zhangsan',age='12'") 【update】
      @example  filed("name='zhangsan';age='12'")  【insert】
      @example  filed("name='zhangsan'")  【update,insert】
      @return   当前对象
    */
    ```
    
*  操作实例
   ```php
   
    $db->dbname="test";
    $db->tablename="category";
    $db->config();
    $result=$db->select();
    var_dump($result);

    $arr=$db->select();
    $arr=$db->select("id");
    $arr=$db->where("id=0")->select();
    $arr=$db->limit()->order()->select();
    $arr=$db->select("select name from stu where id=0");
    $arr=$db->insert("insert into table (name,age) values ('zhangsan','12')");
    $arr=$db->where("id=0")->delete();
    $arr=$db->filed("age='10'")->where("id=10")->update("name='zhangsan'");

   
   ```

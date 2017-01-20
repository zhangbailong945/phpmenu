<?php
/**
 * 数据库基类
 * @author Loach
 *
 */
class DataBase
{
	
	  //数据库连接
	  private $conn;
	  /**
	   * 初始化数据库连接
	   * @param Array $dbconfig 数据库配置信息
	   */
	  public function __construct($dbconfig)
	  {
	      $conn=mysql_connect($dbconfig['host'],$dbconfig['username'],$dbconfig['userpassword']);
	      if(!$conn)
	      {
	          echo "打开MySQL失败，请联系管理人员。";
	          exit;
	      }
	      $this->conn=$conn;
	      $dbname=mysql_select_db($dbconfig['dbname']);
	      if(!$dbname)
	      {
	         echo "连接数据库失败！";
	         exit;
	      }
	      mysql_set_charset($dbconfig['charset']);
	  }
  
	  /**
	   * 关闭数据库
	   */
	  public function __destruct()
	  {
	      mysql_close();
	  }
  
	  /**
	   * 添加数据
	   * @param String $tbname 表名
	   * @param Array $data  添加的数据
	   */
	  public function insert($tbname,$data)
	  {
	     $sql="insert into `".$tbname."` ";
	     $sql.="(`".implode('`,`',array_keys($data))."`)";
	     $sql.="values";
	     $sql.="('".implode("'',",$data)."')";
	     $result=mysql_query($sql,$this->conn);
	     if($result)
	     {
	        return true;
	     }
	     else
	     {
	        return false;
	     }
	         
	  }
  
	   /**
	    * 查询
	    * @param $sql 查询语句
	    */
       public function select($sql)
       {
	        $result=mysql_query($sql,$this->conn);
                $data=array();
	        if($result&&mysql_num_rows($result)>0)
	        {
	           while($row=mysql_fetch_assoc($result))
	           {
	              $data[]=$row;
	           }
	        }
	        return $data;
       }
  
       /**
        * 更细数据
        * @param String $tbname 表名
        * @param Array $data    更细的数据
        * @param String $where  条件
        */
       public function update($tbname,$data,$where)
       {
           $sql="update ".$tbname." set ";
           foreach ($data as $key=>$val)
           {
             $sql.="`".$key."`='".$val."',";
           }
           $sql=rtrim($sql,',');
           $sql.='where '.$where.'';
           $result=mysql_query($sql,$this->conn);
           if($result&&mysql_affected_rows()>0)
           {
              return true;
           }
           else
           {
              return false;
           }
       }
       
       /**
        * 根据条件删除数据表数据
        * @param $tbname 表名
        * @param $where  条件
        */
       public function delete($tbname,$where)
       {
          $sql="delete from `".$tbname."` ";
          $sql.='where '.$where.'';
          $result=mysql_query($sql,$this->conn);
          if($result&&mysql_affected_rows()>0)
          {
              return true;
          }
          else
          {
              return false;
          }
       }
  
}
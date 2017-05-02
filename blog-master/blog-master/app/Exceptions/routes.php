<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/31
 * Time: 13:24
 */
/*
 *
 *
 */
//以下是数据库链接程序，但是我其实不知道要把这块写到哪里去，所以就直接写在后面了，是直接应用Mysql扩展
$link = mysql_connct("localhost","root","root")or die("could not connect:".mysql_error());//链接数据库
mysql_select_db("linklist");//选择数据库
//链表节点
Route::get('/sum',function(){
    $i = 0;
    $current = $this->header;
    while ( $current->next != null ) {
        $i ++;
        $current = $current->next;
    }
    return  $i;
    echo "current sum is".$i;
      /*  $sql3='select * from users';
        $result=mysql_query($sql3);
        while($row=mysql_fetch_assoc($result)){
            print_r($row);
            echo"<br>";
    }*/
});
//添加节点地一个数据；
//
Route::get('/add{$node}',function ($node=header){
    $current = $this->header;
    while ( $current->next != null ) {
        if ($current->next->id > $node->id) {
            break;
        }
        $current = $current->next;
    }
    $node->next = $current->next;
    $current->next =$node;
        return 'new node added';
    echo "added successfully";
    $sqll="insert into users(node,incurrent)values ('node','id')";//把id设置为自增

});

Rout::get('/clear',function( ) {
    echo 'sure to clear all the data? Y/N';
                       // input $a;
                        //switch($a)
                        //{ case 'y' ;break;
                        //case 'N'; return'clearing canceled';}
                    $this->header = null;
    echo 'clear successfully';
});

Route::get('/update{$name},{$id}',function($name,$id){
    $current = $this->header;
    if ($current->next == null) {
        echo "empty link";
        return;
        DB::update('update users set $id=$id+1 where name=?',['name']);
    }
    while ( $current->next != null ) {
        if ($current->id == $id) {
            break;
        }
        $current = $current->next;
    }
    return $current->name = $name;
});
Route::get('/delete{$id}',function($id){
    $current = $this->header;
    $flag = false;
    while ( $current->next != null ) {
        if ($current->next->id == $id) {
            $flag = true;
            break;
        }
        $current = $current->next;
    }
    if ($flag) {
        $current->next = $current->next->next;
        DB::table('linklist')->where('id'==$id)->delete;
    } else {
        echo "未找到id=" . $id . "的节点！<br>";
    }
});





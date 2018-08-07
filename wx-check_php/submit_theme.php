<?php
    header("Content-type: text/html; charset=utf-8"); 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "test";
    // $servername = "flhhc4x2.2363.dnstoo.com";
    // $username = "wxcheck_f";
    // $password = "ada456ada456";
    // $dbname = "wxcheck";

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 
    $input_form=$_POST['input_form'];
    $user_name=$_POST['user_name'];
    var_dump($input_form);
    $index_list=[];
 
    $page_id=$_POST['page_id'];
    $sql_list='';
    $sql_list.="('$user_name','$input_form',0,$page_id)";

    $sql="INSERT INTO comment (author,text_info,comment_num,parent_id) VALUES ".$sql_list;
    if ($conn->query($sql) === TRUE) {
        // echo "新记录插入成功";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql_query="SELECT answer_num,id FROM loc_more";
    $result = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            if($row['id']==$page_id){
                $answer_num_update=$row["answer_num"]+1;
                $sql="UPDATE loc_more SET answer_num = $answer_num_update where id = $page_id";
                if ($conn->query($sql) === TRUE) {
                    echo 'yes';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }   
            }
        }
    } else {
        echo "0 结果";
    }

    mysqli_close($conn);
?>
<?php
error_reporting(0);
    header("Content-type: text/html; charset=utf-8"); 
    // $servername = "localhost";
    // $username = "root";
    // $password = "root";
    // $dbname = "test";
    $servername = "flhhc4x2.2363.dnstoo.com";
    $username = "wxcheck_f";
    $password = "ada456ada456";
    $dbname = "wxcheck";

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    } 

    $post=$_GET['title'];

    $sql="SELECT img_pic,title,list_info,background FROM commodities";
    $result = mysqli_query($conn, $sql);
 
    $arr=[];
    $background='';
    $img_pic='';

    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {//$row为一行的数据
            if($row["title"]==$post){
                $img_pic=(json_decode($row['img_pic'])==null)?[$row['img_pic']]:json_decode($row['img_pic']);
                $arr=json_decode($row['list_info']);//字符串转对象
                $background=$row['background'];
            }
            
        }
        
    } else {
        echo "0 结果";
    }

    $target=$arr;//解析成数组

    $table=[
            [
                (Object)[
                    'key'=>'名称', 
                    'value'=>array_shift($target)
                ]
            ],//0
            [
                (Object)[
                    'key'=>'志编号', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'简称', 
                    'value'=>array_shift($target)
                ]
            ],//1
            [
                (Object)[
                    'key'=>'题材', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'发行日期', 
                    'value'=>array_shift($target)
                ]
            ],//2
            [
                (Object)[
                    'key'=>'发行量', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'设计者', 
                    'value'=>array_shift($target)
                ]
            ],//3
            [
                (Object)[
                    'key'=>'原作者', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'版别', 
                    'value'=>array_shift($target)
                ]
            ],//4
            [
                (Object)[
                    'key'=>'发行机构', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'类别', 
                    'value'=>array_shift($target)
                ]
            ],//5
            [
                (Object)[
                    'key'=>'雕作者', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'全套枚数', 
                    'value'=>array_shift($target)
                ]
            ],//6
            [
                (Object)[
                    'key'=>'整版枚数', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'印刷机构', 
                    'value'=>array_shift($target)
                ]
            ],//7
            [
                (Object)[
                    'key'=>'齿孔度数', 
                    'value'=>array_shift($target)
                ],
                (Object)[
                    'key'=>'背胶', 
                    'value'=>array_shift($target)
                ]
            ],//8
    ];
    echo json_encode((Object)[
        'img_pic'=>$img_pic,
        'list_info'=>json_encode($table),//对象转字符串
        'background'=>$background
    ]);
 
    mysqli_close($conn);
?>

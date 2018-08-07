<?php
    header("Content-type: text/html; charset=utf-8"); 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "test";
// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$bar=[];
$parent_id=$_POST['parent_id'];
$sql="SELECT author, text_info, comment_num,parent_id FROM comment";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {//$row为一行的数据
        if($row['parent_id']==$parent_id){
            array_push($bar,(Object)[
                'author'=>$row['author'],
                'text'=>$row['text_info'],
                'comment_num'=>$row['comment_num']
              ]);
        }
     
    }
} else {
    echo "0 结果";
}
mysqli_close($conn);
    /*$list=[
        (Object)[
            "author"=>"推崇性价比",
            "comment_num"=>"23",
            "text"=>"热闹热闹挺好"
        ],
        (Object)[
            "author"=>"sasdas8",
            "comment_num"=>"500",
            "text"=>"手机看贴中国书画具有悠久的历史和独特的审美情趣，不管是古代书画还是近现代书画都在世界美术领域占有重要地位。近些年来，中国书画以丰富灿烂的文化性与艺术性使得长久以来占据了中国艺术品收藏投资市场的半壁江山，无论古时与今日，无论王侯将相亦或商贾贵胄，莫不为得到一幅名家真迹而备感尊荣。"
        ],
        (Object)[
            "author"=>"点解5678",
            "comment_num"=>"500",
            "text"=>"大厅暖气不行"
        ]
    ];*/
    echo json_encode($bar);
?>
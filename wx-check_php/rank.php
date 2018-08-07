<?php
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

$bar=[];


$sql="SELECT img_pic, title, order_type,sell_num,price,identifier,list_info FROM commodities";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {//$row为一行的数据
     array_push($bar,(Object)[
        'img_pic'=>(json_decode($row["img_pic"])==null)?[$row["img_pic"]]:json_decode($row["img_pic"]),
        'title'=>$row["title"],
        'order_type'=> $row["order_type"],
        'sell_num'=>$row['sell_num'],
        'price'=>$row['price'],
        'identifier'=>$row['identifier']
      ]);
    }
} else {
    echo "0 结果";
}

mysqli_close($conn);
/*$bar = [
  (Object)[
    'img_pic'=>'http://463169.testyuming.top/img/guokuquan.png',
    'title'=>'恐龙小版',
    'order_type'=>'卖盘',
    'sell_num'=>'12枚',
    'price'=>'4.30/套',
    'identifier'=>'2017-11',
    "list_info"=>['《中国恐龙》特种邮票',
    '2017-11','-',
    '动物','2017-05-19',
    '0.00万','赵闯',
    '-','胶雕套印',
    '中国邮政','编年邮票',
    '郝欧，徐吉吉、李昊，刘明慧，刘博，杨志英','6',
    '6','北京邮票厂',
    'P13','有背胶']
  ],(Object)[
    "img_pic"=>"http://463169.testyuming.top/img/mazu.png",
    "title"=>"西游记二小版",
    "order_type"=>"卖盘",
    "sell_num"=>"有货",
    "price"=>"11.00/版",
    "identifier"=>"2017-7",
    "list_info"=>['《中国古典文学名著——<西游记>（二）》特种邮票',
    '2017-7','-',
    '人物，文学','2017-02-25',
    '0.00万','李云中',
    '-','影写版',
    '中国邮政','编年邮票',
    '-','4',
    '16','北京邮票厂',
    'P13* 13.5','有背胶']
  ],(Object)[
    "img_pic"=>"http://463169.testyuming.top/img/xiongmao.png",
    "title"=>"四轮狗小版",
    "order_type"=>"卖盘",
    "sell_num"=>"200",
    "price"=>"24.50/版",
    "identifier"=>"2018-1",
    "list_info"=>['《戊戌年》特种邮票',
    '2018-1','四轮狗',
    '生肖','2018-01-05',
    '-','周令钊',
    '周令钊','胶雕套印',
    '中国邮政','编年邮票',
    '原艺姗、刘明慧','2',
    '版式一 16枚、版式二 6枚','北京邮票厂',
    'P13','有背胶']
  ],(Object)[
    "img_pic"=>"http://463169.testyuming.top/img/hangtianchao.png",
    "title"=>"水果二小版",
    "order_type"=>"卖盘",
    "sell_num"=>"有货",
    "price"=>"6.50/版",
    "identifier"=>"2016-18",
    "list_info"=>['《水果（二）》特种邮票',
    '2016-18','水果二',
    '植物','2016-07-23',
    '0.00万','郭振山',
    '-','影写版',
    '中国邮政','编年邮票',
    '-','4',
    '版式一 20枚，版式二8枚（2套）','北京邮票厂',
    'P13.5* 13','有背胶']
  ],(Object)[
    "img_pic"=>"http://463169.testyuming.top/img/hongloumeng.png",
    "title"=>"迪士尼小版",
    "order_type"=>"买盘",
    "sell_num"=>"1",
    "price"=>"6.80/版",
    "identifier"=>"2016-14",
    "list_info"=>['《上海迪士尼》特种邮票',
    '2016-14','迪士尼',
    '文化艺术','2016-06-16',
    '3799.89万','马立航',
    '-','影写版',
    '中国邮政','编年邮票',
    '-','2',
    '16','北京邮票厂',
    'P13','有背胶']
  ],(Object)[
    "img_pic"=>"http://463169.testyuming.top/img/houpiao.png",
    "title"=>"父亲节套票",
    "order_type"=>"卖盘",
    "sell_num"=>"有货",
    "price"=>"1.7/套",
    "identifier"=>"2015-12",
    "list_info"=>['《感恩父亲》特种邮票',
    '2015-12','感恩父亲',
    '人物','2015-06-13',
    '1999.75万','张乐陆，张安朴',
    '-','胶印（加局部全息烫印工艺）',
    '中国邮政','编年邮票',
    '-','1',
    '16','北京邮票厂',
    'P13.5* 13','有背胶']
    ],(Object)[
    "img_pic"=>"http://463169.testyuming.top/img/gubajiefang.png",
    "title"=>"千里江山图小版",
    "order_type"=>"买盘",
    "sell_num"=>"20",
    "price"=>"10.80/套",
    "identifier"=>"2017-3",
    "list_info"=>['《千里江山图》特种邮票',
    '2017-3','千里江山图',
    '风光','2017-02-25',
    '0.00万','王虎鸣',
    '-','影写版',
    '中国邮政','编年邮票',
    '-','9',
    '9枚（1套）','北京邮票厂',
    'P13.5* 13','有背胶']
    ]
];*/

echo json_encode($bar);
?>
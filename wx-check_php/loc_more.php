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

    $index_list=[];
    $classify=$_GET['classify'];
    $pattern='/'.$classify.'/';

    $sql="SELECT title,author,answer_num,info,classify,id FROM loc_more";
    $result = mysqli_query($conn, $sql);
 
    if (mysqli_num_rows($result) > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            if(preg_match($pattern,$row["classify"])){
                array_push($index_list,(Object)[
                    'title'=>$row["title"],
                    'author'=>$row["author"],
                    'answer_num'=> $row["answer_num"],
                    'info'=>$row['info'],
                    'id'=>$row['id']
                ]);
            } 
        }
    } else {
        echo "0 结果";
    }
 
    mysqli_close($conn);
    /*$index_list=[
        (Object)[
            'title'=>'低价出售四轮狗赠版，中华孝道二，抗战，父亲节',
            'author'=>'朱志康',
            'answer_num'=>5,
            'info'=>'四轮狗赠版800版，9元,抗战小版131版，17元,父亲节小版377版，16元,单一品种一起走，款到发货，多网销售，以我确认为主。'
        ],
        (Object)[
            'title'=>'大邮政双轮驱动 邮资封片引吭高歌',
            'author'=>'刘洋',
            'answer_num'=>10,
            'info'=>'中国邮市是政策市。18普片33.6万发行量，上海中心大厦短期内资金强势入驻，上冲40元的上方，创造投资市场增值奇迹。徽煌和西邮托管以后，17和18的普封片暂时进入沉寂状态，但是现货市场的货源实在是少的可怜。封片版块是邮政刺激市场的试验田，是试金石，是邮政的形象工程。普封片减量到位，量价齐升，市场已经广泛认可，现在大邮政又在JPJF上大做文章，改革开放片128万，猿人87万，人民日报96万，制造热点是邮政的本事，调投资者胃口是邮政正在做的事情，邮市的运行有周期性，大邮政的双轮驱动，邮资封片的隐性暴利时代就要到来，筹码为王，一箱难求，历史会重演吗？'
        ],
        (Object)[
            'title'=>'要：灵猴献瑞，金鸡报晓，戌岁臻福。',
            'author'=>'廖有禄',
            'answer_num'=>32,
            'info'=>'灵猴献瑞340，金鸡报晓100元，戌岁臻福155元。同号需要5本。四轮狗大版10版，95元一版，小版10版，28元一版,老会员可先款，最好一起提供。卖家包品包邮。'
        ],
        (Object)[
            'title'=>'出售2018年习大大南海阅兵（军事封JS-9）5枚票全',
            'author'=>'赵小军',
            'answer_num'=>17,
            'info'=>'出售100套2018年习大大南海阅兵（军事封JS-9）5枚邮票全25一套。'
        ]
    ];*/
    echo json_encode($index_list);
?>
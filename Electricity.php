<?php
header('Content-Type:application/json');  //此声明非常重要
$room = htmlspecialchars($_GET["room"]);
$build = $room[0];   //楼栋
$build_10 =10-$build; //完美校园接口规则 10-楼栋数
// echo "楼栋为".$build."栋".$build_10;

$room = substr($room, 1); //删除首位楼栋号 得到数组后面宿舍号

$url = "http://h5cloud.17wanxiao.com:8080/CloudPayment/user/getRoomState.do?payProId=1038&schoolcode=987&businesstype=2&roomverify=99-".$build_10."--".$build."-".$room ;
// echo $room."<br>".$url;
if ($build == 9) {
    $louceng_9 =  8 + $room[0];
    $url = "http://h5cloud.17wanxiao.com:8080/CloudPayment/user/getRoomState.do?payProId=1038&schoolcode=987&businesstype=2&roomverify=99-1--".$louceng_9."-".$room ;
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);  
    //参数为1表示传输数据，为0表示直接输出显示。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //参数为0表示不带头文件，为1表示带头文件
    curl_setopt($ch, CURLOPT_HEADER,0);
    $output = curl_exec($ch); 
    echo $output;
    
}else{
    //请求完美校园接口
    // echo $url;
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);  
    //参数为1表示传输数据，为0表示直接输出显示。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //参数为0表示不带头文件，为1表示带头文件
    curl_setopt($ch, CURLOPT_HEADER,0);
    $output = curl_exec($ch); 
    echo $output;
}
?>

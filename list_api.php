<?php
if(isset($_GET['max'])){
    include ("connect.php");
    $count_sql = "select count(*) from found";
    $res=mysqli_query($conn,$count_sql);
    $row=mysqli_fetch_array($res)[0];
    echo "{\"max\":$row}";
} else if(isset($_GET['len']) and isset($_GET['page'])){
    $page_len = $_GET['len'];
    $page = $_GET['page'];
    if(filter_var($page_len,FILTER_VALIDATE_INT)){
        if( filter_var($page,FILTER_VALIDATE_INT) or $page==0 ){
            include ("connect.php");
            $data=array();
            $down = $page_len*$page;
            $up = $page_len*$page+$page_len;
            $sql = "select name,id,date,school from found order by date desc limit $down,$up";
            $res = $conn->query($sql);
            class found_card{
                public $name;
                public $id;
                public $date;
                public $school;
            }
            while ( $row = $res->fetch_object()){
                $card = new found_card();
                $card->name = $row->name;
                $card->id = $row->id;
                $card->date = $row->date;
                $card->school = $row->school;
                array_push($data,$card);
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
    }

} else {
    echo "ERROR NO ARGV";
}
?>
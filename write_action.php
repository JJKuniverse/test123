<?php
$connect = mysqli_connect("127.0.0.1", "root", "!as123123", "db_board") or die("fail");

$id = $_POST['name'];                   //Writer
$title = $_POST['title'];               //Title
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "upload/".$filename;
move_uploaded_file($tmpfile,$folder);

$URL = './index.php';                   //return URL


$query = "INSERT INTO board (number, title, content, date, hit, id, file) 
        values(null,'$title', '$content', '$date', 0, '$id', '$o_name')";


$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

mysqli_close($connect);
?>
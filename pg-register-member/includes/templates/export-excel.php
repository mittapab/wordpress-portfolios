<?php
function exportExcel(){ 
if(isset($_GET['exp'])){

header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="myexcel.xls"');
header("Content-Type: application/force-download"); 
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); 
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("myexcel.xls"));   

@readfile($filename);  
?>


<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<table>
  <tr>
    <td>ลำดับ</td>
    <td>ชื่อ</td>
    <td>อีเมล</td>
    <td>เบอร์โทร</td>
  </tr>
  <tr>
  	<td>1</td>
    <td>วิทูลย์ โพมิผล</td>
    <td>codebee2014@gmail.com</td>
    <td>085 900 3405</td>
  </tr>
  <tr>
  	<td>2</td>
    <td>เยาวภา โอภาษี</td>
    <td>codebee2015@gmail.com</td>
    <td>085 605 7748</td>
  </tr>
</table>
</body>
</html>

<?php } ?>
<a class="btn btn-info" href="?page=mrgt-report&exp=1">Export Excel</a>
<?php } ?>
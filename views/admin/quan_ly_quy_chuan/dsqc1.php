<?php
include('../../model/database.class.php');
include('../../model/class.qcvn_cap1.php');
$qcvn1 = new qcvnc1();

$dsqcvn1 = $qcvn1->layQuyChuan1();

if(isset($_POST['submit1'])){
  $box=$_POST['num'];
  while (list($key, $val) = @each($box)){
    $ketqua = $qcvn1 ->xoaQuyChuan1($val);
  }
  ?>
  <script type="text/javascript">
    window.location.href = window.location.href;
  </script>
  <?php
}

if (isset($_SESSION['sua']) && $_SESSION['sua'] == 'done'){
    echo '<div class="alert alert-success"> Cập nhật thành công!!!</div>';
    $_SESSION['sua'] = "";
}
?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td {
    border: 1px solid #bbbbbb;
    text-align: left;
    padding: 8px;
}

th {
    text-align:center;
	background-color:#003366;
	padding: 8px;
	color:white;
		
}
tr:nth-child(even) {
    background-color: #eeeeee;
}
</style>

<h2><strong>Quản lý quy chuẩn</strong></h2>        
<form name="form1" action="" method="POST">
<div style="width:600px; height:120px;margin: 15px 10px 10px 10px;"> 
  <label> Ten Nganh: </label>  
  <input type="text" name="TenNganh" value="" style="width:480px; height:24px;margin-bottom:5px;">
  <br>
  <input type="submit" name="submit1" value=" Xoa"  style="width:80px;height:24px; float:right; margin-left:2px;"/>
  <input type="button" value= " Thêm mới" style="width:80px;height:24px; float:right;margin-left:2px;" onclick="them()">
</div>

<div style="width:740px; min-height:580px; border-style:groove; border-width:thin;margin-left:10px; margin-top: -50px;"> 
<table>
  <tr>
    <th width="30">STT</th>
    <th width="500">Ten Nganh</th>
    <th width="70">Cap</th>
    <th width="20">Sửa</th>
    <th width="20">Chọn</th>
  </tr>
    
    <?php
      $stt = 1;
      foreach ($dsqcvn1 as $ds) { 
      ?>
          <tr>
            <td style="text-align:center;"><?=$stt++?></td>
            <td style="text-align: center;"><?=$ds['TenNganh']?></td>
            <td style="text-align: center;"><?=$ds['cap']?></td>
            <td style="text-align: center;"><i class="fa fa-pencil fa-fw"></i> <a href="?p=edit1&id-qcvn=<?=$ds['idc1']?>">Edit</a></td>
            <td style="text-align: center;">
              <input type="checkbox"  name='num[]' class="other" value='<?=$ds['idc1']?>' ></td>
          </tr>
      <?php
      }
      
    ?>
</table>
</div>
</form>
<div class="kc"></div>
<div style="margin-top: 50px;"></div>

<script language="javascript">
function them() {
    window.location.assign("?p=them-nganh")
}
</script>
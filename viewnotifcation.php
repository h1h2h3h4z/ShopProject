<?php
include("connect.php");
session_start();
$id=$_SESSION['user_id'];
$select=mysqli_query($conn,"SELECT * FROM buy join products on buy.productid= products.product_id where userrecieverid=$id order by date DESC");
$table="<div class='veiwnoti'>";
$current_datetime = strtotime(date('Y-m-d H:i:s') . '-5 minutes +1 hours');
$current_datetime = date('Y-m-d H:i:s', $current_datetime);
while ($row=mysqli_fetch_assoc($select)){
    if($row['date']>$current_datetime){
$table.="<a href='vieworderdetail.html?buyid={$row['buyid']}'><div class='buyerinfo'>
<div class='imginfop'>
<img src='{$row['productphoto']}'>
</div>
<div class='split'>
<div class='buyern'>
<h3>

{$row['buyername']} buy a order click to view details</h3>
</div>
<div class='date'>
<h6>
{$row['date']}</h6></div>
</div>
</div>
</a>
";
    }
    else{
        $table.="<a href='vieworderdetail.html?buyid={$row['buyid']}'><div class='buyerinfo2'>
<div class='imginfop2'>
<img src='{$row['productphoto']}'>
</div>
<div class='split2'>
<div class='buyern2'>
<h3>

{$row['buyername']} buy a order click to view details</h3>
</div>
<div class='date2'>
<h6>
{$row['date']}</h6></div>
</div>
</div>
</a>
";
    }
}
echo $table;


?>
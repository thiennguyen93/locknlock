<?php 
    if ($_GET['action'] == 'categoryAction') {
        echo '<p class="mb-td">';
        echo $data['categoryName'];
        echo '</p>';
    } 
    else
    {
        echo '<p class="mb-td">Sản phẩm Mới nhất</p>';
    }

?>



<div class="product">
<?php 
if ($data['data']) {

?>
    <?php 
    foreach ($data['data'] as $key => $value) { ?>
    <div class="m-product">
    <a href="<?php echo 'index.php?controller=product&action=detailAction&id='.$value['id'] ?>">
    <img src="<?=$value['hinh']?>">
    </a>
        <p><?=$value['ten']?></p>
        <p class="price"><?=number_format($value['gia'],'0', ',', '.')?> đ</p>
       
        <img src="./images/sao.png">
        <br>
        <img src="./images/mua.png">
    </div>
    <?php } ?>
    <?php if (@$data['totalPage'] >1 ) { 
    for($i = 1; $i <= @$data['totalPage']; $i++) { ?>
    <a href="index.php?page=<?=$i?>&sl=2">Page <?=$i?></a>
    <?php } }?>

<?php
} else {
    echo "<h1>Không có sản phẩm nào hết!</h1>";
}
?>

</div>


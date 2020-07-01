<?php 
include './model/danhmuc.php';
$danhmuc = new danhmuc();
$danhmuc1 = $danhmuc->getDanhmuc1();
$dm = $danhmuc->getDanhmuc();
$array = array();
foreach ($dm as $key => $value) {
    $array[$value['id1']]['tendm1'] = $value['tendm1'];
    if ($value['id2'] != null) {
        $array[$value['id1']]['danhmuc2'][$value['id2']]['tendm2'] = $value['tendm2'];
    }
}

?>
<div class="m-left">
    <div class="ml-top">
        <p>Danh Mục Sản Phẩm</p>
    </div> 
    <div class="ml-bottom">
        <ul>
            <?php foreach ($array as $id1 => $danhmuc1) { ?>
            <li>
                <a href = 'index.php?controller=category&action=categoryAction&category1=<?=$id1?>'><?=$danhmuc1['tendm1']?></a>
                <?php if (@count(@$danhmuc1['danhmuc2']) > 0) { ?>
                <ul>
                    <?php foreach ($danhmuc1['danhmuc2'] as $id2 => $danhmuc2) { ?>
                    <li>
                    <a href = 'index.php?controller=category&action=categoryAction&category1=<?=$id1?>&category2=<?=$id2?>'><?=$danhmuc2['tendm2']?></a>
                    </li>
                    <?php }?>
                </ul>
                <?php }?>
            </li>
            <?php }?>
        </ul>
    </div>
</div>
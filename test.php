<?php
$array1 = array(
 array("id" => 1, "parentId" => null, "name" => "Danh mục 1"),
 array("id" => 2, "parentId" => null, "name" => "Danh mục 2"),
 array("id" => 3, "parentId" => null, "name" => "Danh mục 3"),
 array("id" => 4, "parentId" => 2, "name" => "Danh mục 4"),
 array("id" => 5, "parentId" => 12, "name" => "Danh mục 5"),
 array("id" => 6, "parentId" => 4, "name" => "Danh mục 6"),
 array("id" => 7, "parentId" => 3, "name" => "Danh mục 7"),
 array("id" => 8, "parentId" => null, "name" => "Danh mục 8"),
 array("id" => 9, "parentId" => 10, "name" => "Danh mục 9"),
 array("id" => 10, "parentId" => 8, "name" => "Danh mục 10"),
 array("id" => 11, "parentId" => null, "name" => "Danh mục 11"),
 array("id" => 12, "parentId" => null, "name" => "Danh mục 12"),
 array("id" => 13, "parentId" => null, "name" => "Danh mục 13"),
 array("id" => 14, "parentId" => 9, "name" => "Danh mục 14")
);
echo "<pre>";
$array2 = array(
 array("id" => 1, "parentId" => null, "name" => "Danh mục 1", "depth" => 0),
 array("id" => 2, "parentId" => null, "name" => "Danh mục 2", "depth" => 0),
 array("id" => 4, "parentId" => 2, "name" => "----Danh mục 4", "depth" => 1),
 array("id" => 6, "parentId" => 4, "name" => "--------Danh mục 6", "depth" => 2),
 array("id" => 3, "parentId" => null, "name" => "Danh mục 3", "depth" => 0),
 array("id" => 7, "parentId" => 3, "name" => "----Danh mục 7", "depth" => 1),
 array("id" => 8, "parentId" => null, "name" => "Danh mục 8", "depth" => 0),
 array("id" => 10, "parentId" => 8, "name" => "----Danh mục 10", "depth" => 1),
 array("id" => 9, "parentId" => 10, "name" => "--------Danh mục 9", "depth" => 2),
 array("id" => 14, "parentId" => 9, "name" => "------------Danh mục 14", "depth" => 3),
 array("id" => 11, "parentId" => null, "name" => "Danh mục 11", "depth" => 0),
 array("id" => 12, "parentId" => null, "name" => "Danh mục 12", "depth" => 0),
 array("id" => 5, "parentId" => 12, "name" => "----Danh mục 5", "depth" => 1),
 array("id" => 13, "parentId" => null, "name" => "Danh mục 13", "depth" => 0)
);
echo "</pre>";
function getChild($cat, $categoryList, &$array3, &$deep)
{
 $deep++;
 $array3[] = $cat;
 $childCat = array_filter($categoryList, function ($item) use ($cat) {
 return $item['parentId'] == $cat['id'];
 });
 if (count($childCat) > 0) {
 foreach ($childCat as $key => $value) {
 getChild($value, $categoryList, $array3, $deep);
 }
 }
 
}
$deep = 0;
$array3 = [];
getChild(array("id" => 8, "parentId" => null, "name" => "Danh mục 2", "depth" => 0), $array1, $array3, $deep);
 
var_dump($array3);
var_dump($deep);
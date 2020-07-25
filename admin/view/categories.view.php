<div class="container-fluid">
    <h4 class="page-title">Quản lý danh mục</h4>
    <?php
        // var_dump($data['allCategories']);
        function getChild($cat, $categoryList, &$array3, &$dept)
        {
            $cat['dept'] = $dept;
            $array3[] = $cat;
            $childCat = array_filter($categoryList, function ($item) use ($cat) {
                return $item['parentId'] == $cat['id'];
            });
            if (count($childCat) > 0) {
                $dept++;
                foreach ($childCat as $key => $value) {
                getChild($value, $categoryList, $array3, $dept);
                }   
            } else {
                $dept=1;
            }
        }

        $allParentNode = array_filter($data['allCategories'], function ($item) {
            return $item['parentId'] == null;
        });

        // var_dump($allParentNode);
        $resultArray = [];
        foreach ($allParentNode as $key => $value) {
            $dept = 0;
            getChild($value, $data['allCategories'], $resultArray, $dept);
            
        }

        //Tạo ra danh sách các danh mục       

    ?>
    <div class="card">
        <!-- <div class="card-header">
            <div class="card-title">Danh mục</div>
        </div> -->
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultArray as $key => $value) { ?>
                    <tr>
                        <td>
                        <?=str_repeat('─', $value['dept']); ?>
                        <?=' ' . $value['dept']==0?'<strong>'.$value['name'].'</strong>':$value['name']?>
                        </td>
                        <td><?=$value['description']?></td>
                        <td>
                        <a class="btn btn-success text-white btn-sm"><i class="la la-edit"></i> Thay đổi</a>
                        <a class="btn btn-danger text-white btn-sm"><i class="la la-trash"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
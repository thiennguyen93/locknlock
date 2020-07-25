<div class="container-fluid">
    <h4 class="page-title">Tables</h4>
    <?php
        // var_dump($data['allCategories']);
        $cat = [];
        $depth = 0;
        $finalArr = [];
        function toSelect ($arr, $init=0, $depth=0) {   
            $parent =  $arr[$init];
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i]['parentId'] == $parent['id']) {
                    echo '--';
                    toSelect($arr, $i, $depth++);
                }
            }
        }


       toSelect($data['allCategories']);


    ?>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Hoverable Table</div>
        </div>
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
                    <tr>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td><a class="btn btn-success text-white"><i class="la la-edit"></i> Thay đổi</a></td>
                    </tr>
                    <tr>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<nav>
    <ul class="menu">
        <li><a href="">Trang chủ</a></li>
        <li><a>Giới thiệu</a></li>
        <li><a>Dịch vụ</a></li>
        <li>
            <a>Sản phẩm</a>
            <ul>
                <li><a>Áo Len</a></li>
                <li><a>Đầm Bầu</a></li>
            </ul>
        </li>
        <li><a href="index.php?controller=contact">Liên hệ</a></li>
        <li>
            <input id="search" type="text" placeholder="Tim kiem" onkeypress="search(event)">
        </li>
    </ul>
</nav>
<script>
function search(event) {
    if (event.code == 'Enter')
    {
        let search = $('#search').val();
        window.location.href = `index.php?action=SearchAction&keyword=${search}`
    }
}
</script>
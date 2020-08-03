<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<!-- <script src="assets/js/demo.js"></script> -->

<!-- Xử lý modal -->

<script>
    $('#modalUpdate').on('show.bs.modal', function (event) {
        
  var button = $(event.relatedTarget) // Button that triggered the modal
  var itemJson = atob(button.data('item')) // Extract info from data-* attributes
  var item = JSON.parse(itemJson);
  var action = button.data('action');
  var title = '' //Tiêu đề của modal
  var message ='' //Nội dung của modal
  var confirm_link = ''; //Nội dung button confirm thẻ a
  var returnLink = button.data('return');

  switch (action) {
      case 'delete_product':
          title = 'Xác nhận xóa sản phẩm'
          message = `Ban có chắc chắn muốn xóa sản phẩm này?<br><strong>${item.name}</strong>`
          confirm_link = `?action=delete&id=${item.id}&return=${returnLink}`
          break;
      case 'delete_post':
          title = 'Xác nhận xóa bài viết'
          message = `Ban có chắc chắn muốn xóa bài viết này?<br><strong>${item.title}</strong>`
          confirm_link = `?action=delete&id=${item.id}&return=${returnLink}`
          break;
      default:
          break;
  }


  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(title)
  modal.find('.modal-body p').html(message)
  modal.find('.modal-footer #btn_confirm').attr('href',confirm_link);
})
</script>
<p class="mb-td">Lien he</p>
<div class="lienhe">
    <form action="index.php?controller=contact&action=saveAction" method="POST">
        <p>Email:</p>
        <input id="email" type="text" name="email">
        <p>Ten:</p>
        <input id="ten" type="text" name="ten">
        <p>Noi Dung:</p>
        <textarea id="noidung" name="noidung" rows="10" cols="50"></textarea>
        <br/>
        <input type="submit" value="GOI">
        <input type="button" value="GOI AJAX" onclick="sendContact()">
        <input type="button" value="Chen Video" onclick="video()">
    </form>
</div>
<script> 
function sendContact() {
    let email = $('#email').val();
    let ten = $('#ten').val();
    let noidung = $('#noidung').val();
    $.ajax({
        url: 'ajax.php?controller=contact&action=saveAjaxAction',
        method: 'post',
        data: { email: email, ten: ten, noidung: noidung },
        success: function(data) {
            alert('goi thanh cong');
            $('.lienhe').append(data)
        }
    })
}

function video() {
    $.ajax({
        url: 'ajax.php?controller=contact&action=ajaxAction',
        method: 'get',
        success: function(data) {
            $('.footer').html(data)
        }
    })
}
</script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
<script>
 $("#fileUpload").on('change', function () {

//Get count of selected files
var countFiles = $(this)[0].files.length;

var imgPath = $(this)[0].value;
var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
var image_holder = $("#image-holder");
image_holder.empty();
this.setCustomValidity('');
if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
    if (typeof (FileReader) != "undefined") {

        //loop for each file selected for uploaded.
        for (var i = 0; i < countFiles; i++) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $("<img />", {
                    "src": e.target.result,
                        "class": "thumb-image"
                }).appendTo(image_holder);
            }
            image_holder.show();
            reader.readAsDataURL($(this)[0].files[i]);
        }
    } else {
        showNotif('bottom', 'right', 'infor', 'withicon', 'Trình duyệt không hỗ trợ', 'Tính năng xem trước ảnh không hỗ trợ', 'la la-exclamation-triangle');
    }
} else {
    this.setCustomValidity('Vui lòng chọn định dạng ảnh phù hợp');
    showNotif('bottom', 'right', 'warning', 'withicon', 'Vui lòng chọn ảnh phù hợp', 'Hỗ trợ *.jpg, *.png, *.gif', 'la la-exclamation-triangle');
}
});
</script>

<script>
	function showNotif(placementFrom,placementAlign, state, style,title, message, icon) {
		var placementFrom = placementFrom;
		var placementAlign = placementAlign;
		var state = state;
		var style = style;
		var content = {};
		content.message = message;
		content.title = title;
		if (style == "withicon") {
			content.icon = icon;
		} else {
			content.icon = 'none';
		}
		content.url = '#';
		content.target = '_blank';

		$.notify(content,{
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 500,
		});
	};
</script>
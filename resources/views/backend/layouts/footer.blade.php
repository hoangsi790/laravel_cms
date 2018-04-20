<footer></footer>
    <!-- footer --> 
</div>
<!-- end primary content --> 
<script src="{{url('/')}}/backend/js/jquery.min.js"></script>
<script src="{{url('/')}}/backend/js/bootstrap.min.js"></script> 
<script src="{{url('/')}}/backend/js/scripts.js"></script> 
<script src="{{url('/')}}/plugins/ckeditor/ckeditor.js"></script>
<script>
$(document).ready(function(){
    $('#del_thumbnail').click(function(){
        $('#output_avatar').attr('src', "{{url('/')}}/backend/images/thumbnail.jpg");
        $('#thumbnail').val('');
    });

    $('#title').focus();
});
</script>
<script>
CKEDITOR.replace( 'content', {
filebrowserBrowseUrl : '{{url("/")}}/plugins/ckfinder/ckfinder.html', filebrowserImageBrowseUrl : '{{url("/")}}/plugins/ckfinder/ckfinder.html?type=Images', filebrowserFlashBrowseUrl : '{{url("/")}}/plugins/ckfinder/ckfinder.html?type=Flash', filebrowserUploadUrl : '{{url("/")}}/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files', filebrowserImageUploadUrl : '{{url("/")}}/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images', filebrowserFlashUploadUrl : '{{url("/")}}/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash', height : 400, language: 'vi', font : 'quicksand' });
</script>
<!-- end script -->
</body>
</html>
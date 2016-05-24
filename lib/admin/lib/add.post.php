<div class="container-fluid">
	<div class="row">
	<form method="post">
		<div class="col-md-8">
		<div class="form-group">
		  <label style="color:white" for="usr">Title:</label>
		  <input id="tajtl" type="text" name="title" class="form-control" id="usr">
		</div>
		<textarea name="text" id="summernote"></textarea>
		  <script>
		$(document).ready(function() {
			$('#summernote').summernote({
			height: 300,                 // set editor height
			onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
			});
			var txt = $("#summernote").val();
			var titl = $("#tajtl").val();
			//request with URL,data,success callback
			function posted(){
			$.post("/index.php?query=admin&add.post",
				{title:titl,text:txt},
				function(data, textStatus, jqXHR)
				{
		
				});
			}
			function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
			console.log("e"+data)
            $.ajax({
                data: data,
                type: "POST",
                url: "/index.php?query=admin&add.post&image_on_post=true",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    editor.insertImage(welEditable, url);
                }
            });
        } 
		});
		  </script>
  
		</div>
		<div class="col-md-4">
			<label style="color:white;"class="control-label">Select Image</label>
			<input id="input-4" name="input4[]" type="file" multiple class="file-loading">
			<script>
			$(document).on('ready', function() {
				$("#input-4").fileinput({showCaption: false});
			});
			</script>
			<button onclick="posted();" type="submit" class="btn btn-success btn-default">
				Default
			</button>
		</div>
	</form>
	</div>
</div>
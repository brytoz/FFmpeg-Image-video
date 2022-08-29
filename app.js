

var theButton = document.querySelector('#file');
const butClick = document.querySelector('#butClick');


function activeFile() {

	theButton.click();

}


$(function(){
	$('#file').on('change', function(){
		var file = this.files[0];
		var reader = new FileReader();
		reader.onload = viewer.load;
		reader.readAsDataURL(file);
		viewer.setProperties(file);

		/*return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];

		var extension = file.value.split('.')[1];

        if (extension != 'png' || 'PNG' || 'JPG' || 'JPEG' || 'jpeg' || 'jpg') {

            document.querySelector('video').style.display = 'none';

        }*/
	});

	var viewer = {
		load : function(e){
			$('#preview').attr('src', e.target.result);
		},
		setProperties : function(file){
			$('#filename').text(file.name);
			$('#fileType').text(file.type);
			$('#fileSize').text(Math.round(file.size/1024));
		},

	}
	
});

	


/*
    function getFile(filePath) {
        return filePath.substr(filePath.lastIndexOf('\\') + 1).split('.')[0];
    }

    function getExtension() {
        var extension = file.value.split('.')[1];

        if (extension != 'png' || 'PNG' || 'JPG' || 'JPEG' || 'jpeg' || 'jpg') {

            document.querySelector('video').style.display = 'none';

        }

    }
 */
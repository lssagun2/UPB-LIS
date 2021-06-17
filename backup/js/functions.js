var directory = "";

$(document).ready(function(){
	$(document).on('click', '.backup', function(){
		$("form.modal-content").trigger("reset");
		$('div#backup-modal').show();
		directory = $(this).data('directory');
	});
	$(document).on('click', 'button#create-backup', function(){
		createBackup(directory);
	});
});

function downloadBackup(directory, file, filename){
	var url = directory + 'files/client/' + file;
	console.log(url);
    $.ajax({
        url: url,
        cache: false,
        xhr: function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 2) {
                    if (xhr.status == 200) {
                        xhr.responseType = "blob";
                    } else {
                        xhr.responseType = "text";
                    }
                }
            };
            return xhr;
        },
        success: function (data) {
            //Convert the Byte Data to BLOB object.
            var blob = new Blob([data], { type: "application/octetstream" });
            console.log(!!document.documentMode);

            //Check the Browser type and download the File.
            var isIE = false || !!document.documentMode;
            if (isIE) {
                window.navigator.msSaveBlob(blob, file);
            }
            else {
                var url = window.URL || window.webkitURL;
                link = url.createObjectURL(blob);
                var a = $("<a />");
                a.attr("download", filename);
                a.attr("href", link);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);
            }
            $('div#loading-cover').hide();
            $('div#backup-modal').hide();
            $('div#backup-success').show();
        }
    });
}

//function that creates a file for the backup
function createBackup(directory){
	$('div#loading-cover').show();
	$.ajax({
		type		: 'POST',
		url			: directory + 'functions/create.php',
		data		: $('form#backup-form').serialize(),
		dataType	: 'json'
	})
	.done(function(data){
		if($('#backup-type').val() == 'client'){
			console.log(data);
			downloadBackup(directory, data.file, data.filename);
		}
		else{
			$('div#loading-cover').hide();
			$('div#backup-modal').hide();
			$('div#backup-success').show();
		}
	})
	.fail(function(data){
		console.log('AJAX call failed');
	});
}


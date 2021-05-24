function downloadFile(file, filename) {
    var url = '../tables/' + file;
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
            } else {
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
        }
    });
};
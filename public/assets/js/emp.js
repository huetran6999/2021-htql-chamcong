$(document).ready(function () {
    "use strict";

    $("#u_avatar").change(function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#imagePreview");
            dvPreview.html("");
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $("<img />");
                    img.attr("style", "width: 15rem; padding: 0.5rem; margin-top: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });

    $("#add-ent").change(function (e) {
        e.preventDefault();
        let entId = $(this).val();
        let entUrl = '/dep';
        let token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: entUrl,
            type: 'post',
            data: {
                '_token': token,
                'entId': entId,
            },
            success: function (data) {
                console.log(data);
                $("#add-dep").html(data);
            }
        });
    })
});
$(document).ready(function() {
    "use strict";

    $("#u_avatar").change(function() {
        if (typeof(FileReader) != "undefined") {
            var dvPreview = $("#imagePreview");
            dvPreview.html("");
            $($(this)[0].files).each(function() {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function(e) {
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

    $("#add-ent").change(function(e) {
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
            success: function(data) {
                console.log(data);
                $("#add-dep").html(data);
            }
        });
    });

    $('#search').on('keyup', function(e) {
        e.preventDefault();
        $.ajaxSetup({ headers: { 'csrftoken': '{{ csrf_token() }}' } });
        let value = $(this).val();
        let url = 'employee-management/search';
        $.ajax({
            type: 'get',
            url: url,
            data: {
                'search': value
            },
            success: function(data) {
                $('tbody').html(data);
            }
        });
    });

    $('#w_type').on('change', function() {

        if (this.value == "1") {
            $('#start_date').show();
            $('#end_date').show();

        } else if (this.value == "2") {
            $('#start_date').show();
            $('#end_date').show();
        } else if (this.value == "3") {
            $('#start_date').show();
            $('#end_date').hide();
        } else {
            $('#start_date').hide();
            $('#end_date').hide();
        }

    });

});
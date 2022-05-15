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

    $("#add_ent").change(function(e) {
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
                $("#add_dep").html(data);
            }
        });
    });

    $("#add_dep").change(function(e) {
        e.preventDefault();
        let depId = $(this).val();
        let depUrl = '/pos';
        let token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: depUrl,
            type: 'post',
            data: {
                '_token': token,
                'depId': depId,
            },
            success: function(data) {
                console.log(data);
                $("#p_name").html(data);
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

function validateuser() {

    var u_name = document.myform.u_name.value;
    var genderSelection = document.myform.genderSelection.value;
    var u_dob = document.myform.u_dob.value;
    var u_pob = document.myform.u_pob.value;
    var u_IDcode = document.myform.u_IDcode.value;
    var u_IDcodedate = document.myform.u_IDcodedate.value;
    var u_IDcodeplace = document.myform.u_IDcodeplace.value;
    var u_nationality = document.myform.u_nationality.value;
    var u_ethnic = document.myform.u_ethnic.value;
    var u_religion = document.myform.u_religion.value;
    var u_phone = document.myform.u_phone.value;
    var u_email = document.myform.u_email.value;
    var re_name = document.myform.re_name.value;
    var regenderSelection = document.myform.regenderSelection.value;
    var reshipSelection = document.myform.reshipSelection.value;
    var re_phone = document.myform.re_phone.value;
    var u_household = document.myform.u_household.value;
    var u_address = document.myform.u_address.value;
    var re_address = document.myform.re_address.value;
    var lnameSelection = document.myform.lnameSelection.value;
    var l_major = document.myform.l_major.value;
    var lgradingSelection = document.myform.lgradingSelection.value;
    var l_graduation_school = document.myform.l_graduation_school.value;
    var fnameSelection = document.myform.fnameSelection.value;
    var l_graduation_year = document.myform.l_graduation_year.value;
    var add_ent = document.myform.add_ent.value;
    var add_dep = document.myform.add_dep.value;
    var p_name = document.myform.p_name.value;
    var username = document.myform.username.value;
    var password = document.myform.password.value;
    var u_checkindate = document.myform.u_checkindate.value;
    var ustatusSelected = document.myform.ustatusSelected.value;
    var status = true;
    if (u_name.length < 1) {
        document.getElementById("u_namev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập họ tên</i>";
        status = false;
    } else {
        document.getElementById("u_namev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (genderSelection.length < 1) {
        document.getElementById("genderSelectionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập ngày sinh</i>";
        status = false;
    } else {
        document.getElementById("genderSelectionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_dob.length < 1) {
        document.getElementById("u_dobv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn dân tộc</i>";
        status = false;
    } else {
        document.getElementById("u_dobv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_pob.length < 1) {
        document.getElementById("u_pobv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tôn giáo</i>";
        status = false;
    } else {
        document.getElementById("u_pobv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_IDcode.length < 1) {
        document.getElementById("u_IDcodev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập số cmnd</i>";
        status = false;
    } else {
        document.getElementById("u_IDcodev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_IDcodedate.length < 1) {
        document.getElementById("u_IDcodedatev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập ngày cấp cmnd</i>";
        status = false;
    } else {
        document.getElementById("u_IDcodedatev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_IDcodeplace.length < 1) {
        document.getElementById("u_IDcodeplacev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập nơi cấp cmnd</i>";
        status = false;
    } else {
        document.getElementById("u_IDcodeplacev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_nationality.length < 1) {
        document.getElementById("u_nationalityv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập sđt cá nhân</i>";
        status = false;
    } else {
        document.getElementById("u_nationalityv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_ethnic.length < 1) {
        document.getElementById("u_ethnicv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập sđt nhà</i>";
        status = false;
    } else {
        document.getElementById("u_ethnicv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_religion.length < 1) {
        document.getElementById("u_religionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập email cá nhân</i>";
        status = false;
    } else {
        document.getElementById("u_religionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_phone.length < 1) {
        document.getElementById("u_phonev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập địa chỉ thường trú</i>";
        status = false;
    } else {
        document.getElementById("u_phonev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_email.length < 1) {
        document.getElementById("u_emailv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn tỉnh thường trú</i>";
        status = false;
    } else {
        document.getElementById("u_emailv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (re_name.length < 1) {
        document.getElementById("re_namev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập chuyên ngành</i>";
        status = false;
    } else {
        document.getElementById("re_namev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (regenderSelection.length < 1) {
        document.getElementById("regenderSelectionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập địa chỉ tạm trú</i>";
        status = false;
    } else {
        document.getElementById("regenderSelectionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (reshipSelection.length < 1) {
        document.getElementById("reshipSelectionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn tỉnh tạm trú</i>";
        status = false;
    } else {
        document.getElementById("reshipSelectionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (re_phone.length < 1) {
        document.getElementById("re_phonev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng mức trình độ</i>";
        status = false;
    } else {
        document.getElementById("re_phonev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_household.length < 1) {
        document.getElementById("u_householdv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập nơi đào tạo</i>";
        status = false;
    } else {
        document.getElementById("u_householdv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_address.length < 1) {
        document.getElementById("u_addressv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn xếp loại</i>";
        status = false;
    } else {
        document.getElementById("u_addressv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (re_address.length < 1) {
        document.getElementById("re_addressv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập năm tốt nghiệp</i>";
        status = false;
    } else {
        document.getElementById("re_addressv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (lnameSelection.length < 1) {
        document.getElementById("lnameSelectionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU'  style='width:14px;height:14px;'/> <i>Vui lòng nhập ngành đào tạo</i>";
        status = false;
    } else {
        document.getElementById("lnameSelectionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (l_major.length < 1) {
        document.getElementById("l_majorv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn phòng ban</i>";
        status = false;
    } else {
        document.getElementById("l_majorv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (lgradingSelection.length < 1) {
        document.getElementById("lgradingSelectionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng chọn chức vụ</i>";
        status = false;
    } else {
        document.getElementById("lgradingSelectionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (l_graduation_school.length < 1) {
        document.getElementById("l_graduation_schoolv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("l_graduation_schoolv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (fnameSelection.length < 1) {
        document.getElementById("fnameSelectionv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("fnameSelectionv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (l_graduation_year.length < 1) {
        document.getElementById("l_graduation_yearv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("l_graduation_yearv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (add_ent.length < 1) {
        document.getElementById("add_entv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("add_entv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (add_dep.length < 1) {
        document.getElementById("add_depv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("add_depv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (p_name.length < 1) {
        document.getElementById("p_namev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("p_namev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (username.length < 1) {
        document.getElementById("usernamev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("usernamev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (password.length < 1) {
        document.getElementById("passwordv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("passwordv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (u_checkindate.length < 1) {
        document.getElementById("u_checkindatev").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("u_checkindatev").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }
    if (ustatusSelected.length < 1) {
        document.getElementById("ustatusSelectedv").innerHTML =
            " <img src='https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRovzTHcemSSBnpK3cjYqVSGWCJnvdAM6CjQQ&usqp=CAU' style='width:14px;height:14px;'/><i> Vui lòng nhập tên nick name</i>";
        status = false;
    } else {
        document.getElementById("ustatusSelectedv").innerHTML =
            " <img src='https://www.kindpng.com/picc/m/80-807690_check-mark-well-icon-internet-circle-good-correct.png' style='width:14px;height:14px;'/><i>Hợp lệ</i>";

    }


    if (status == false) {
        alert('Thông tin bạn nhập vào bị thiếu hoặc bị sai, vui lòng kiểm tra lại!!');
    }

    return status;
}
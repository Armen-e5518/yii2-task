$(document).ready(function () {


    $('#categories').change(function () {
        var ob = $(this);
        var data = {};
        data.id = ob.val();
        $.ajax({
            type: "POST",
            url: "/ajax/get-sub-categories", //actionGetSubCategories
            data: data,
            success: function (res) {
                $('#sub_categories').html('<option value="">--</option>');
                $('#sub_sub_categories').html('<option value="">--</option>');
                if (res) {
                    $.each(res, function (index, value) {
                        $('#sub_categories').append('<option value="' + index + '">' + value + '</option>')
                    });
                }
            }
        });
    })
    $('#sub_categories').change(function () {
        var ob = $(this);
        var data = {};
        data.id = ob.val();
        $.ajax({
            type: "POST",
            url: "/ajax/get-sub-sub-categories", //actionGetCommunity
            data: data,
            success: function (res) {
                $('#sub_sub_categories').html('<option value="">--</option>');
                if (res) {
                    $.each(res, function (index, value) {
                        $('#sub_sub_categories').append('<option value="' + index + '">' + value + '</option>')
                    });
                }
            }
        });
    })
})
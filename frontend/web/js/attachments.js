$(document).ready(function () {

    $('#add_new_video').click(function () {
        Attachments.AddVideoHtml();
    });

    $(document).on('click', '#videos .delete', function () {
        $(this).closest('.item').remove();
    });

// Images  ----------------

    $('#add_new_image').click(function () {
        Attachments.AddImageHtml();
    });

    $(document).on('click', '#images .delete', function () {
        $(this).closest('.item').remove();
    })

});


var Attachments = {
    MaxCountAttachments: 9,

    message: 'You should be only have a maximum of ' + this.MaxCountAttachments + ' attachments',

    CheckCountAttachments: function () {
        var count_videos = $('#videos .index:last').attr('data-index') * 1;
        var count_images = $('#images .index:last').attr('data-index') * 1;
        return count_videos + count_images < this.MaxCountAttachments;
    },

    ButtonsBehavior: function () {
        if (this.CheckCountAttachments()) {
            this.ShowAddButtons();
        } else {
            this.HideAddButtons()
        }
    },

    HideAddButtons: function () {
        $('#add_new_video').hide();
        $('#add_new_image').hide();
    },

    ShowAddButtons: function () {
        $('#add_new_video').show();
        $('#add_new_image').show();
    },
    AddVideoHtml: function () {
        this.ButtonsBehavior();
        if (this.CheckCountAttachments()) {
            var index = $('#videos .index:last').attr('data-index') * 1 + 1;
            $('#videos').append(
                `<div class="item row" data-index = ` + index + `>
                <div class="col-md-12">
                    <H4>Video  ` + index + ` </H4>
                    <a class="delete" title="Delete video">Delete</a>
                </div>
                <div class="col-md-12 index" data-index= ` + index + `>
                    <lable>Video</lable>
                      <input class="form-control" 
                             value=""
                             type="hidden"
                             name=videos[index_` + index + `][video]>
                      <input class="form-control" 
                             type="file"
                             name=videos[index_` + index + `][video]>
                      <hr>
                </div>
            </div>`
            )
        } else {
            alert(this.message)
        }
    },

    AddImageHtml: function () {
        this.ButtonsBehavior();
        if (this.CheckCountAttachments()) {
            var index = $('#images .index:last').attr('data-index') * 1 + 1;
            $('#images').append(
                `<div class="item row" data-index = ` + index + `>
                <div class="col-md-12">
                    <H4>Image  ` + index + ` </H4>
                    <a class="delete" title="Delete image">Delete</a>
                </div>
                <div class="col-md-12 index" data-index= ` + index + `>
                    <lable>image</lable>
                    <input class="form-control" 
                             value=""
                             type="hidden"
                             name=images[index_` + index + `][image]>
                    <input class="form-control" 
                           type="file"
                           name=images[index_` + index + `][image]>
                    <hr>
                </div>
            </div>`
            )
        } else {
            alert(this.message)
        }
    }
};




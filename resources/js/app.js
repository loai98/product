import './bootstrap';

$('#show_add_dialog').on('click', function (event) {
    event.preventDefault();
    $.ajax({
        url: "/products/create",
        beforeSend: function () {
            $('#loader').show();
        },
        success: function (result) {
            $('#modal').modal("show");
            $('#modalBody').html(result).show();
        },
        complete: function () {
            $('#loader').hide();
        }
    })
});
$(document).on('click',"#show_edit_dialog", function (event) {
    event.preventDefault();
    const itemId = $(this).attr('item-id');
    $.ajax({
        url: `/products/${itemId}/edit`,
        data:{
            'id':itemId
        },
        beforeSend: function () {
            $('#loader').show();
        },
        success: function (result) {
            $('#modal').modal("show");
            $('#modalBody').html(result).show();
        },
        complete: function () {
            $('#loader').hide();
        }
    })
});

$(document).on('submit', ".ajax-form", function (event) {
    event.preventDefault();
    var formData = new FormData(this);
    const form = $(this);
    $.ajax({
        url: form.attr('action'),
        method: form.attr('method'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').prop('content')
        },
        beforeSend: function () {
            $('#loader').show();
        },
        success: function (result) {
            $('#modal').modal("hide");
            $('#page_content').html(result);
        },
        complete: function () {
            $('#loader').hide();
        }
    })
});

$(document).on('click','#deleteItem' ,function () {
    const element = $(this);
    $.ajax({
        url: 'products/' + element.attr('product-id'),
        method: "delete",
        headers: {
            'X-CSRF-TOKEN': $('meta[name=csrf-token]').prop('content')
        },
        beforeSend: function () {
            $('#loader').show();
        },
        success: function (result) {
            $('#page_content').html(result);
        },
        complete: function () {
            $('#loader').hide();
        }
    })
});


$('.product-content').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
  });
          
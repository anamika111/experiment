(function ($) {
    $('#edit-form').submit(function (ev) {
        ev.preventDefault();
        $(this).find('input~p.text-error').remove();
        $.post('/experiments/anamika-s-work/experiment/ajax.php', $(this).serialize(), function (data, status) {
                alert('Your data saved successfully');
                window.location.href='/experiments/anamika-s-work/experiment/listing.php';
            }
        ).fail(function (error) {
            var error_object = JSON.parse(error.responseText);
            $.each(error_object, function (key, value) {
                $('#'+key).after('<p class="text-error text-danger">'+value+'</p>');
            });
        });


    });
})(jQuery)
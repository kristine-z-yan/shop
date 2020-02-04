$(document).ready(function() {
    $('.delete-btn').click(function() {
        const action = 'products/'+ $(this).attr('data-id');
        $('.delete-form').attr('action', action);
    })
});

$(document).ready(function () {
    console.log("ready!");

    $('.js_clear_next').click(function () {
        let sel = $(this).data('sel');
        $('.' + sel + ' input[type=checkbox]').prop("checked", false);
    });




    $('#country_id').change(function () {
        let id = $('#country_id').val();


        $('#city_id option').attr('disabled', 'disabled');

        $('#city_id .js_lib_city_' + id).removeAttr('disabled');


        $("#city_id").select2("destroy");
        $("#city_id").val(null);

        $("#city_id").select2({
            minimumResultsForSearch: Infinity,
            width: '100%'
        });

    });

    $('.js_sort').change(function () {
        $(this).parent().parent().submit();
    });

    $('.js_clear_all').click(function () {
        window.location.href = "?";
    });

});
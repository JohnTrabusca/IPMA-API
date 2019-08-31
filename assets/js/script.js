    feather.replace();
    $(document).on('click','li.dias',function () {
        var pos = $(this).val();
        $('li.dias').removeClass('active');
        $(this).addClass('active');
        $('.today-info').attr('hidden',true);
        $('#'+pos).attr('hidden',false);
        $('.weather-side').attr('hidden',true);
        $('.'+pos).attr('hidden',false);
    });
    $(document).on('click','a.locais',function () {
        var id_local = $(this).attr('id');
        var local = $(this).text();
        $.ajax({
            type: 'POST',
            url: 'weather.php?act=locais',
            data: {
                id_local: id_local
            },
            success: function (data) {
                $('#page_title').text('Meteorologia - '+local);
                $('div.container').empty();
                $('div.container').append(data);
                feather.replace();
            }
        });
        });

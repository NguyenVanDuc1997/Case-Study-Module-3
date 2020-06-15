$(document).ready(function () {
    $('.verify-booking').on('click', function () {
        let reservationId = $(this).attr('data-id');
        let selectRoomId = $('#reservation-' + reservationId).val();
        let protocol = location.protocol;
        let domain = document.domain;

        $.ajax({
            url: protocol + '//' + domain + '/reservations/' + reservationId + '/verify',
            data: {'roomId': selectRoomId},
            type: 'GET',
            dataType: 'json',
            success: function (result) {
                console.log(result)
            },
            error: function (errors) {
                console.log(errors.status)
            }
        })
    })
})

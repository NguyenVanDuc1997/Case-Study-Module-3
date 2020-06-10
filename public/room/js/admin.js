$(document).ready(function () {
    $("#keyword_search").keyup(function () {
        let keyword = $(this).val().toLowerCase();
        $.ajax({
            url: "http://localhost:8000/admin/users/search",
            data: {keyword: keyword},
            dataType: "json",
            success: function (response) {
                if(response.status == 'success'){
                    let result = response.data;
                    let html = '';
                    let index_number= 0;
                    result.forEach(element => {
                        html += '<tr>';
                        html += '<td>';
                        html += ++index_number;
                        html += '</td>';
                        html += '<td>';
                        html += element.name;
                        html += '</td>';
                        html += '<td>';
                        html += element.username;
                        html += '</td>';
                        html += '<td>';
                        html += element.role;
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('#data-users').html(html);
                }
            }
        });
    });
});
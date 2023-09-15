

const titleInput = document.getElementById("title-input");
    const urlInput = document.getElementById("url-input");

    // Add an event listener to the title input
    titleInput.addEventListener("input", function () {
        // Update the value of the URL input with the value from the title input
        urlInput.value = titleInput.value.replace(/\s+/g, '-');
    });

$('#url').keyup(function () {
    check_exist_url();
});

function check_exist_url() {
    $('#url_check_output').html('');
    var status = $('#status').val();
    var url = $('#url-input').val();
    var urlPage = $('#urlPage').val();
    // console.log(urlPage);
    if(url != '') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('admin.checkurl') }}",
            type: "get",
            data: {
                url: url,
                urlPage: urlPage,
            },
            beforeSend: function(xhr) {
                $('#processing_id').html('<div style="padding: 10px; color: #0CC510;">Checking url...<div>');
            },
            success: function(data) {
                console.log(data);
                if (data['status'] == 'yes') {
                    $('#url_check_output').html('<span class="bg-danger p-1 text-light">' + data['title'] + '</span>');
                } else if (data['status'] == 'no') {
                    $('#url_check_output').html('<span class="text-success">7u8787978<i class="fas fa-check"></i></span>');
                }
                $('#processing_id').html('');
            },
            error: function(xhr, status, error) {
                $('#processing_id').html('<div style="padding: 10px; color: #FF0000;">An error occurred while checking the URL.<div>');
                console.error("AJAX Error:", status, error);
            }
        });
        
    }
}
function session_die(){
    $.ajax({
        url: `${baseUrl}/api/session_die`,
        type: "POST"
    }).done(function(response) {
        window.location.href = `${baseUrl}/index.php`
    }).fail(function(jqXHR, textStatus) {
        console.log("Request failed: " + textStatus);
    })
}
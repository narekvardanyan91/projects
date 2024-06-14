$('#ok').on('click', function () {
    $.ajax({
        url: 'https://www.googleapis.com/youtube/v3/search',
        data: {
            part: 'snippet',
            key: 'AIzaSyCIpOvsVV4CA4zp7BpGSauxdI1aawAUsLI',
            maxResults: 9,
            q: $('#input').val()
        }, 
        dataType: 'json',

        success: function (res) {
            console.log(res)
            for (let i = 0; i < res.items.length; i++) {
                let x = $('<div>');
                x.addClass('')
                $('#main').append(x);
                let iframe = $('<iframe>');
                x.append(iframe);
                iframe.attr('src', "https://www.youtube.com/embed/" + res.items[i].id.videoId);
                let title = $('<h4>');
                x.append(title);
                (title).html(res.items[i].snippet.title);
                let desc = $("<p>");
                x.append(desc);
                (desc).html(res.items[0].snippet.description);
            }
        }
    })
})

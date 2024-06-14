$(function () {
    $('body').css({
        paddingTop: '70px',
        backgroundColor: '#004242FF',
        display: 'flex',
        justifyContent: 'space-around',
    })

    let count = 0;
    let arr = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg'];
    let left = $('<div>');
    left.attr('id', 'left');
    left.css({
        marginTop: '170px',
        width: '150px',
        height: '150px',
        backgroundImage: 'url(./arrow.png)',
        backgroundPosition: 'center',
        backgroundSize: 'cover',
        backgroundRepeat: 'no-repeat',
        transform: 'rotate(90deg)',
        cursor: 'pointer',
    });
    $('body').append(left);
    let block = $('<div>');
    block.css({
        borderRadius: '10px',
        width: '50%',
        height: '500px',
        position: 'relative',
        border: '4px solid #FE0000FF',
    })
    $('body').append(block);
    let container = $('<div>');
    container.attr('id', 'container');
    container.css({
        borderRadius: '10px',
        width: '100%',
        height: '100%',
        position: 'absolute',
        backgroundImage: 'url(./' + arr[count] + ')',
        backgroundSize: 'cover',

    })
    block.append(container);
    let right = $('<div>');
    right.attr('id', 'right');
    right.css({
        marginTop: '170px',
        width: '150px',
        height: '150px',
        backgroundImage: 'url(./arrow.png)',
        backgroundPosition: 'center',
        backgroundSize: 'cover',
        backgroundRepeat: 'no-repeat',
        transform: 'rotate(-90deg)',
        cursor: 'pointer',
    })
    $('body').append(right);
    $('#right').on('click', function () {
        count++;
        if (count == arr.length) {
            count = 0;
        }
        container.fadeOut(300, function () {
            container.css({
                backgroundImage: 'url(./' + arr[count] + ')',
                backgroundSize: 'cover',
            })
        }).fadeIn(300);
    })
    $('#left').on('click', function () {
        if(count == 0){
            count = arr.length;
        }
        count--;
        container.fadeOut(300, function () {
            container.css({
                backgroundImage: 'url(./' + arr[count] + ')',
                backgroundSize: 'cover',
            })
        }).fadeIn(300);
    })
})
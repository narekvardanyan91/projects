// $(function () {
//     let container = $('<div>');
//     container.attr('id', 'container');
//     container.css({

//         padding: '0%',
//         margin: '0% auto',
//         width: '60%',
//         height: '660px',
//         border: '1px solid black'
//     })
//     $('body').append(container);

//     let cube = $('<div>');
//     cube.attr('id', 'cube');
//     cube.css({
//         // border: '1px solid black',
//         width: '200px',
//         height: '200px',
//         backgroundImage: 'url(./drop.png)',
//         backgronudPosition: 'center',
//         backgroundSize: 'contain',
//         overflow: 'hidden',
//         backgroundRepeat: 'no-repeat',
//     })
//     $('#container').append(cube);
//     cube.animate({
//         marginTop: '665px'

//     })
//     $('#cube').top(1000).remove(cube)
// })


// $(function () {
//     let container = $('<div>');
//     container.attr('id', 'container');
//     container.css({
//         padding: '0%',
//         margin: '0% auto',
//         width: '60%',
//         height: '660px',
//         border: '1px solid black',
//         overflow:'hidden',
//         position: 'relative'
//     })
//     $('body').append(container);
//     setInterval(() => {
//         let cube = $('<div>');
//         cube.attr('id', 'cube');
//         cube.css({
//             // border: '1px solid black',
//             width: '50px',
//             height: '50px',
//             backgroundImage: 'url(./drop.png)',
//             backgronudPosition: 'center',
//             backgroundSize: 'cover',
//             // overflow: 'hidden',
//             backgroundRepeat: 'no-repeat',
//             position: 'absolute'
//         })
//         $('#container').append(cube);
//         cube.animate({
//             top: '665px',
//         })
//         $('#cube').remove(cube)
//     }, 2000);
// })


setInterval(() => {
    let cube = $('<div>');
    cube.css({
        width: '30px',
        height: '30px',
        backgroundImage: 'url(./drop.png)',
        backgronudPosition: 'center',
        backgroundSize: 'cover',
        position: 'absolute',
        left: Math.round(Math.random() * 90) + '%'
    })
    $('body').append(cube);
    cube.animate({
        top: '90vh',
        opacity: '0.5',
    }, function(){
        cube.remove();
    })
}, 100);

var circleButton = document.querySelector('#__telerWdTriggerContent');
var modalWindow = document.querySelector('.basicModal');
var body = document.querySelector('body');

// body.addEventListener('click',function () {
//     if (modalWindow.className !== 'show'){
//         circleButton.style.display = 'bloc';
//         console.log('ok');
//     }
// });

circleButton.addEventListener('click', function (event) {
// circleButton.style.display = 'none';
circleButton.style.paddingRight = 16 +'px';

});

// console.log(modalWindow.classList.contains('show'));
function scrollDown(){
        $('html, body').animate({scrollTop:$(document).height()}, 1500);
}

function timeScroll(){
    setTimeout(scrollDown, 1000);
}

$('.search').on('click',timeScroll);



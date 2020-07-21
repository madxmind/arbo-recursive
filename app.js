$(document).ready(function () {
    $('.category').click(function () {
        $(this).next().slideToggle(100);
    });
});
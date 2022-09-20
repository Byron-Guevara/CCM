$(document).ready(function () {
    $('.secondary-menu-button').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
    });
});
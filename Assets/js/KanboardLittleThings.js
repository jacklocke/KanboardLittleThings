// KANBOARD PLUGIN - JS FILE
$(document).ready(function () {

    // blinking notification icon
    setInterval(function () {
        var color = $('.web-notification-icon').css('color');
        $('.web-notification-icon').css('color', '#ff3333');
        setTimeout(function () {
            $('.web-notification-icon').css('color', color);
        }, 500);
    }, 2000);

    // better color for task-priority 
    $('.task-priority').each(function () {
        var priority = $(this).text();
        var lastChar = priority[priority.length - 1];

        $(this).css('font-weight', 'bold');
        switch (lastChar) {
            case "1":
                $(this).css('color', '#fa4141');
                break;
            case "2":
                $(this).css('color', '#11ab11');
                break;
            case "3":
                $(this).css('color', '#ad7102');
                break;
            default:
                break;
        }
    });
});
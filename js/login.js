$(function () {
    $("#register").click(function () {
        window.location.href = "/yii-test/index.php/user/register";
    });
    $("#login").click(function () {
        window.location.href = "/yii-test/index.php/user/login";
    });
    $("#personal").click(function () {
        window.location.href = "/yii-test/index.php/user/personal";
    });
    $("#video").click(function () {
        window.location.href = "/yii-test/index.php/user/videoList";
    });
    $("#hehe").tooltip();
})

$(function () {
    $("#register").click(function () {
        window.location.href = "/VideoChat/index.php/user/register";
    });
    $("#login").click(function () {
        window.location.href = "/VideoChat/index.php/user/login";
    });
    $("#personal").click(function () {
        window.location.href = "/VideoChat/index.php/user/personal";
    });
    $("#video").click(function () {
        window.location.href = "/VideoChat/index.php/user/videoList";
    });
    $("#hehe").tooltip();
    $("#hehe2").tooltip();
    $("#hehe3").tooltip();
    $("#videoStart").tooltip();
    $("#videoLeave").tooltip();
    $("#videoTest").tooltip();
    $("#wechat").tooltip();

    $("#VideoList_newRoom").tooltip();
    $("#VideoList_leave").tooltip();
    $("#VideoList_proposal").tooltip();

    $(".s_block").mouseenter(function () {
        $(this).css("background-color",
            "#DFE3FE");
    });
    $(".s_block").mouseleave(function () {
        $(this).css("background-color",
            "white");
    });

})

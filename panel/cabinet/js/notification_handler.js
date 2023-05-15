trd_notification = (type, mes) => {
    var message = mes;
    var type = type
    var duration = "5000"
    var ripple = true
    var dismissible = false
    var positionX = "right"
    var positionY = "top"
    window.notyf.open({
        type,
        message,
        duration,
        ripple,
        dismissible,
        position: {
            x: positionX,
            y: positionY
        }
    });
}
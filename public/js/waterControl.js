
document.addEventListener('DOMContentLoaded', function () {
    var checkbox = document.querySelector('input[type="checkbox"]');

    checkbox.addEventListener('change', function () {
        if (checkbox.checked) {
            // do this
            waterPumpControl("on")
            console.log('waterPumpOn');
        } else {
            // do that
            waterPumpControl("off")
            console.log('waterPumpOff');
        }
    });
});

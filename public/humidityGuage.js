$(function () {

        let color = '#90A4AE';
        let randPercent = $(".percentage").html();
        // console.log(randPercent);

        if(randPercent >= 90){
            color = '#00E676';
        }
        else if(randPercent < 90 && randPercent >= 60){
            color = '#81C784';
        }
        else if (randPercent < 60 && randPercent >= 40){
            color = '#FFEB3B';
        }
        else if (randPercent < 40 && randPercent >= 10){
            color = '#FF9800';
        }
        else if (randPercent < 10 && randPercent >= 0){
            color = '#FF3D00';
        }

        $('.column').css({background: color});

        $('.column').animate({
            height: randPercent+'%',
        });

        // $('.percentage').text(Math.round(randPercent)+'%');

    // }, 1000);
    // 1s
});

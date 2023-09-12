$(function () {
//     let prefix = 'Hum';
//
//     (function () {
//         const points = 74;
//         const radius = 257;
//         const max = 100;
//         const peaks = [20, 50, 80];
//         const step = (max + 1) / points;
//         const realPeaks = peaks.map(peak => Math.floor(peak * (1 / step)));
//         const hueStep = 120 / points;
//
//         const gaugeDigits = $('.gauge-digits'+prefix);
//
//         const digit = $('.gauge'+prefix).data('digit');
//         gaugeDigits.prepend('<span class="digit'+prefix +' current-digit'+prefix +' count">0</span>');
//
//         for (let i = 0; i < points; i++) {
//             const degree = i * (radius / (points - 1)) - radius / 2;
//             const isPeak = realPeaks.indexOf(i) > -1;
//             const gaugeInner = $('.gauge-inner'+prefix).append(`<i class="bar${isPeak ? prefix+' peak'+prefix  : prefix}" style="transform: rotate(${degree}deg)"></i>`);
//
//             const intStep = Math.ceil(step * i);
//             const intNextStep = Math.ceil(step * (i + 1));
//
//             let styles = `transition-delay: ${ (i / digit) * (i / digit) + 1 }s;`;
//
//             if (intStep <= digit) {
//                 styles += `background-color: hsl(${240 + i * hueStep}, 92%, 64%);`;
//             }
//
//             if (intStep > digit || (intStep <= digit && intNextStep <= digit)) {
//                 styles += `
//             -webkit-transform: rotate(${degree}deg);
//             -moz-transform: rotate(${degree}deg);
//             -ms-transform: rotate(${degree}deg);
//             -o-transform: rotate(${degree}deg);
//             transform: rotate(${degree}deg);`;
//             } else {
//                 if (intNextStep > digit)
//                     styles += `
//                 -webkit-transform: rotate(${degree}deg) translateY(-.3em);
//                 -moz-transform: rotate(${degree}deg) translateY(-.3em);
//                 -ms-transform: rotate(${degree}deg) translateY(-.3em);
//                 -o-transform: rotate(${degree}deg) translateY(-.3em);
//                 transform: rotate(${degree}deg) translateY(-.3em);
//                 height: 1em;`;
//             }
//
//
//             $('.gauge-outer'+prefix).append(`<i class="bar`+prefix+`" style="${styles}"></i>`);
//
//             if (isPeak) {
//                 const digit = $(`<span class="digit${prefix}" > ${peaks[realPeaks.indexOf(i)]}</span>`);
//                 const peakOffset = gaugeInner.find(".peak"+prefix).last().offset();
//
//                 gaugeDigits.append(digit);
//
//                 if (degree > -5 && degree < 5)
//                     digit.offset({left: peakOffset.left - 5, top: peakOffset});
//                 else
//                     digit.offset(peakOffset);
//
//                 setTimeout(function () {
//                     gaugeDigits.addClass('scale'+prefix);
//                 }, 1)
//
//             }
//         }
//
//         counterify();
//     }());
//
//     setTimeout(() => {
//         const gauge = $('.gauge'+prefix);
//         const digit = gauge.data('digit');
//         gauge.addClass('load ');
//         setTimeout(()=>{
//             gauge.find('.current-digit'+prefix).text(digit).trigger('count');
//         }, 1000)
//     }, 500); // not imp
//
//     // add event for .count(s)
//     function counterify() {
//         $('.count'+prefix).each(function () {
//             $(this).on('count', function () {
//                 let fixed = $(this).text().toString().split('.')[1];
//                 const thousand = $(this).hasClass('thousandify');
//                 fixed = fixed ? (fixed.length > 2 ? 2 : fixed.length) : 0;
//
//                 $(this).prop('Counter', 0).animate({
//                     Counter: $(this).text()
//                 }, {
//                     duration: 600,
//                     easing: 'swing',
//                     step: function (now) {
//                         if (thousand)
//                             $(this).text((thousandify(now.toFixed(fixed))));
//                         else
//                             $(this).text((now.toFixed(fixed)));
//                     }
//                 });
//             });
//         });
//     }
//


    // setInterval(function(){
        // var randPercent = Math.floor(Math.random() * 100);
        //Generic column color
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

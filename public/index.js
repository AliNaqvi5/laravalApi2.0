$(function () {
    GenerateGuage("Hum",60,257,100,[10,50,90],"%");
    GenerateGuage("Temp",43,257,60,[10,30,50],"C");
    function GenerateGuage(prefix = "Temp",points,radius,max,peaks,unit) {
        // const points = 43;
        // const radius = 257;
        // const max = 60;
        // const peaks = [10, 30, 50];
        const step = (max + 1) / points;
        const realPeaks = peaks.map(peak => Math.floor(peak * (1 / step)));
        const hueStep = 120 / points;

        const gaugeDigits = $('.gauge-digits'+prefix);

        const digit = $('.gauge'+prefix).data('digit');
        gaugeDigits.prepend('<span class="digit'+prefix +' current-digit'+prefix +' count">0</span>');

        for (let i = 0; i < points; i++) {
            const degree = i * (radius / (points - 1)) - radius / 2;
            const isPeak = realPeaks.indexOf(i) > -1;
            const gaugeInner = $('.gauge-inner'+prefix).append(`<i class="bar${isPeak ? prefix+' peak'+prefix  : prefix}" style="transform: rotate(${degree}deg)"></i>`);

            const intStep = Math.ceil(step * i);
            const intNextStep = Math.ceil(step * (i + 1));

            let styles = `transition-delay: ${ (i / digit) * (i / digit) + 1 }s;`;

            if (intStep <= digit) {
                styles += `background-color: hsl(${240 + i * hueStep}, 92%, 64%);`;
            }

            if (intStep > digit || (intStep <= digit && intNextStep <= digit)) {
                styles += `
            -webkit-transform: rotate(${degree}deg);
            -moz-transform: rotate(${degree}deg);
            -ms-transform: rotate(${degree}deg);
            -o-transform: rotate(${degree}deg);
            transform: rotate(${degree}deg);`;
            } else {
                if (intNextStep > digit)
                    styles += `
                -webkit-transform: rotate(${degree}deg) translateY(-.3em);
                -moz-transform: rotate(${degree}deg) translateY(-.3em);
                -ms-transform: rotate(${degree}deg) translateY(-.3em);
                -o-transform: rotate(${degree}deg) translateY(-.3em);
                transform: rotate(${degree}deg) translateY(-.3em);
                height: 1em;`;
            }


            $('.gauge-outer'+prefix).append(`<i class="bar`+prefix+`" style="${styles}"></i>`);

            if (isPeak) {
                const digit = $(`<span class="digit${prefix}" > ${peaks[realPeaks.indexOf(i)]}</span>`);
                const peakOffset = gaugeInner.find(".peak"+prefix).last().offset();

                gaugeDigits.append(digit);

                if (degree > -5 && degree < 5)
                    digit.offset({left: peakOffset.left - 5, top: peakOffset});
                else
                    digit.offset(peakOffset);

                setTimeout(function () {
                    gaugeDigits.addClass('scale'+prefix);
                }, 1)

            }
        }

        counterify(prefix);
        setTime(prefix,unit);
    }

    function setTime(prefix,unit) {
        setTimeout(() => {
            const gauge = $('.gauge' + prefix);
            const digit = gauge.data('digit');
            gauge.addClass('load ');
            setTimeout(() => {
                gauge.find('.current-digit' + prefix).text(digit +unit).trigger('count');
            }, 1000)
        }, 500); // not imp
    }
    // add event for .count(s)
    function counterify(prefix) {
        $('.count'+prefix).each(function () {
            $(this).on('count', function () {
                let fixed = $(this).text().toString().split('.')[1];
                const thousand = $(this).hasClass('thousandify');
                fixed = fixed ? (fixed.length > 2 ? 2 : fixed.length) : 0;

                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 600,
                    easing: 'swing',
                    step: function (now) {
                        if (thousand)
                            $(this).text((thousandify(now.toFixed(fixed))));
                        else
                            $(this).text((now.toFixed(fixed)));
                    }
                });
            });
        });
    }
});



const redline = function () {
    const speedometer = document.querySelector('#speedometer');
    const dial = document.querySelector('#dial');

    const tl = new TimelineMax({ paused: true });
    tl.from(dial, .5, { transformOrigin: '32 32', rotation: -240 })
    // .to(dial, .3, { transformOrigin: '32 32', rotation: -25, yoyo: true, repeat: 5, ease: Back.easeOut.config(2) })
    console.log(speedometer.parentElement)

    speedometer.parentElement.parentElement.addEventListener("mouseover", function () {
        tl.play(0)
    })
    speedometer.parentElement.parentElement.addEventListener("mouseleave", function () {
        tl.reverse(0)
    })
}

redline();

const security = function () {

    const gearOne = document.querySelector('#gear-one');
    const gearTwo = document.querySelector('#gear-two');
    const gearThree = document.querySelector('#gear-three');
    const lock = document.querySelector('#lock');

    const tl = new TimelineMax({ repeat: -1 });
    tl.to(gearOne, 10, { transformOrigin: '50% 50%', rotation: '-360', ease: Power0.easeNone }, '-=10')
    tl.to(gearTwo, 10, { transformOrigin: '50% 50%', rotation: '360', ease: Power0.easeNone }, '-=10')
    tl.to(gearThree, 10, { transformOrigin: '50% 50%', rotation: '-360', ease: Power0.easeNone }, '-=10')
    tl.to(clasp, .5, { scaleY: 15, ease: Elastic.easeOut.config(2.5, 1) }, '4')
    tl.to([clasp, lock], .5, { fill: 'green' }, '4.3')

}

security();


const flash = function () {
    section = document.querySelector('#speed');
    competitorOne = document.querySelector('#competitor-speed-one');
    competitorTwo = document.querySelector('#competitor-speed-two');
    competitorThree = document.querySelector('#competitor-speed-three');
    competitorFour = document.querySelector('#competitor-speed-four');
    competitorFive = document.querySelector('#competitor-speed-five');

    contOne = { val: 0 };
    contTwo = { val: 0 };
    contThree = { val: 0 };
    contFour = { val: 0 };
    contFive = { val: 0 };
    compSpeedOne = 2.35;
    compSpeedTwo = 3.15
    compSpeedThree = 3.594;
    compSpeedFour = 3.99;
    compSpeedFive = 6.719333333

    const maxWidth = 95 / 6.719333333;

    const tl = new TimelineMax();
    tl.to(competitorOne, 1, { width: maxWidth * 2.35 + '%' })
        .to(contOne, 1, {
            val: compSpeedOne, onUpdate: function () {
                competitorOne.firstChild.innerText = contOne.val.toFixed(2)
            }
        }, '-=1')
        .to(competitorTwo, 1, { width: maxWidth * compSpeedTwo + '%' }, '-=1')
        .to(contTwo, 1, {
            val: compSpeedTwo, onUpdate: function () {
                competitorTwo.firstChild.innerText = contTwo.val.toFixed(2)
            }
        }, '-=1')
        .to(competitorThree, 1, { width: maxWidth * compSpeedThree + '%' }, '-=1')
        .to(contThree, 1, {
            val: compSpeedThree, onUpdate: function () {
                competitorThree.firstChild.innerText = contThree.val.toFixed(2)
            }
        }, '-=1')
        .to(competitorFour, 1, { width: maxWidth * compSpeedFour + '%' }, '-=1')
        .to(contFour, 1, {
            val: compSpeedFour, onUpdate: function () {
                competitorFour.firstChild.innerText = contFour.val.toFixed(2)
            }
        }, '-=1')
        .to(competitorFive, 1, { width: maxWidth * compSpeedFive + '%' }, '-=1')
        .to(contFive, 1, {
            val: compSpeedFive, onUpdate: function () {
                competitorFive.firstChild.innerText = contFive.val.toFixed(2)
            }
        }, '-=1')



    // 2. Curtain Scene
    var scene = new ScrollMagic.Scene({ triggerElement: section, offset: -50 })
        .addTo(controller)
        .setTween(tl)

}
flash()


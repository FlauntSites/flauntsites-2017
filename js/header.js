

function headerStripes() {
    const stripeA = document.querySelector('#a')
    const stripeB = document.querySelector('#b')
    const stripeC = document.querySelector('#c')


    const tl = new TimelineMax();
    tl.to(stripeA, 0.25, { marginLeft: 0 }, 1)
        .to(stripeB, 0.25, { marginLeft: 0 })
        .to(stripeC, 0.25, { marginLeft: 0 })
}
window.load = headerStripes();



const chatPopout = function () {

    const chatMessage = document.querySelector('.chat-message');

    const tl = new TimelineMax;
    tl.from(chatMessage, .5, { autoAlpha: 0, width: 0, height: 0 }, 15)

}

window.load = chatPopout();
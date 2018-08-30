if (document.querySelector('.wipe')) {
    document.querySelector('.wipe');

    const wipeEffect = function () {

        const wipeTarget = document.querySelector('.wipe');
        const modal = document.querySelector('.wipe-modal');

        const tl = new TimelineMax({ paused: true });
        tl.to(modal, 1, { right: 0, ease: Power4.easeInOut })

        wipeTarget.addEventListener("click", function () {
            tl.play(0)
        })

        // Removes modal on Escape
        document.onkeydown = function (evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = evt.key == "Escape" || evt.key == "Esc"
            } else {
                isEscape = evt.keyCode == 27
            }
            if (isEscape) {
                tl.reverse(0)
            }
        }


    }
    wipeEffect();

}

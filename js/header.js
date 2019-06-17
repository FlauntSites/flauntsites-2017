function headerStripes() {
  const stripeA = document.querySelector("#a")
  const stripeB = document.querySelector("#b")
  const stripeC = document.querySelector("#c")

  const tl = new TimelineMax()
  tl.to(stripeA, 0.25, { marginLeft: 0 }, 1)
    .to(stripeB, 0.25, { marginLeft: 0 })
    .to(stripeC, 0.25, { marginLeft: 0 })
}
window.load = headerStripes()

const chatPopout = function() {
  const chatMessage = document.querySelector(".chat-message")

  const tl = new TimelineMax()
  tl.to(chatMessage, 0.5, { autoAlpha: 1, width: 350, height: 57 }, 15).to(
    chatMessage,
    0.5,
    { autoAlpha: 0, width: 0, height: 0 },
    "+=3"
  )
}
window.load = chatPopout()

/**
 *
 * Fade Animations
 *
 */
const fadeIn = (selector, fromArgs, offset) => {
  document.querySelectorAll(selector).forEach(element => {
    const tl = new TimelineMax()
    tl.from(element, ...fromArgs)

    const controller = new ScrollMagic.Controller()

    new ScrollMagic.Scene({
      triggerElement: element.parentElement,
      offset
    })
      .addTo(controller)
      .setTween(tl)
  })
}
fadeIn(".left", [0.75, { x: -100, opacity: 0 }], -150)
fadeIn(".right", [0.75, { x: 100, opacity: 0 }], -150)
fadeIn(".up", [0.75, { scale: 0.95, y: 110, opacity: 0 }], -150)
fadeIn(".neutral", [1.5, { autoAlpha: 0, opacity: 0 }], -150)

/**
 *
 * Logo Animation
 *
 */

const lightning = function() {
  const highlightOne = document.querySelectorAll("#highlight-one")
  const highlightTwo = document.querySelectorAll("#highlight-two")
  const identity = document.querySelector(".identity a")
  const footerIdentity = document.querySelector(".footer-identity a")
  const identities = [identity, footerIdentity]

  identities.forEach(function(el) {
    const tl = new TimelineMax({ paused: true })
    tl.fromTo(
      highlightOne,
      0.5,
      { autoAlpha: 0, drawSVG: "0% 80%" },
      { autoAlpha: 1, drawSVG: "100% 100%", ease: Power4.easeIn }
    ).fromTo(
      highlightTwo,
      0.5,
      { autoAlpha: 0, drawSVG: "0% 80%" },
      { autoAlpha: 1, drawSVG: "100% 100%", ease: Power4.easeIn },
      "-=.6"
    )

    el.addEventListener("mouseenter", function() {
      tl.play(0)
    })
    el.addEventListener("mouseleave", function() {
      tl.pause(0)
    })
  })
}
lightning()

const fixedHeader = function() {
  const page = document.querySelector("#page")
  const header = document.querySelector(".site-header")
  const stripes = document.querySelector(".stripes-container")
  const cta = document.querySelector(".cta")
  const logo = document.querySelector(".identity a svg")
  const menuText = document.querySelectorAll(".main-navigation a")

  var tl = new TimelineMax()
  tl.set(header, { position: "fixed" })
    .to(stripes, 0.25, { display: "none" })
    .to(cta, 0.25, { className: "+=cta-scroll" })
    .to(logo, 0.25, { height: "35px" }, "-=0.25")
    .to(header, 0.25, { backgroundColor: "rgba(0,0,0,0.85)" }, "-=0.25")

  // 2. Curtain Scene
  new ScrollMagic.Scene({ triggerElement: page, offset: 375 })
    .addTo(controller)
    // .addIndicators()
    .setTween(tl)
}
if (screen.width >= 480) {
  fixedHeader()
}

function headerStripes(){(new TimelineMax).to(stripeA,.25,{marginLeft:0},1).to(stripeB,.25,{marginLeft:0}).to(stripeC,.25,{marginLeft:0})}function headerStripesSet(){(new TimelineMax).set([stripeA,stripeB,stripeC],{marginLeft:0})}var stripeA=document.querySelector("#a"),stripeB=document.querySelector("#b"),stripeC=document.querySelector("#c");null!=sessionStorage.getItem("fsStripes")?window.load=headerStripesSet():window.load=headerStripes();const redline=function(){const e=document.querySelector("#speedometer"),t=document.querySelector("#dial"),o=new TimelineMax({paused:!0});o.from(t,.5,{transformOrigin:"32 32",rotation:-240}),console.log(e.parentElement),e.parentElement.parentElement.addEventListener("mouseover",function(){o.play(0)}),e.parentElement.parentElement.addEventListener("mouseleave",function(){o.reverse(0)})};redline();const security=function(){const e=document.querySelector("#gear-one"),t=document.querySelector("#gear-two"),o=document.querySelector("#gear-three"),r=document.querySelector("#lock"),n=new TimelineMax({repeat:-1});n.to(e,10,{transformOrigin:"50% 50%",rotation:"-360",ease:Power0.easeNone},"-=10"),n.to(t,10,{transformOrigin:"50% 50%",rotation:"360",ease:Power0.easeNone},"-=10"),n.to(o,10,{transformOrigin:"50% 50%",rotation:"-360",ease:Power0.easeNone},"-=10"),n.to(clasp,.5,{scaleY:15,ease:Elastic.easeOut.config(2.5,1)},"4"),n.to([clasp,r],.5,{fill:"green"},"4.3")};security();const flash=function(){section=document.querySelector("#speed"),competitorOne=document.querySelector("#competitor-speed-one"),competitorTwo=document.querySelector("#competitor-speed-two"),competitorThree=document.querySelector("#competitor-speed-three"),competitorFour=document.querySelector("#competitor-speed-four"),competitorFive=document.querySelector("#competitor-speed-five"),contOne={val:0},contTwo={val:0},contThree={val:0},contFour={val:0},contFive={val:0},compSpeedOne=2.35,compSpeedTwo=3.15,compSpeedThree=3.594,compSpeedFour=3.99,compSpeedFive=6.719333333;const e=95/6.719333333,t=new TimelineMax;t.to(competitorOne,1,{width:2.35*e+"%"}).to(contOne,1,{val:compSpeedOne,onUpdate:function(){competitorOne.firstChild.innerText=contOne.val.toFixed(2)}},"-=1").to(competitorTwo,1,{width:e*compSpeedTwo+"%"},"-=1").to(contTwo,1,{val:compSpeedTwo,onUpdate:function(){competitorTwo.firstChild.innerText=contTwo.val.toFixed(2)}},"-=1").to(competitorThree,1,{width:e*compSpeedThree+"%"},"-=1").to(contThree,1,{val:compSpeedThree,onUpdate:function(){competitorThree.firstChild.innerText=contThree.val.toFixed(2)}},"-=1").to(competitorFour,1,{width:e*compSpeedFour+"%"},"-=1").to(contFour,1,{val:compSpeedFour,onUpdate:function(){competitorFour.firstChild.innerText=contFour.val.toFixed(2)}},"-=1").to(competitorFive,1,{width:e*compSpeedFive+"%"},"-=1").to(contFive,1,{val:compSpeedFive,onUpdate:function(){competitorFive.firstChild.innerText=contFive.val.toFixed(2)}},"-=1");var o=new ScrollMagic.Scene({triggerElement:section,offset:-50}).addTo(controller).setTween(t)};flash();var Cont={val:0},NewVal=100;TweenLite;const chatPopout=function(){const e=document.querySelector(".chat-message"),t=document.querySelector("#tawkchat-status-icon");tl=new TimelineMax,tl.from(e,.5,{autoAlpha:0,width:0,height:0},15),t.addEventListener("click",function(){tl.reverse(0),t.click()})};chatPopout();
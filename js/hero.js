
var cta = document.querySelector( '.hero-cta' );


function headerCTA() {

    var tl = new TimelineMax();
        tl.to( cta, 2, { opacity:1 }, .5 );
    }

window.load = headerCTA();  
    


/**
 * 
 * Adds a YouTube video when the Learn More button is clicked.
 * 
 */

var cta = document.querySelector( '.cta-message' ),
    video = '<iframe width="560" height="315" src="https://www.youtube.com/embed/E0VT1n117js?rel=0&amp;showinfo=0?ecver=1" frameborder="0" allowfullscreen></iframe>',
    ctaButton = document.querySelector( '#hero-video' );


function heroVideo( event ){
    event.preventDefault();
    var tl = new TimelineMax();
        tl.to( cta, 1, { opacity:0, onComplete: onComplete } );   
}

function onComplete(){
    cta.innerHTML = video; 

    var tl = new TimelineMax();
        tl.to( cta, 1, { opacity:1 } );
}

ctaButton.addEventListener( "click", heroVideo );

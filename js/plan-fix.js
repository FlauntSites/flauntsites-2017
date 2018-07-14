
var planTier = document.getElementsByClassName('plan-tier');

for (var i = 0; i < planTier.length; i++) {
    planTier[i].classList.remove('lift');
}


const bluDomainSpecial = function () {

    const plan = document.querySelector('#plan-363 h5');
    const special = document.createElement('p');

    special.innerText = 'One Year Free!';
    plan.appendChild(special);
    special.style = "position:absolute; left:50%; transform:translate(10%, -72px) rotate(21deg); font-size:85%; font-weight:400;"
}
bluDomainSpecial()
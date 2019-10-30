var $boxOne = $('.box:nth-child(1)'),
  $boxTwo = $('.box:nth-child(2)'),
  $boxThree = $('.box:nth-child(3)');

var boxOne = new TimelineMax(),
  boxTwo = new TimelineMax(),
  boxThree = new TimelineMax();

boxOne.to($boxOne, 0.6, {
  opacity: 0.25,
  scale: 1,
  ease: Back.easeOut
}).to($boxOne, 0.6, {
  rotation: 4,
  ease: Back.easeOut
}, 2);

boxTwo.to($boxTwo, 0.6, {
  opacity: 0.5,
  scale: 1,
  ease: Back.easeOut
}, 0.6).to($boxTwo, 0.6, {
  rotation: -4,
  ease: Back.easeOut
}, 1.8);

boxThree.to($boxThree, 0.6, {
  opacity: 1,
  scale: 1,
  ease: Back.easeOut
}, 1.2);

var animateProgress = setInterval(progressAnimation, 1200);

$(document).hover(function() {
  clearInterval(animateProgress)
});
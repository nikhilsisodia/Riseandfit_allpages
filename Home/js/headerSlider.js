slide()
function slide(){
  setTimeout(function(){
    slide()
  },5000);
  $('.carousel').carousel('next')
}
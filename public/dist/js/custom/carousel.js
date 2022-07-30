var carouselSlide = document.querySelector(".carouselSlide");
var carouselItems = document.querySelectorAll(".itemContainer");
var dotContainer = document.querySelector(".dotContainer");

// Buttons
var prevBtn = document.querySelector(".prev-btn");
var nextBtn = document.querySelector(".next-btn");


// Counter
var dot_length = carouselItems.length - 2;
var size = carouselItems[0].clientWidth;
var progress = false; // prevent double click on arrow
var easeInOutExpo = "";


var counter = {
  flowDirecOntouch: false, // to get flow direction on hover fingure on slider: false mean left direction
  value: 1,
  increment: function() {
   // check cond.. is translateX left or right
    if(this.flowDirecOntouch){
       this.setValue(this.value - 1);
       this.flowDirecOntouch = false;
     }
    else this.setValue(this.value + 1);
  },
  decrement: function() {
    this.setValue(this.value - 1);
  },
  setValue: function(newVal) {

          if (this.value <= 0 || this.value >= carouselItems.length - 1 || !!progress)
           return;

          if ( //condition to check new value when click on dots
            this.value === newVal ||
            newVal < 0 ||
            newVal > carouselItems.length - 1
          )
            return;

          carouselDots[this.value - 1].classList.remove("active");
          this.value = newVal;

          if (this.value === 0)
            carouselDots[dot_length - 1].classList.add("active");
          else if (this.value === carouselItems.length - 1)
            carouselDots[0].classList.add("active");
          else carouselDots[this.value - 1].classList.add("active");

          progress = true;

        // to slide carousel slide
          carouselSlide.style.transition = `transform 1s ${easeInOutExpo}`;
          carouselSlide.style.transform = `translateX(${-size * this.value}px)`;

          resetTimer();
  },

  elasticity: function() {
    // code...
        }

};


// this transition first time when page load...
   carouselSlide.style.transform = `translateX(${-size * counter.value}px)`;



   /*  loop to create dot */
   for(i=1; i<=dot_length; i++){

       var dot = document.createElement("div");
       dot.setAttribute("class","dot");
       if(i==1) dot.classList.add("active");
       dotContainer.appendChild(dot);
   }

   // to add event on all dot
    var carouselDots = document.querySelectorAll(".dot");
     carouselDots.forEach((dot, index) => {
         dot.addEventListener("click", function(e) {
         counter.setValue(index + 1);
       });
     });



       /*
       *   timer...
       */
       var carousel_interval = setInterval(() => {
         counter.increment();
       }, 4000);

       var resetTimer = function() {
         clearInterval(carousel_interval);
         carousel_interval = setInterval(() => {
           counter.increment();
         }, 4000);
       };


/*
*  carouselSlide.addEventListener() function call when image transitionend...
*/
carouselSlide.addEventListener("transitionend", function(e) {
  carouselSlide.style.transition = "";
  progress = false;
  if (
    carouselItems[counter.value].classList.contains("clone")
  ) {
    if (counter.value === 0) counter.value = carouselItems.length - 2;
    else counter.value = 1;
//alert(size);
    carouselSlide.style.transform = `translateX(${-size * counter.value}px)`;
  }
});


  /*
  *  pre & next button action
  */
    prevBtn.addEventListener("click", function(e) {
      counter.decrement();
    });

    nextBtn.addEventListener("click", function(e) {
      counter.increment();
    });



    // on resize window
    window.addEventListener("resize", function(e) {
      size = carouselItems[0].clientWidth;
      carouselSlide.style.transform = `translateX(${-size * counter.value}px)`;
    });




    /////////////////  THIS IS ONLY FOR TOUCH SCREEN ///////////////////////////////
    var x,a,z;
    document.getElementById("carouselSlide").addEventListener("touchstart",function(event){
       x = event.touches[0].clientX;
    });

    document.getElementById("carouselSlide").addEventListener("touchmove",function(event){
       a = event.touches[0].clientX;
    //   console.log(a);
       if (!progress === true){
         counter.flowDirecOntouch = (x-a < 0);
        // console.log(flowDirecOntouch);
         carouselSlide.style.transform = `translateX(${-size * counter.value - (x-a)}px)`;
       }
       flowDirecOntouch = ''; // unset
    });

    document.addEventListener("touchend",function(event){
      z= x-a;
          if(z<0){
          counter.decrement();
          }
          else{
          counter.increment();
          }
    });

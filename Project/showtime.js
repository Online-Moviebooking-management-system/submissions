var util = {
    qs(sel, ctx){ 
      return (ctx || document).querySelector(sel);
    },
    qsa(sel, ctx){
      return Array.from((ctx || document).querySelectorAll(sel));
    }
  };
  
  class DateCarousel {
    constructor(el) {
      this.element = el;
      this.prevButton = util.qs(".date-carousel-prev", el);
      this.input = util.qs(".date-carousel-input",el);
      this.nextButton = util.qs(".date-carousel-next",el);
      this.input.valueAsDate = new Date();
      this.prevButton.addEventListener("click",this.prev.bind(this));
      this.nextButton.addEventListener("click",this.next.bind(this));     
    }
    
    prev(){
      this.input.stepDown();
    }
    
    next() {
      this.input.stepUp();
    }
  }
  
  util.qsa('.date-carousel').forEach(function(el){ new DateCarousel(el) });
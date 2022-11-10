const d = document;

export default function slider() {
  const $nextBtn = d.querySelector(".slider-btns .next"),
    $prevBtn = d.querySelector(".slider-btns .prev"),
    $slides = d.querySelectorAll(".slider-slide");

  let i = 0;

    let auto = setInterval(() => {
    
      $slides[i].classList.remove("active_right");
      $slides[i].classList.remove("active_left");
      i++;

      if (i >= $slides.length) {
        i = 0;
      }

      $slides[i].classList.add("active_right");
    
  }, 2000);

  d.addEventListener("click", (e) => {
    if (e.target === $prevBtn) {
      e.preventDefault();
      clearInterval(auto);
      $slides[i].classList.remove("active_left");
      $slides[i].classList.remove("active_right");
      i--;

      if (i < 0) {
        i = $slides.length - 1;
      }

      $slides[i].classList.add("active_left");

      auto = setInterval(() => {
    
        $slides[i].classList.remove("active_right");
        $slides[i].classList.remove("active_left");
        i++;
  
        if (i >= $slides.length) {
          i = 0;
        }
  
        $slides[i].classList.add("active_right");
      
    }, 2000);
    }

  });

  d.addEventListener("click", (e) => {
    if (e.target === $nextBtn) {
      e.preventDefault();
      clearInterval(auto);
      $slides[i].classList.remove("active_right");
      $slides[i].classList.remove("active_left");
      i++;

      if (i >= $slides.length) {
        i = 0;
      }

      $slides[i].classList.add("active_right");
      auto = setInterval(() => {
    
        $slides[i].classList.remove("active_right");
        $slides[i].classList.remove("active_left");
        i++;
  
        if (i >= $slides.length) {
          i = 0;
        }
  
        $slides[i].classList.add("active_right");
      
    }, 2000);
    }
  });
}

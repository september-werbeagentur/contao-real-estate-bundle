(()=>{function e(){const e=document.getElementById("swa-image-slider-footer");return parseInt(e.dataset.position)}function t(t){n(e()+t)}function n(t){const n=document.getElementById("footerslider");if(0<=t&&t<function(){const e=document.getElementById("swa-image-slider-footer");return parseInt(e.dataset.count)}()){const s=document.getElementById("swa-image-slider-footer__slides"),o=n.getElementsByClassName("swa-image-slider__slide"),i=e(),a=-1*function(){const e=document.getElementById("swa-image-slider-footer");return parseFloat(e.dataset.distance)}()*t;s.style.transform="translate3d("+a+"%, 0, 0)",function(e){document.getElementById("swa-image-slider-footer").dataset.position=e}(t),o[i].classList.remove("swa-image-slider__slide--active"),o[t].classList.add("swa-image-slider__slide--active")}}window.addEventListener("load",function(){const s=document.getElementById("swa-image-slider-footer__control--previous"),o=document.getElementById("swa-image-slider-footer__control--next");s.addEventListener("click",function(){t(-1)}),o.addEventListener("click",function(){t(1)}),n(e())})})();
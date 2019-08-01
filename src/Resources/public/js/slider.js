(() => {
    window.addEventListener("load", function () {
        const controlPrev = document.getElementById("swa-image-slider__control--previous");
        const controlNext = document.getElementById("swa-image-slider__control--next");

        controlPrev.addEventListener("click", function () {
            changeSlide(-1);
        });

        controlNext.addEventListener("click", function () {
            changeSlide(1);
        });

        initializeSlider();
    });

    function getCurrentSliderPosition() {
        const slider = document.getElementById("swa-image-slider");
        return parseInt(slider.dataset.position);
    }

    function setCurrentSliderPosition(position) {
        const slider = document.getElementById("swa-image-slider");
        slider.dataset.position = position;
    }

    function getSlideDistance() {
        const slider = document.getElementById("swa-image-slider");
        return parseFloat(slider.dataset.distance);
    }

    function getSlideCount() {
        const slider = document.getElementById("swa-image-slider");
        return parseInt(slider.dataset.count);
    }

    function initializeSlider() {
        slideToPosition(getCurrentSliderPosition())
    }

    function changeSlide(direction) {
        const newSliderPosition = getCurrentSliderPosition() + direction;

        slideToPosition(newSliderPosition);
    }

    function slideToPosition(position) {
        if (0 <= position && position < getSlideCount()) {
            const sliderContainer = document.getElementById("swa-image-slider__slides");
            const slides = document.getElementsByClassName("swa-image-slider__slide");
            const currentSliderPosition = getCurrentSliderPosition();
            const slideDistance = getSlideDistance() * -1 * position;

            sliderContainer.style.transform = "translate3d(" + slideDistance + "%, 0, 0)";
            setCurrentSliderPosition(position);
            slides[currentSliderPosition].classList.remove("swa-image-slider__slide--active");
            slides[position].classList.add("swa-image-slider__slide--active");
        }
    }
})();

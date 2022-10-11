const fadeInAnimations = () => {
  const observedElements = document.querySelectorAll('.fade-in, .slide-left, .slide-right');

  const options = {
    rootMargin: '-100px 0px -100px 0px',
    threshold: [0],
  };
  // threshold: [0.5, 0.25],

  const inViewCallback = (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('-active');
      }
    });
  };

  const observer = new IntersectionObserver(inViewCallback, options);

  observedElements.forEach((element) => {
    const dataDelay = element.getAttribute('data-delay');
    element.style.transitionDelay = `${dataDelay}ms`;
    observer.observe(element);
  });
};

export default fadeInAnimations;

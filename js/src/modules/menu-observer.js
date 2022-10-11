function detectSectionInViewport(targets) {
  const rootMarginBottom = window.innerHeight / 2;
  const rootMarginTop = window.innerHeight / 5;
  const options = {
    rootMargin: `-${rootMarginTop}px 0px -${rootMarginBottom}px 0px`,
    threshold: [0],
  };

  const intersectionObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      let currItem;
      if (entry.isIntersecting) {
        const menuItem = document.querySelectorAll('.menu-item');

        menuItem.forEach((item) => {
          item.classList.remove('active');
          const itemLink = item.firstChild.getAttribute('href').replace('#', '');
          if (itemLink == entry.target.id) {
            currItem = item;
          }
        });
        if (currItem) {
          currItem.classList.add('active');
        }
      }
    });
  }, options);

  targets.forEach((target) => intersectionObserver.observe(target));
}

const menuObserver = () => {
  const intersectionTargets = document.querySelectorAll('.sec-detection');
  detectSectionInViewport(intersectionTargets);
};

export default menuObserver;

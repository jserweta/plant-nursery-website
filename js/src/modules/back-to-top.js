//---------------------------------------------------------------
// Hide/show back to top button
//---------------------------------------------------------------
const backToTop = () => {
  const topBtn = document.getElementById('back-to-top');

  function trackScroll() {
    const scrolled = window.pageYOffset;
    const scrollAmount = 300;

    if (scrolled > scrollAmount) {
      topBtn.classList.add('is-visible');
    }

    if (scrolled < scrollAmount) {
      topBtn.classList.remove('is-visible');
    }
  }

  window.addEventListener('scroll', trackScroll);
};

export default backToTop;

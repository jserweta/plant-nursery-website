const smoothScroll = () => {
  const scrollItems = document.querySelectorAll('.smooth-scroll');
  scrollItems.forEach((item) => {
    const href = item.getAttribute('href').replace('#', '');

    item.addEventListener('click', (e) => {
      e.preventDefault();
      let scrollOptions = {
        behavior: 'smooth',
        block: 'center',
      };

      if (href === 'page') {
        scrollOptions = {
          behavior: 'smooth',
        };
      }

      document.getElementById(href).scrollIntoView(scrollOptions);
    });
  });
};

export default smoothScroll;

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        window.scrollTo({
          top: target.offsetTop,
          behavior: 'smooth'
        });
        document.querySelector('.main-nav').classList.remove('active');
      }
    });
  });

  const burger = document.querySelector('.burger-menu');
  const nav = document.querySelector('.main-nav');

  burger.addEventListener('click', () => {
    nav.classList.toggle('active');
  });

  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target) && !burger.contains(e.target)) {
      nav.classList.remove('active');
    }
  });
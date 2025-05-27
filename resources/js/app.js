import './bootstrap';
document.querySelectorAll('.menu a').forEach(link => {
    link.addEventListener('click', function() {
      document.querySelectorAll('.menu a').forEach(el => el.classList.remove('active'));
      this.classList.add('active');
    });
  });
  
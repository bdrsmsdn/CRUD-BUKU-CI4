<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav mx-auto">
        <a class="nav-link" aria-current="page" href="/user/home">Home</a>
        <a class="nav-link" href="/user/mybook">Buku Saya</a>
        <a class="nav-link" href="/logout">Logout</a>
      </div>
    </div>
  </div>
</nav>

<script>
  const currentPage = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link');

  navLinks.forEach(link => {
    const linkPage = link.getAttribute('href');
    if (currentPage == linkPage) {
      link.classList.add('active');
    }
  });
</script>
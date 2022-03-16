<footer class="footer sticky-footer bg-dark">
  <div class="container my-auto ">
    <div class="footer__link text-white">
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <h5>Quick Links</h5>
          <ul>
            <li><a href={{ route('home') }}>Home</a></li>
            <li><a href={{ route('recipe.index') }}>Recipies</a></li>
            <li><a href={{ route('recipe.create') }}>New Recipe</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-12">
          <h5>F.A.Q.s</h5>
          <ul>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
          </ul>
        </div>
        <div class="col-md-4 col-sm-12">
          <h5>Socials</h5>
          <ul>
            <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
            <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
            <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
            <li><a href="https://github.com" target="_blank">Github</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer__copyright text-center my-auto">
      <span class="text-white">Copyright &copy; {{ config('app.name') }}, {{ Date('Y') }}</span>
    </div>
  </div>
</footer>


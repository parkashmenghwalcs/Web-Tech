// inject header and footer so all pages share the same markup
document.getElementById('headercode').innerHTML = `
  <div id="main">
    <div class="inner">
      <div class="logo">
        <a href="Index.html"><img src="./RES/logo.png" alt="Logo"></a>
      </div>

      <nav class="nav-linked" aria-label="Main navigation">
        <ul>
          <li><a href="Index.html">Home</a></li>
          <li><a href="Gallery.html">Gallery</a></li>
          <li><a href="Admission.html">Admission</a></li>
          <li><a href="Contact.html">Contact</a></li>
          <li><a href="About.html">About</a></li>
        </ul>
      </nav>
    </div>
  </div>
`;

// footer injected at end of body so it appears below page content
document.body.insertAdjacentHTML('beforeend', `
  <footer class="site-footer" role="contentinfo">
    <div class="inner">
      <div class="left">
        <p>&copy; ${new Date().getFullYear()} Your Site Name. All rights reserved.</p>
      </div>
      <div class="right">
        <p>Contact: +923243740274 &nbsp;|&nbsp; Email: info@smiucom</p>
      </div>
    </div>
  </footer>
`);

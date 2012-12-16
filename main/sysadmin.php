<?php include "includes/header.php" ?>

<h1>System Administration</h1>
<ul>
  <li>source code control system repositories:
    <ul>
      <li>Assets: <code>git://github.com/gk-turnip/assets.git</code> (image files, sound files)</li>
      <li>Server: <code>git://github.com/gk-turnip/server.git</code> (server side programs)</li>
      <li>Client: <code>git://github.com/gk-turnip/client.git</code> (client side programs</li>
      <li>Docs: <code>git://github.com/gk-turnip/docs.git</code> (documentation)</li>
      <li>Web: <code>git://github.com/gk-turnip/web.git</code> (web site)</li>
    </ul>
  </li>
  <li>setup ssh keys for easier access (don't have to type in a password all the time)</li>
  <li>future considerations
    <ul>
      <li>post-commit hooks</li>
      <li>automated nightly builds</li>
      <li>issue tracking system</li>
    </ul>
  </li>
</ul>

<p class="contributors"></p>
<p class="updated"></p>

<?php include "includes/footer.php" ?>
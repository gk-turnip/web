<?php include "includes/header.php" ?>

<h1>Technical Document</h1>

<p class="abstract">
  This is a description of the technologies and languages that are being suggested for game development.
</p>

<h2>Server Side</h2>
  <p>
    <ul>
      <li>Server side language is <a href="http://golang.org">Go</a></li>
      <li>target 100,000 simultaneous users
        <ul>
          <li>This will require splitting the game across many different servers</li>
          <li>as well as good multithreading programs within each server</li>
        </ul>
      </li>
    </ul>
  </p>
<h2>Client Side</h2>
<p>
  <ul>
    <li>HTML 5 with javascript</li>
    <li>Ajax for communications between browser and server</li>
    <li>use <a href="http://mrdoob.github.com/three.js">three.js</a> for 3d rendering</li>
    <li>target devices
      <ul>
        <li>desktop browsers (firefox, chrome, etc.)</li>
        <li>mobile browsers (Android, iPhone, etc.)</li>
        <li>hopefully html5 / javascript will be up to the task so we won't need specific client side programs</li>
      </ul>
    </li>
    <li>what will the art format be?</li>
    <li>what will the sound format be?
      <ul>
        <li>my initial toughts are <a href="http://en.wikipedia.org/wiki/Ogg">Ogg Vorbis</a> audio format</li>
      </ul>
    </li>
    <li>how many avatars will the client side handle at once in detail game view?
      <ul>
        <li>this has to be limited for two reasons:
          <ol>
            <li>too much communications between client and server resulting in lag</li>
            <li>you can't really see / control so many avatars in too small a space</li>
          </ol>
        </li>
      </ul>
    </li>
  </ul>
</p>
<p class="contributors"></p>
<p class="updated"></p>

<?php include "includes/footer.php" ?>
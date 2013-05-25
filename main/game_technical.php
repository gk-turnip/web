<?php $pageTitle = 'Technical Document' ?>

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
    <li>secure websockets for communications between browser and server</li>
    <li>target devices
      <ul>
        <li>desktop browsers (firefox, chrome, etc.)</li>
        <li>mobile browsers (Android, iPhone, etc.)</li>
        <li>hopefully html5 / javascript will be up to the task so we won't need specific client side programs</li>
      </ul>
    </li>
	<li>sound is release in both ogg and mp3</li>
	<li>art is in svg</li>
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
<p class="contributors">Turnip</p>
<p class="updated">Last updated May 2013</p>

<?php include "includes/footer.php" ?>

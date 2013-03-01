<?php $pageTitle = 'Game To Do' ?>

<?php include "includes/header.php" ?>

<h1>Game To Do</h1>
<p>
This is a breif short term to do list, mostly for myself to keep track of what I need to workon short term.</p>
<p>Turnip</p>
<br/>
<ul>
<li>add copyright text to all javascript</li>
<li>check if rain causes lag, put rain and avatar movement in same loop</li>
<li>refine movement of other player avatars</li>
<li>look into requirejs</li>
<li>look into issue tracking system (bugzilla http://www.bugzilla.org,mantis http://www.mantisbt.org)</li>
<li>add "chat" within the game server</li>
<li>update the build documentation, wws, new config.xml stuff</li>
<li>refactor the use of c_rand and m_rand into gkrand package</li>
<li>current list of bugs:</li>
<li><ul>
<li>When you change avatars, the avatar still moves back to home position instead of remaining where it was when you clicked to change.</li>
<li>There are still dandelions periodically showing up with black foliage instead of green.</li>
<li>Avatars still sometimes switch to black and white in Chrome and Chromium. create a test that does much higher rate if switch in/out of the dandelion, change dandelion colouring to determine what is causing this.</li>
<li>if you switch the avatar enough times, the game will stop responding</li>
</ul></li>

</ul>

<?php include "includes/footer.php" ?>

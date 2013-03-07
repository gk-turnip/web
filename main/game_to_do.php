<?php $pageTitle = 'Game To Do' ?>

<?php include "includes/header.php" ?>

<h1>Game To Do</h1>
<p>
This is a breif short term to do list, mostly for myself to keep track of what I need to workon short term.</p>
<p>Turnip</p>
<br/>
<ul>
<li>check if rain causes lag, put rain and avatar movement in same loop</li>
<li>look into requirejs</li>
<li>fix the rain sound</li>
<li>test lag between large and small avatar files</li>
<li>align the avatars with origin_x and origin_y</li>
<li>look into issue tracking system (bugzilla http://www.bugzilla.org,mantis http://www.mantisbt.org)</li>
<li>current list of bugs:</li>
<li><ul>
<li>When you change avatars, the avatar still moves back to home position instead of remaining where it was when you clicked to change.</li>
<li>chat needs the message and user name "json escaped"</li>
<li>fix server when websocket is trying to re-connect</li>
<li>re-direct on invalid token is not correct</li>
<li>chat needs the message cleared once sent</li>
</ul></li>

</ul>

<?php include "includes/footer.php" ?>

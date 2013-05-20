<?php $pageTitle = 'Game To Do' ?>

<?php include "includes/header.php" ?>

<h1>Game To Do</h1>
<p>
This is a breif short term to do list, mostly for myself to keep track of what I need to workon short term.</p>
<p>Turnip</p>
<br/>
<ul>
<li>test_stack_copies and test_stack_clones rotation testing</li>
<li></li>
<li>check if rain causes lag, put rain and avatar movement in same loop</li>
<li>look into requirejs</li>
<li>test lag between large and small avatar files</li>
<li>look into issue tracking system (bugzilla http://www.bugzilla.org,mantis http://www.mantisbt.org)</li>
<li>performance slow when using large number of larger terrain svg files</li>
<li>put tuffs and pebbles back</li>
<li>fix the rain sound</li>
<li>fix the rain</li>
<li>blank tile where object origin is</li>
<li>avatar is always drawn on top of objects</li>
<li>object is only drawn if the origin point is viewable</li>
<li>arrow keys cause browsers scroll if the svg area has scroll bars</li>
<li>switch right/left as avatar moves</li>
<li>place new avatar in semi-random spot to avoid them all being in the same spot during a Pod Party</li>
<li>chat user name can overflow its &lt;div&gt;</li>
<li>current list of bugs:</li>
<li><ul>
<li>When you change avatars, the avatar still moves back to home position instead of remaining where it was when you clicked to change.</li>
<li>fix server when websocket is trying to re-connect</li>
<li>re-direct on invalid token is not correct</li>
<li>server gets "messageToClient queue overflow, dropping message" on game startup sometimes, then the terrain does not show up.</li>
</ul></li>
<li>web socket library: https://github.com/garyburd/go-websocket</li>
</ul>

<?php include "includes/footer.php" ?>

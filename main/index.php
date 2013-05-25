<?php $pageTitle = 'Home' ?>

<?php include "includes/header.php" ?>

<div class="about">What is Gourdian Knot? It is a community-based, community-built, cooperative offbeat fantasy MMO.  We are still in the very early stages so have a look around, join the forum, add your suggestions, help set the direction of Gourdian Knot.</div>
<br/>
<div class="about">
A second pod party is being organized, check <a href="http://www.gourdianknot.com/main/second_pod_party.php">here</a> for details.
</div>
<div class="about">
Link to the <a href="https://www.gourdianknot.com/gk/loginServer">Game Server</a>.
</div>

<div id="blog-posts">Getting latest blog posts…</div>

<script type="text/javascript" src='http://gourdianknot.tumblr.com/api/read/json?num=5'></script>

<script type="text/javascript">

  var postHtml,
      blog,
      title,
      url,
      content;
  var postCount = 5;
  var postContainer = document.getElementById('blog-posts');

  if(typeof tumblr_api_read == "object") {
    blog = tumblr_api_read;
    postHtml = '<h1>' + tumblr_api_read.tumblelog.title + '<h1>';
    for(var i=0;i<=postCount;i++) {
      if(blog.posts[i] != null) {
        console.log(i);
        title = blog.posts[i]["regular-title"];
        url = blog.posts[i].url;
        content = blog.posts[i]["regular-body"];
		timeStamp = new Date(0);
		timeStamp.setUTCSeconds(blog.posts[i]["unix-timestamp"]);
        postHtml += '<h2><a href="'+ url +'">' + title + '</a></h2>' + content + "&nbsp;&nbsp;" + timeStamp;
      }
    }
    postContainer.innerHTML = postHtml;
  } else {
    postHtml = 'Failed to get blog posts. View Blog on <a href="http://gourdianknot.tumblr.com/">Tumblr</a>.';
    postContainer.innerHTML = postHtml;
  }
</script>

<div>
<br/>
contact:<br/><img src="http://gourdianknot.com/main/e.png"/>
</div>
<?php include "includes/footer.php" ?>

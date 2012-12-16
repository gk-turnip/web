<?php include "includes/header.php" ?>

<p>
  All content goes inside the div with the <code>content</code> class. The following style should be used:
  <pre><code>
    &lt;h1>Page Title&lt;/h1>
      &lt;p class="abstract">
        A summary of what this document is about.
      &lt;/p>

      &lt;h2>First Heading&lt;/h2>
      &lt;p>
        verything under a heading should be wrapped in a &lt;p> tag.
      &lt;/p>

      &lt;h2>Second Heading&lt;/h2>
      &lt;p>
        Some words.
        &lt;ul>
          &lt;li>A list item&lt;/li>
          &lt;li>Another&lt;/li>
        &lt;/ul>
      &lt;/p>
      &lt;p class="contributors">Anybody who contributed to the ideas that are present in this document should be listed here.&lt;/p>
      &lt;p class="updated">The time the document was last updated goes here.&lt;/p>
  </code></pre>
      </p>
      <p class="contributors"></p>
      <p class="updated">Last updated 7:30pm Dec 15, 2012 EDT</p>

<?php include "includes/footer.php" ?>
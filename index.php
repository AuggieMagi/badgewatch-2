<?php
include 'header.php';

/*
homepage area
*/
?>


<link rel='stylesheet' type='text/css' media='screen' href='css/index_style.css'>
<div class="s003" style="display: grid;">
  <div class="header">
    <h1> <img src="BadgeWatchLogo.png"></h1>
    <h2>BadgeWatch Discovery</h2>
    <p>BadgeWatch helps you see police complaints by badge number,</p>
    <p>type of complaint, and how many times they have recieved complaints.</p>
  </div>
  <form action="search.php" method="POST" class="search-box">
    <div class="inner-form">
      <div class="input-field second-wrap">
        <input id="search" name="search" type="text" placeholder="Enter Keywords?" />
      </div>
      <div class="input-field third-wrap">
        <button class="btn-search" type="submit" name="submit-search">
          <svg class="svg-inline--fa fa-search fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
            </path>
          </svg>
        </button>
      </div>
    </div>
    <td>
      <a href="https://us.openforms.com/Form/38ab03c4-c295-43f3-8692-73a723866ae4">
        <button input type="button" class="but">File Complaint</button>
      </a>
    </td>
    <button class="but">Feedback</button>
  </form>

</div>
</div>
<script src="js/extention/choices.js"></script>
<script>
  const choices = new Choices('[data-trigger]', {
    searchEnabled: false,
    itemSelectText: '',
  });
</script>
</body>

</html>
<?php include('sub_header.php'); ?>
<section>
  <div class="container">
    <!-- begin links of pages -->
    <div class="links">
      <div class="links_item main_item"><a href="index.php">All Collections</a></div>
      <div class="links_item main_item"><a href="details.php">Start Here</a></div>
      <div class="links_item"><a>Getting Started on Silvertrac Lite</a></div>
    </div>
    <!-- end links of pages -->
    <section class="more_details_panel">

      <div class="more_details_body">
        <h2>Getting Started on Silvertrac Lite</h2>
        <div class="more_details_desc">
          Silvertrac Lite is a lightweight version of our top-rated security management & reporting software.
        </div>
        <div class="avatar">
          <div class="avatar_img">
            <img src="asset/img/avatars/avatar1.png" alt="avatar">
          </div>
          <div class="avatar_info">
            <span>Updated over a week ago<br> Written by <span class="user">Casey Evans</span></span>
          </div>
        </div>
        <p class="more_details_text">Silvertrac Lite is a lightweight version of our top-rated security management &amp; reporting software. Getting started on Silvertrac Lite is simple. The videos <b>
            <a href="#" target="_blank">on this welcome page</a>
          </b> will tell you everything you need to know to start reporting.</p>
        <!-- begin youtube video link -->
        <div class="embed">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/daClgvlAL3c" allowfullscreen></iframe>
        </div>
        <!-- end youtube video link -->
        <p class="more_details_text">Want more help? This resource center has tons of videos and articles that will all show you how to get the most out of Silvertrac Lite. Keep in mind that some of the articles will be covering features only available in Silvertrac Pro. If you want more information on those features, you can <b>
            <a href="#" target="_blank">schedule a demo</a>
          </b> with one of our sales reps.</p>

      </div>

      <!-- begin feedback emojies -->
      <div class="feedback_div">
        <span>Did this answer your question?</span>
        <ul class="feedback">
          <li class="angry" title="Disappointed">
            <div>
              <svg class="eye left">
                <use xlink:href="#eye">
              </svg>
              <svg class="eye right">
                <use xlink:href="#eye">
              </svg>
              <svg class="mouth">
                <use xlink:href="#mouth">
              </svg>
            </div>
          </li>
          <li class="ok" title="Neutral face">
            <div></div>
          </li>
          <li class="happy" title="Smiley">
            <div>
              <svg class="eye left">
                <use xlink:href="#eye">
              </svg>
              <svg class="eye right">
                <use xlink:href="#eye">
              </svg>
            </div>
          </li>
        </ul>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
          <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 7 4" id="eye">
            <path d="M1,1 C1.83333333,2.16666667 2.66666667,2.75 3.5,2.75 C4.33333333,2.75 5.16666667,2.16666667 6,1"></path>
          </symbol>
          <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 7" id="mouth">
            <path d="M1,5.5 C3.66666667,2.5 6.33333333,1 9,1 C11.6666667,1 14.3333333,2.5 17,5.5"></path>
          </symbol>
        </svg>

      </div>
      <!-- end feedback emojies -->
    </section>
  </div>
</section>
<!-- begin chat area -->
<audio id="audio" src="asset/sound/notification.mp3"></audio>
<div class="chat_area">
  <div class="chat_close"><i class="bi bi-x-circle-fill"></i></div>
  <!-- messages area -->
  <div class="messages_area">
    <div class="chat_area_header">
      <h3 class="chat_title">Getting Started on Silvertrac Lite</h3>
      <h3 class="chat_desc">Silvertrac Lite is a lightweight version of our top-rated security management & reporting software.</h3>
      <div class="avatar_img">
        <img src="asset/img/avatars/avatar1.png" alt="avatar">
      </div>
      <div class="avatar_info">
        <span>Written by <span class="user">Casey Evans</span></span>
      </div>
    </div>
    <div class="intercom_msg">Sorry that didn't have the answer you needed</div>
    <div class="intercom_msg"><img src="asset/img/intercom_logo.png">If you'd like, you can ask the team for help here.<span class="chat_time">Bot ·just now</span></div>
  </div>
  <!-- messages area -->
</div>
<div class="message_form">
  <!-- emojies -->
  <div class="emoojies_list" status="0">
    <span title="bearded_person" role="button">🧔</span>
    <span title="thumbs_up" role="button">👍</span>
    <span title="-1" role="button">👎</span>
    <span title="sob" role="button">😭</span>
    <span title="confused" role="button">😕</span>
    <span title="neutral_face" role="button">😐</span>
    <span title="blush" role="button">😊</span>
    <span title="heart_eyes" role="button">😍</span>
    <span title="grinning" role="button">😀</span>
    <span title="grin" role="button">😁</span>
    <span title="joy" role="button">😂</span>
    <span title="rolling_on_the_floor_laughing" role="button">🤣</span>
    <span title="smiley" role="button">😃</span>
    <span title="smile" role="button">😄</span>
    <span title="sweat_smile" role="button">😅</span>
    <span title="laughing" role="button">😆</span>
  </div>
  <!-- emojies -->
  <textarea class="message_textarea" id="send_chat" placeholder="Write a reply…" aria-label="Write a reply…"></textarea>
  <label class="attach_file_label" for="attach_file">
    <i class="bi bi-paperclip"></i>
    <input id="attach_file" class="chat_attach_file" type="file">
  </label>
  <label class="attach_file_label" id="open_emoji_list">
    <i class="bi bi-emoji-smile"></i>
  </label>


</div>
<!-- end chat area -->
<?php include('footer.php'); ?>
<!-- Custom js file-->
<script src="asset/js/more_details.js"> </script>

</body>

</html>
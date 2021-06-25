<!--This is the form modal for Adding and Editing announcements-->
<style>
#announcementmodal .container {
  margin: 20px;
  height: 400px;
  padding: 20px;
  overflow-y: hidden;
}

#announcementForm .container {
  margin: 20px;
  height: 400px;
  padding: 20px;
  overflow-y: hidden;
}

#expandAnnouncement .container {
  margin: 20px;
  height: 50%;
  padding: 20px;
  overflow-x: hidden;
}

@media (min-width: 2560px){
  #announcementmodal .container {
    height: 580px;
    padding: 50px;
    font-size: 1.5em;
  }
}

@media screen and (max-width: 1366px) {
  #announcementmodal .modal-content {
    margin-top: -5px;
    height: 550px;
  }

  #announcementmodal .container {
    height: 510px;
    padding: 20px;
    overflow-y: auto;
  }
}
</style>


<div class = "modal" id = "announcementModal">
  <span class = "close" id="closeModalAnnouncement" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "announcementForm" method = "POST">
    <div class = "container">
      <h1 class = "modal-title">Announcement</h1>
      <div class = "form-control" id = "title_announcement">




      <input type="hidden" id = "function_announcement"name="function_announcement">
      <input type="hidden" id="announcement_id" name="announcement_id">





      <label for = "announcementTitle">Announcement Title</label>
      <input style = "width: 100%;" type = "text" id = "announcementTitle" name = "announcementTitle" placeholder = "Title..."  style = "width: 100%;">
      </div>

   	  <div class = "form-control" id = "text_div">
   	  <label for = "announcementContent">Announcement Content</label> <br>
      <textarea id="announcementContent" name="announcementContent" rows="5" cols="55" placeholder="Announcement..."></textarea>
  	  </div>

      <button type = "button" class = "modalbtn" id = "postAnnouncementBtn" style = "background-color: #850038; color: #fff;">Post</button>
      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtnAnnouncement" style = "background-color: #ccc">Cancel</button>
    </div>
  </form>
</div>

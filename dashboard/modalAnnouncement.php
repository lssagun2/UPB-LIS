<style>
#announcementmodal .container {
  margin: 20px;
  height: 400px;
  padding: 20px;
  overflow-y: hidden;
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


<div class = "modal" id = "contentModal">
   
 
  <span class = "close" id="closeModalAnnouncement" title = "Close Modal"><i class="fas fa-times"></i></span>
  <form class = "modal-content" id = "expandAnnouncement" method = "POST">
    <div class = "container">
      <h1 class = "modal-title">Announcement</h1>
      <p><b>Title:</b></p>
      <p id="announcementTitleModal"></p>
      <br> 
      <p><b>Content:</b></p> 
      <br> 

      <pre id="announcementContentModal"></pre> 


      
      <br><br>  
      <p>Posted By:</p>
      <p id="creator"> </p>
      <br>  
      <p>Time posted:</p>
      <p id="time_posted"> </p>
      <button type = "button" onclick = "$('div.modal').hide()" class = "modalbtn" id = "cancelbtnAnnouncement">Cancel</button>
    </div>
  </form>
</div>






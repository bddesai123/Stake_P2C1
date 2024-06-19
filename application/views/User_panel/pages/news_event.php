<div class="page-wrapper">
   <div class="page-content">
      <div class="user_content">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-7 col-md-12 col-sm-12">
                     <div class="recent_new">
                        <h4>Lastest News</h4>
                        <?php
                        $news_event = $this->conn->runQuery('*', 'notice_board', "status='1' order by id asc");
                        if ($news_event) {
                           foreach ($news_event as $news_event1) {
                        ?>
                              <div class="news_page">
                                 <h4><?= $news_event1->title; ?></h4>
                                 <span><?= $news_event1->added_on; ?></span>
                                 <p><?= $news_event1->description; ?></p>
                              </div>
                        <?php
                           }
                        }
                        ?>
                     </div>
                  </div>
                  <div class="col-lg-5 col-md-12 col-sm-12">
                     <div class="recent_event_deatil">
                        <h4>Recent Events</h4>
                        <div class="recent_activity">
                           <h5>About The Event
                           </h5>
                           <?php
                           $news_event = $this->conn->runQuery('*', 'notice_board', "status='1' order by id desc limit 5");
                           if ($news_event) {
                              foreach ($news_event as $news_event1) {
                           ?>
                                 <h6><strong><?= $news_event1->title; ?></strong></h6>
                                 <h6> <strong><?= $news_event1->added_on; ?></strong></h6>
                                 <p><?= $news_event1->description; ?></p>
                           <?php
                              }
                           }
                           ?>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
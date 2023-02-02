<?php require_once "header.php"; ?>
    <!-- Breadcrumb -->
    <div class="breadcrumbs overlay" id="iizt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2>Duyurular</h2>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Breadcrumb -->

               <div class="col-lg-12 col-md-12 col-12 order-md-3 order-4">
                    <section class="events section bg-transparent p-0 pr-3">
                        <div class="coming-event">
                            <?php
                            $date = date("Y-m-d",time());
                            $events = $db->read("announcements",["columns_name"=>"announcements_date","columns_sort"=>"Desc","today"=>"announcements_date","limit"=>50,"date"=>$date,"operator"=> "<="]);
                            $events=$events->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($events as $item){
                                ?>
                                <div class="col-lg-12 col-md-12 col-12">
                                <div class="single-event">
                                    <div class="event-date">
                                        <p><?=date("d",strtotime($item['announcements_date']))?><span><?=strftime("%B <br> %Y",strtotime($item['announcements_date']))?></span></p>
                                    </div>
                                    <div class="event-content">
                                        <h3 class="event-title"><?=$item['announcements_title']?></h3>
                                        <?=$item['announcements_text']?>
                                    </div>
                                </div>
                                </div>
                            <?php }?>
                        </div>
                    </section>
                </div>
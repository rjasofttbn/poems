

<!-- front end for poetry contest !-->

<link href="<?php echo base_url(); ?>/css/poems_home.css" rel="stylesheet" type="text/css"></link> 

<div id="add_up">

</div> 

<div id="add_home">
    <?php foreach ($first_add_home as $first_add_home) { ?>
        <img height="200" width="967" src="<?php echo base_url() ?><?php echo $first_add_home->home_add_image; ?>"/>
    <?php } ?>   
</div> 


<div id="new_poets_caption">
    Poem wise Most Popularity
</div>  


<!--  <div id="left">  
      <div id="caption">
          <div style="margin: 11px 0px 0px 45px; text-align: left; font-size: 21px; color:  #03579E; ;">
              <b>Poems</b>
          </div>
      </div>
      <div style=" float: left; text-align: left; height: 238px; 
           border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;
           border-width: 1px;
           border-style: solid;
           border-color: steelblue; 
           width: 261px; background-color: #D0D0D0 ; padding: 5px; margin-left: 1px; ">
                          <ul >
                              » &nbsp; <a style="color: #03579E;" title="Classical Poems" href="">Classical Poems</a><br>
                              »  &nbsp; <a style="color: #03579E;" title="Famous Poems" href="">Famous Poems</a><br>
                              »  &nbsp; <a style="color: #03579E;" title="Famous Poems" href="">Topics - Famous Poems</a><br>
                              » &nbsp;  <a style="color: #03579E;" title="Random Poem" href="">Poem of the Day</a><br>
                              » &nbsp;  <a style="color: #03579E;" title="New Poems" href="">New Poems</a><br>
                              » &nbsp;  <a style="color: #03579E;" title="Random Poem" href="">Random Poem</a><br>
                              » &nbsp;  <a style="color: #03579E;" title="Poems About" href="">Poems About</a><br>
                              » &nbsp;  <a style="color: #03579E;" title="My Poems" href="">My  Poems</a><br>
                              » &nbsp;  <a style="color: #03579E;" title="Popular Poets" href="">My Favourite Poems</a>
                          </ul>
      </div>
  </div>

 <div> <?php foreach ($home_add_small as $row) { ?>
                                      <img style="padding-top:  11px; box-shadow:0px 0px 21px 01px   gray ;  " height="250px" width="275px" src="<?php echo base_url() ?><?php echo $row->home_add_small; ?>"/> link with poems detail  !
<?php } ?>
  </div> 

</div>-->
<div id="most_popular_detail">
    <div id="banner_f">
        <div id="banner_caption">
            <div id="most_popular_poets_title">
                <b style=" float: left; font-size: 15px; text-align: left; margin: 0px 0px 0px 0px; ">Poet Name</b>  
            </div>

            <div id="most_popular_country">
                <b style=" float: left; font-size: 15px; margin: 0px 0px 0px 3px; ">Country</b>
            </div>

            <div id="most_popular_poem">
                <b style="float: left; font-size: 15px; text-align: left;  ">Poem</b>
            </div>

            <div id="most_popular_poetstitle">
                <b style=" float: left; font-size: 15px; margin: 0px 0px 0px 3px; ">Popularity</b>
            </div>
<!--date('j- F- y');-->
            <div id="most_popular_meter">
                <b style="float: left; text-align: left; margin: 0px 0px 0px 0px;  font: 13px/15px sans-serif; color:royalblue; font-weight: normal;">[ <?php echo date('d/m/y', strtotime('today - 30 days')) ?> ---» <?php echo date('d/m/y'); ?> ]</b>
            </div>
        </div>
    </div>      
    <?php if (count($row) > 0) { ?>

        <?php
        $i = $this->uri->segment(3);
        if ($i == NULL) {
            $i = 0;
        }
        foreach ($poem_wise_most_popular_poet as $row) {
            $i++;
            ?>


            <div id="most_popular_poets">

                <div id="most_popular_poets_font">
                    <div style="float:left; text-align: left; font: 13px/18px sans-serif;  color:royalblue; font-weight:  bold; width: 25px; margin:0px 0px 0px 3px ;"><?php echo $i; ?>.</div>
                    <div style="float: left; text-align: left; color:#333; font: 13px/17px sans-serif; width:  210px; margin:0px 0px 0px 11px ;">
                        <?php echo $row->name; ?>
                    </div>

                    <div style="float: left; height: auto; text-align: left; color:#333; font: 13px/17px sans-serif; width:  170px; margin:  0px 4px 0px 5px;">
                        <?php echo $row->country; ?>
                    </div>

                    <div style="float: left; color: #333; font: 11px/13px; font-size: 14px; width: 200px; margin:0px 0px 0px 15px; ">
                        <?php echo $row->title; ?>
                    </div>

                    <div style=" float: left; text-align:justify; color:#333;  width:  50px; margin:  0px 0px 0px 7px;">
                        <?php echo $row->read_value; ?>
                    </div>

                    <div style="float: left; height: 19px; width: 209px;  margin:  0px 0px 0px 40px;" >

                        <meter value="<?php echo $row->read_value; ?>"  min="1" max="500" style="  margin:  0px 0px 0px 39px; width: 180px; color:gray;"></meter><br>
                        <!--<meter value=".5">50%</meter>-->

                <!--<progress value="<?php echo $row->read_value; ?>" min="1" max="500">
                </progress>-->
                    </div>
                </div>

            </div>

        <?php } ?>
    <?php } ?>
</div>



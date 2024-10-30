<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;

$frmvid =  $atts['id'];


?>
<style>
        #mychaktratest label{
            cursor: pointer;
        }
        .insidechakra1, .insidechakra2,.insidechakra3,.insidechakra4,.insidechakra5,.insidechakra6,.insidechakra7,.insidechakra8 {
            text-align: center;
        }
        .insidechakra1 input,.insidechakra2 input,.insidechakra3 input,.insidechakra4 input,.insidechakra5 input,.insidechakra6 input,.insidechakra7 input,.insidechakra8 input {
            width: 25px;
            height: 25px;
        }
        .combibginputlabel {
            line-height: 59px;
            align-items: center;
            display: flex;
            justify-content: center;
            border: 2px solid #000;
            width: fit-content;
            margin: auto;
            padding: 20px;
            border-radius: 20px;
            margin-bottom: 20px;
        }
        .insidechakra2, .insidechakra3, .insidechakra4, .insidechakra5, .insidechakra6, .insidechakra7,.insidechakra8{
            display: none;
        }
        #mychkmaincont .chk_btn {
            margin-top: 30px;
            border-radius: 8px;
            background: deepskyblue;
            border: none;
            font-size: 16px;
            color: #fff;
            padding: 15px 20px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            text-decoration:none;
        }
        #mychkmaincont .chk_btn:focus {
            background: deepskyblue;
        }
        .chakra-chart {
            width: 100%;
            height: 300px;
            padding: 20px;
            display: inline-block;
            flex-direction: column-reverse;
            background: rgb(250 235 215 / 72%);
            margin-top:50px;
        }
        .chakra-chart span {
            display: inline-block;
        }
        .chakra-chart span:nth-child(1) {
            width: 4%;
            height: 0%;
            background: #ef2523;
            position: relative;
        }
        .chakra-chart span:nth-child(2) {
            width: 4%;
            height: 0%;
            background: #fb8e19;
            position: relative;
            left:10%;
        }
        .chakra-chart span:nth-child(3) {
            width: 4%;
            height: 0%;
            background: #fbbd14;
            position: relative;
            left:19%;
        }
        .chakra-chart span:nth-child(4) {
            width: 4%;
            height: 0%;
            background: #25b754;
            position: relative;
            left:28%;
        }
        .chakra-chart span:nth-child(5) {
            width: 4%;
            height: 0%;
            background: #3f83c4;
            position: relative;
            left:36%;
        }
        .chakra-chart span:nth-child(6) {
            width: 4%;
            height: 0%;
            background: #6455a6;
            position: relative;
            left:45%;
        }
        .chakra-chart span:nth-child(7) {
            width: 4%;
            height: 0%;
            background: #9158a7;
            position: relative;
            left:53%;
        }
        .chakra-chart span:nth-child(8) {
            width: 4%;
            height: 0%;
            position: relative;
            background:#8a999c;
            left:61%;
        }
        .chakra-chart2 {
            background: rgb(196 206 208 / 60%);
            width: 100%;
            height: 155px;
        }
        #mychkmaincont .chakra-chart2 p {
            display: table;
            width: 10%;
            margin: 1.2%;
            float: left;
            height: 133px;
            font-size:16px;
        }

        .chakra-chart, .chakra-chart2, .chakra-chart-next{
            display: none;
        }
        .chakra-chart-next{
            margin: auto;
            width: 100%;
        }
        .chakra-chart span:before {
            content: attr(data-before);
            position: absolute;
            left: 0px;
            top: -36px;
            font-weight: bold;
            background: aliceblue;
            padding: 5px 10px;
            border-radius: 8px;
            font-size:12px;
        }
        .bar-chart{
            display: none;
            background: conic-gradient(#ef2523 0%, #fb8e19 0 0%, #fbbd14 0 0%,#25b754 0 0%,#3f83c4 0 0%,#6455a6 0 0%,#9158a7 0 0%,#8a999c 0);
            border-radius: 50%;
            width: 35%;
            height: 0;
            padding-top: 35%;
            float: left;
            padding-right: 20px;
        }
        .baroutsidechart{
            margin-left:39%
        }
        #mychkmaincont{
            width:100%;
            max-width:100%;
        }
        #mychkmaincont h3{
            font-size:32px;
        }
        #mychkmaincont p{
            font-size:20px;
        }
        #mychkmaincont form#myForm label {
            margin-right: 10px;
            line-height: 0px;
            margin-top: 9px;
        }


</style>
    <div id="mychkmaincont">
    <?php 
        $chkget1 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_group ORDER BY position ASC", OBJECT );

    ?>
    <div class="chakra-chart">
    <?php
        if(!empty($chkget1)){

            foreach ($chkget1 as $key1 => $value1) {
                echo '<span style="height:0%;"></span>';
            }
        }
    ?>
        <span style="height:100%;opacity:0; "></span>
    </div>

    <div class="chakra-chart2">
    <?php
        if(!empty($chkget1)){

            foreach ($chkget1 as $key1 => $value1) {
                ?>
                    <p><?php esc_html_e($chkget1[$key1]->chakra_group);?>"</p>
                <?php
            }
        }
    ?>
        <div class="baroutsidechart"><div class="bar-chart"></div></div>
    </div>

    <form id="myForm">

    <?php 
    if(!empty($chkget1)){

        foreach ($chkget1 as $key1 => $value1) {
            ?>
                <div class='insidechakra<?php esc_html_e(($key1+1));?>'>
                <div class='group_chk'><h3><?php esc_html_e($chkget1[$key1]->chakra_group);?></h3>
            <?php
            $chkget2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_questions WHERE chk_group='".$chkget1[$key1]->position."' ORDER BY position ASC", OBJECT );
            
            if(!empty($chkget2)){

                foreach ($chkget2 as $key2 => $value2) {
                    ?>
                    <p><?php esc_html_e(($key2+1));?>. <?php esc_html_e($chkget2[$key2]->chk_question_name);?> </p>
                    <?php
                    $chkget3 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_options WHERE chakra_group_position='".$chkget2[$key2]->chk_group."' && chk_question_position='".$chkget2[$key2]->position."' ORDER BY chakra_position ASC", OBJECT );
            
                    if(!empty($chkget3)){
                        echo '<div class="combibginputlabel">';
                        foreach ($chkget3 as $key3 => $value3) {
                            ?>
                                <input type="radio" name="chakra_<?php esc_html_e($chkget3[$key3]->chakra_group_position).''.esc_html_e($chkget3[$key3]->chk_question_position);?>" value="<?php esc_html_e($chkget3[$key3]->chakra_value);?>" id=""> <label for=""><?php esc_html_e($chkget3[$key3]->chakra_option);?></label>
                            <?php
                        }
                        echo '</div>';
                    }

                }
                echo "</div>";
            }
            ?>
            <a id="submit_chk_btn<?php esc_html_e(($key1+1));?>" href="javascript:void(0)" class="chk_btn">Submit</a></div>
            <?php
        }
    }
    ?>



    </form>

    <div class="chakra-chart-next">
        <center>
        <a class="chk_btn" href="javascript:void(0)" id="chakra-retest">Re-Test</a>
        <a class="chk_btn" href="javascript:void(0)" id="chakra-next">Next Chakra</a>
        </center>        
    </div>


    </div>
    
    <script>
        var chk_test_1 = chk_test_2 = chk_test_3 = chk_test_4 = chk_test_5 = chk_test_6 = chk_test_7 = chk_test_8 = 0;
        var chk_test_2_1 = chk_test_2_2 = chk_test_2_3 = chk_test_2_4 = chk_test_2_5 = chk_test_2_6 = chk_test_2_7 = chk_test_2_8 = 0;
       
        var total_chk_test_1 = total_chk_test_2 = total_chk_test_3 = total_chk_test_4 = total_chk_test_5 = total_chk_test_6 = total_chk_test_7 = total_chk_test_8 = 0;
        var totalgraph1 = totalgraph2 = totalgraph3 = totalgraph4 = totalgraph5 = totalgraph6 = totalgraph7 = totalgraph8 = 0;
        var chakra_test_position = 0;
        var chakra_totalget = 0;
        var hidebtnon = 0;
    </script>
        <?php 
        if(!empty($chkget1)){
            ?>
                <script>jQuery('#myForm input').on('change', function() {
            <?php
            foreach ($chkget1 as $key1 => $value1) {
                $chkget2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_questions WHERE chk_group='".$chkget1[$key1]->position."' ORDER BY position ASC", OBJECT );
                
                if(!empty($chkget2)){
                    ?>
                        total_chk_test_<?php esc_html_e(($key1+1));?> = 
                    <?php
                    $tt1 = 0;
                    foreach ($chkget2 as $key2 => $value2) {
                        $chkget3 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_options WHERE chakra_group_position='".$chkget2[$key2]->chk_group."' && chk_question_position='".$chkget2[$key2]->position."' ORDER BY chakra_position ASC", OBJECT );
                        if(!empty($chkget3)){
                            $goc = 1;
                            foreach ($chkget3 as $key3 => $value3) {
                                if($goc==1){
                                    ?>
                                        parseInt(jQuery('input[name=chakra_<?php esc_html_e($chkget3[$key3]->chakra_group_position)."".esc_html_e($chkget3[$key3]->chk_question_position);?>]:checked', '#myForm').val()==undefined?0:jQuery('input[name=chakra_<?php esc_html_e($chkget3[$key3]->chakra_group_position)."".esc_html_e($chkget3[$key3]->chk_question_position);?>]:checked', '#myForm').val())+
                                    <?php
                                }
                                $goc++;
                                $tt1++;
                            }
                        }
                        
                    }           
                    ?>
                        0; chakra_totalget=<?php esc_html_e($tt1);?>; totalgraph<?php esc_html_e(($key1+1));?> = (100/chakra_totalget)*total_chk_test_<?php esc_html_e(($key1+1));?>;
                    <?php
                }
            }
            ?>
               hidebtnon=parseInt('<?php esc_html_e(count($chkget1));?>'); });</script>
            <?php
        }
        ?>
<script>
 jQuery('#submit_chk_btn1').click(function(){
        
        jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");


        jQuery('.insidechakra1').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        jQuery('.chakra-chart-next').css('display','inline-block');
        chakra_test_position = 1;

        if(hidebtnon==1){
            $('#chakra-next').hide();
        }

});
console.log(hidebtnon);
jQuery('#submit_chk_btn2').click(function(){
    
        jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
        jQuery('.insidechakra2').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        jQuery('.chakra-chart-next').css('display','inline-block');
        chakra_test_position = 2;
        
        if(hidebtnon==2){
            jQuery('#chakra-next').hide();
        }


});

jQuery('#submit_chk_btn3').click(function(){
    
    jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
    jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
    jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
    jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
    jQuery('.chakra-chart span').eq(2).css('height',totalgraph3+"%");
    jQuery('.chakra-chart span').eq(2).attr('data-before',totalgraph3+"%");
    jQuery('.insidechakra3').hide();
    jQuery('.chakra-chart').show();
    jQuery('.chakra-chart2').show();
    jQuery('.chakra-chart-next').css('display','inline-block');
    chakra_test_position = 3;

    if(hidebtnon==3){
            $('#chakra-next').hide();
        }


});

jQuery('#submit_chk_btn4').click(function(){
        
        jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(2).css('height',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(2).attr('data-before',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(3).css('height',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(3).attr('data-before',totalgraph4+"%");
        jQuery('.insidechakra4').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        jQuery('.chakra-chart-next').css('display','inline-block');
        chakra_test_position = 4;
        
        if(hidebtnon==4){
            $('#chakra-next').hide();
        }
});

jQuery('#submit_chk_btn5').click(function(){
        
    jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(2).css('height',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(2).attr('data-before',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(3).css('height',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(3).attr('data-before',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(4).css('height',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(4).attr('data-before',totalgraph5+"%");
        jQuery('.insidechakra5').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        jQuery('.chakra-chart-next').css('display','inline-block');
        chakra_test_position = 5;
        if(hidebtnon==5){
            $('#chakra-next').hide();
        }
});

jQuery('#submit_chk_btn6').click(function(){
        
    jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(2).css('height',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(2).attr('data-before',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(3).css('height',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(3).attr('data-before',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(4).css('height',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(4).attr('data-before',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(5).css('height',totalgraph6+"%");
        jQuery('.chakra-chart span').eq(5).attr('data-before',totalgraph6+"%");
        jQuery('.insidechakra6').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        jQuery('.chakra-chart-next').css('display','inline-block');
        chakra_test_position = 6;
        if(hidebtnon==6){
            $('#chakra-next').hide();
        }
});

jQuery('#submit_chk_btn7').click(function(){
        
    jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(2).css('height',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(2).attr('data-before',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(3).css('height',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(3).attr('data-before',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(4).css('height',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(4).attr('data-before',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(5).css('height',totalgraph6+"%");
        jQuery('.chakra-chart span').eq(5).attr('data-before',totalgraph6+"%");
        jQuery('.chakra-chart span').eq(6).css('height',totalgraph7+"%");
        jQuery('.chakra-chart span').eq(6).attr('data-before',totalgraph7+"%");
        jQuery('.insidechakra7').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        jQuery('.chakra-chart-next').css('display','inline-block');
        chakra_test_position = 7;
        if(hidebtnon==7){
            $('#chakra-next').hide();
        }
});

jQuery('#submit_chk_btn8').click(function(){
        
    jQuery('.chakra-chart span').eq(0).css('height',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(0).attr('data-before',totalgraph1+"%");
        jQuery('.chakra-chart span').eq(1).css('height',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(1).attr('data-before',totalgraph2+"%");
        jQuery('.chakra-chart span').eq(2).css('height',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(2).attr('data-before',totalgraph3+"%");
        jQuery('.chakra-chart span').eq(3).css('height',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(3).attr('data-before',totalgraph4+"%");
        jQuery('.chakra-chart span').eq(4).css('height',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(4).attr('data-before',totalgraph5+"%");
        jQuery('.chakra-chart span').eq(5).css('height',totalgraph6+"%");
        jQuery('.chakra-chart span').eq(5).attr('data-before',totalgraph6+"%");
        jQuery('.chakra-chart span').eq(6).css('height',totalgraph7+"%");
        jQuery('.chakra-chart span').eq(6).attr('data-before',totalgraph7+"%");
        jQuery('.chakra-chart span').eq(7).css('height',totalgraph8+"%");
        jQuery('.chakra-chart span').eq(7).attr('data-before',totalgraph8+"%");
        jQuery('.insidechakra8').hide();
        jQuery('.chakra-chart').show();
        jQuery('.chakra-chart2').show();
        // jQuery('.chakra-chart-next').css('display','inline-block');
        // chakra_test_position = 8;

        jQuery('.bar-chart').css('background',"conic-gradient(#ef2523 "+(totalgraph1/8)+"%, #fb8e19 0 "+(totalgraph2/8+(12.5*2))+"%, #fbbd14 0 "+(totalgraph3/8+(12.5*3))+"%,#25b754 0 "+(totalgraph4/8+(12.5*4))+"%,#3f83c4 0 "+(totalgraph5/8+(12.5*5))+"%,#6455a6 0 "+(totalgraph6/8+(12.5*6))+"%,#9158a7 0 "+(totalgraph7/8+(12.5*7))+"%,#8a999c "+(totalgraph8/8+(12.5*8))+"%)");

        jQuery('.bar-chart').show();


});
    
jQuery('#chakra-next').click(function(){

    if(chakra_test_position==1){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra2').show();
    }else if(chakra_test_position==2){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra3').show();
    }else if(chakra_test_position==3){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra4').show();
    }else if(chakra_test_position==4){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra5').show();
    }else if(chakra_test_position==5){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra6').show();
    }else if(chakra_test_position==6){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra7').show();
    }else if(chakra_test_position==7){
        jQuery('.chakra-chart').hide();
        jQuery('.chakra-chart2').hide();
        jQuery('.chakra-chart-next').hide();
        jQuery('.insidechakra8').show();
    }
    
});


jQuery('#chakra-retest').click(function(){

    if(confirm('Are you sure! Your data will be lost.')){
        window.location.reload();
    }

});

</script>
<?php
defined('ABSPATH') || die("Nice try");
global $wpdb;

?>

<div class="wrap" id="chakra-structure">
    <div>

        <p >Your Shortcode: <input type="text" value="[chakra]"> | Default chakra: <a href="https://onlinetool24.co.in/chakra-test/" target="_blank">View</a></p>
        <p>Want to create more chakra test, Get customer details, analytics and much more. Just purchase the premium plugin and enjoy the Full benefits. <a href="https://onlinetool24.co.in/chakra-test/plugin/" target="_blank" class="button">Get Premium</a></p>
        <p>Note: Make 7 or 8 Chakra for best result.</p>
        <p>Note: If you have any suggestion or any query just email us at vforminfo@gmail.com</p>
        <p>Trouble Creating Chakra Test just watch some useful tutorial here: <a href="https://onlinetool24.co.in/chakra-test/plugin/" target="_blank" class="button">View tutorial</a></p>
        <div class="add-chakra-group">
        <div class="button active" id="chk_first_question">Add Question Group</div>
        <div class="button" id="chk_second_question">Add Question</div>
        <div class="button" id="chk_third_question">Add Question Input</div>
            <form action="javascript:void(0)" id="savechkdataform">
                <?php wp_nonce_field('mycustomchakrasave','chk-nonce'); ?>

                <h3 class="chk_qustion_h3">Add Question Group</h3>

                <p class="show-group-first">Question group</p>
                <select name="chakraoption" id="" class="show-group-first">
                    <?php
                    $chkshow1 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_group ORDER BY position ASC", OBJECT );
                    foreach ($chkshow1 as $key0 => $value0) {
                        $data1 = '';
                        $dataid = '';
                        $chkinside1 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_questions WHERE chk_group='".$chkshow1[$key0]->position."' ORDER BY position ASC", OBJECT );
                        foreach ($chkinside1 as $keyinside1 => $valueinside1) {
                            $data1.=$chkinside1[$keyinside1]->position.',';
                            $dataid.=$chkinside1[$keyinside1]->id.',';
                        }
                        ?>
                            <option value='<?php esc_html_e($chkshow1[$key0]->position); ?>' data-qid='<?php esc_html_e($dataid); ?>' data-position='<?php esc_html_e($data1); ?>' data-id='<?php esc_html_e($chkshow1[$key0]->id); ?>'><?php esc_html_e($chkshow1[$key0]->chakra_group); ?></option>
                        <?php
                    }
                    ?>
                </select>

                <p class="show-group-second">Main Question</p>
                <select name="chakraoptionmain" id="" class="show-group-second">
                    <?php
                    $chkshow2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_questions ORDER BY position ASC", OBJECT );
                    foreach ($chkshow2 as $key1 => $value1) {
                        $data2 = '';
                        $datachkvl = '';
                        $chkinside2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_options WHERE chakra_group_position='".$chkshow2[$key1]->chk_group."' && chk_question_position='".$chkshow2[$key1]->position."' ORDER BY chakra_position ASC", OBJECT );
                        foreach ($chkinside2 as $keyinside2 => $valueinside2) {
                            $data2.=$chkinside2[$keyinside2]->chakra_position.',';
                            $datachkvl.= $chkinside2[$keyinside2]->chakra_value.",";
                        }
                        ?>
                            <option data-chkvalue='<?php esc_html_e($datachkvl);?>' value='<?php esc_html_e($chkshow2[$key1]->position);?>' data-position='<?php esc_html_e($data2);?>' data-id='<?php esc_html_e($chkshow2[$key1]->id);?>'><?php esc_html_e($chkshow2[$key1]->chk_question_name);?></option>
                        <?php
                    }
                    ?>
                </select>

                <p class="add-group-first">Add Your Chakra Ex: CHAKRA ONE: EARTH, SECURITY, SURVIVAL, GROUNDING</p>
                <input type="text" placeholder="Your chakra name here..." class="add-group-first-inp" name="firstinput">

                <p class="add-group-third">Value (It means the value you field have like 1,2,3) It help to build percentage and chart.</p>
                <input type="number" placeholder="like 1,2,3" class="add-group-third" name="chakra_value">
                <p class="chk_for_forth"></p>
                
                <p class="add-group-second">Position (It means the position you want like 1,2,3</p>
                <input type="number" placeholder="like 1,2,3" class="add-group-second-inp" name="secondinput">
                <p class="chk_for_first">Position Previously used
                <?php
                    $chkpos1 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_group ORDER BY position ASC", OBJECT );
                    
                    foreach ($chkpos1 as $key1 => $value1) {
                        ?>
                            <span><?php esc_html_e($chkpos1[$key1]->position);?></span>
                        <?php
                    }
                ?>
                </p>
                <p class="chk_for_second"></p>
                <p class="chk_for_third"></p>
                <p>Note: For a better arrangement don't use previously position again.</p>

                <div class="button" id="chk_final_add">Add Now</div>
            </form>

            <div>
                <p><b>Additional Info:</b></p>
                <p>->Score 1 point for answers in  column one, 2 points for column two, 3 points for column three, and 4 points for column four. </p>
                <p>->Add up the points for each chakra before proceeding to the next one, and  compare your totals.</p>
                <p>->The higher the number, the healthier the chakra. </p>
            </div>
        </div>

    </div>
    <div id="add-chakra-parts">
        <div class="outside_div_chakra">
            
            <?php

                $chkget1 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_group ORDER BY position ASC", OBJECT );
                if(!empty($chkget1)){

                    foreach ($chkget1 as $key1 => $value1) {
                        ?>
                            <div class='group_chk'><h3><?php esc_html_e($chkget1[$key1]->chakra_group);?> <a href='javascript:void(0)' class='qgroup_editmychakra' data-id='<?php esc_html_e($chkget1[$key1]->id);?>'>Edit</a> <a href='javascript:void(0)' class='qgroup_deletemychakra' data-id='<?php esc_html_e($chkget1[$key1]->id)?>'>Delete</a></h3>

                        <?php
                        $chkget2 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_questions WHERE chk_group='".$chkget1[$key1]->position."' ORDER BY position ASC", OBJECT );
                        
                        if(!empty($chkget2)){

                            foreach ($chkget2 as $key2 => $value2) {
                                ?>
                                <p><?php esc_html_e(($key2+1));?>. <?php esc_html_e($chkget2[$key2]->chk_question_name);?> <a href='javascript:void(0)' class='addq_editmychakra' data-id='<?php esc_html_e($chkget2[$key2]->id);?>'>Edit</a> <a href='javascript:void(0)' class='addq_deletemychakra' data-id='<?php esc_html_e($chkget2[$key2]->id);?>'>Delete</a></p>
                                <?php 

                                $chkget3 = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}chakratest_options WHERE chakra_group_position='".$chkget2[$key2]->chk_group."' && chk_question_position='".$chkget2[$key2]->position."' ORDER BY chakra_position ASC", OBJECT );
                        
                                if(!empty($chkget3)){

                                    foreach ($chkget3 as $key3 => $value3) {
                                        ?>

                                            <input type="radio" name="chakra_<?php esc_html_e($chkget3[$key3]->chakra_group_position).''.esc_html_e($chkget3[$key3]->chk_question_position);?>" value="<?php esc_html_e($chkget3[$key3]->chakra_value);?>" id=""> <label for=""><?php esc_html_e($chkget3[$key3]->chakra_option);?> <small>(Value is: <?php esc_html_e($chkget3[$key3]->chakra_value);?>)</small></label>

                                            <a href='javascript:void(0)' class='qinp_editmychakra' data-id='".esc_html_e($chkget3[$key3]->id)."'>Edit</a> <a href='javascript:void(0)' class='qinp_deletemychakra' data-id='".esc_html_e($chkget3[$key3]->id)."'>Delete</a>

                                        <?php 
                                    }
                                }

                            }
                        }
                        
                        echo "<p class='chk_helptool'>Hover here to see the Edit Delete options</p></div>";
                    }
                }
            ?>


        </div>

    </div>
</div>

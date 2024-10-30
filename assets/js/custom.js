jQuery(function($){

    var chakra_group = "Add Your Chakra Ex: CHAKRA ONE: EARTH, SECURITY, SURVIVAL, GROUNDING";
    var chakra_group_placeholder = "Your Chakra Name here..."
    var chakra_question = "Add Your Chakra Question Heading Ex: How often do you take walks in nature, woods, parks, etc."
    var chakra_question_placeholder = "Your Chakra Question here..."
    var chakra_radio_name = "Add Your Chakra Select Value Ex: Never, Seldom, Often, Always";
    var chakra_radio_placeholder = "Your Chakra input name here...";

    var Whichquestionbtn = 1;
    
    $('#chk_first_question').click(function(){
      
      $('.add-group-first').text(chakra_group);
      $('.add-group-first-inp').attr('placeholder',chakra_group_placeholder);
      Whichquestionbtn = 1;
      $('.show-group-first').hide();
      $('.show-group-second').hide();
      $('.add-group-third').hide();
      $('.chk_qustion_h3').text('Add Question Group');
      $('.chk_for_first').show();
      $('.chk_for_second').hide();
      $('.chk_for_third').hide();
      $('.chk_for_forth').hide();

      $('#chk_first_question').addClass('active');
      $('#chk_second_question').removeClass('active');
      $('#chk_third_question').removeClass('active');
    });
    
    $('#chk_second_question').click(function(){
      
      $('.add-group-first').text(chakra_question);
      $('.add-group-first-inp').attr('placeholder',chakra_question_placeholder);
      Whichquestionbtn = 2;
      $('.show-group-first').show();
      $('.show-group-second').hide();
      $('.add-group-third').hide();
      $('.chk_qustion_h3').text('Add Question');
      $('.chk_for_first').hide();
      $('.chk_for_second').show();
      $('.chk_for_third').hide();
      $('.chk_for_forth').hide();

      $('#chk_first_question').removeClass('active');
      $('#chk_second_question').addClass('active');
      $('#chk_third_question').removeClass('active');

    });

    $('#chk_third_question').click(function(){

      $('.add-group-first').text(chakra_radio_name);
      $('.add-group-first-inp').attr('placeholder',chakra_radio_placeholder);
      Whichquestionbtn = 3;
      $('.show-group-first').show();
      $('.show-group-second').show();
      $('.add-group-third').show();
      $('.chk_qustion_h3').text('Add Question Input');
      $('.chk_for_first').hide();
      $('.chk_for_second').hide();
      $('.chk_for_third').show();
      $('.chk_for_forth').show();

      $('#chk_first_question').removeClass('active');
      $('#chk_second_question').removeClass('active');
      $('#chk_third_question').addClass('active');

    });


     $('#chk_final_add').click(function(){
        var chk_a = $('.add-group-first-inp').val();
        var chk_b = $('.add-group-second-inp').val();
        if(chk_a!='' && chk_b!=''){

          if(Whichquestionbtn==1){

            var postdata = "action=chkgroupadd&param=save_vfchakratest&"+$('#savechkdataform').serialize();
            jQuery.post(ajax_object,postdata,function(response){

              var data = jQuery.parseJSON(response);
              if(data.status==1){
              // console.log(response);
              alert('Group Added');
                location.reload();
              }else{
                alert('!Oops Something went Wrong.');
              }
            });


          }else if(Whichquestionbtn==2){
              var postdata = "action=chkgroupadd&param=save_vfchakratestquestion&"+$('#savechkdataform').serialize();
              jQuery.post(ajax_object,postdata,function(response){

                var data = jQuery.parseJSON(response);
                if(data.status==1){
                alert('Question Added');
                  location.reload();
                }else{
                  alert('!Oops Something went Wrong.');
                }
              });
          }else if(Whichquestionbtn==3){
            var postdata = "action=chkgroupadd&param=save_vfchakratestquestionmain&"+$('#savechkdataform').serialize();
            jQuery.post(ajax_object,postdata,function(response){

              var data = jQuery.parseJSON(response);
              if(data.status==1){
              alert('Input Question Added');
                location.reload();
              }else{
                alert('!Oops Something went Wrong.');
              }
            });
        }

          // ifend
        }else{
          alert('Both Fields are required.')
        }
     }); 

     var vl =  $('[name="chakraoption"]').find(':selected').data('id');
     $('.chk_for_second').html('Position Previously used ');
     var boxarr = $('[name="chakraoption"] [data-id="'+vl+'"]').data('position');
     var boxarr2 = boxarr.split(',');
     boxarr2.forEach(element => {
       if(element!=''){
         $('.chk_for_second').append('<span>'+element+'</span>');
       }
     });
   
   $('[name="chakraoption"]').change(function(){
      var vl = $(this).find(':selected').data('id');
      $('.chk_for_second').html('Position Previously used ');
      var boxarr = $('[name="chakraoption"] [data-id="'+vl+'"]').data('position');
      var boxarr2 = boxarr.split(',');
      boxarr2.forEach(element => {
        if(element!=''){
          $('.chk_for_second').append('<span>'+element+'</span>');
        }
      });
   });

   var vl2 = $('[name="chakraoptionmain"]').find(':selected').data('id');
    $('.chk_for_third').html('Position Previously used ');
    var boxarr2 = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('position');
    var boxarr22 = boxarr2.split(',');
    boxarr22.forEach(element2 => {
      if(element2!=''){
        $('.chk_for_third').append('<span>'+element2+'</span>');
      }
    });

    $('.chk_for_forth').html('Value Previously used ');
    var boxarr2b = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('chkvalue');
    var boxarr22b = boxarr2b.split(',');
    boxarr22b.forEach(element2b => {
      if(element2b!=''){
        $('.chk_for_forth').append('<span>'+element2b+'</span>');
      }
    });

   $('[name="chakraoptionmain"]').change(function(){
      var vl2 = $(this).find(':selected').data('id')
        $('.chk_for_third').html('Position Previously used ');
        var boxarr2 = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('position');
        var boxarr22 = boxarr2.split(',');
      boxarr22.forEach(element2 => {
        if(element2!=''){
          $('.chk_for_third').append('<span>'+element2+'</span>');
        }
      });
        
      $('.chk_for_forth').html('Value Previously used ');
        var boxarr2a = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('chkvalue');
        var boxarr22a = boxarr2a.split(',');
        boxarr22a.forEach(element2a => {
        if(element2a!=''){
          $('.chk_for_forth').append('<span>'+element2a+'</span>');
        }
      });

    });

    $('.qgroup_editmychakra').click(function(){
      var mnid = $(this).data('id');
      var getnewvalue = prompt('Enter your New text here');
      var getnewvalue2 = prompt('Enter your New Position here. If you do not want to change leave it blank.');
          var postdata = "action=chkgroupedit&param=editgroup_vfchakratest&id="+mnid+"&update="+getnewvalue+"&position="+getnewvalue2;
          jQuery.post(ajax_object,postdata,function(response){

            var data = jQuery.parseJSON(response);
            if(data.status==1){
            alert('Group updated');
              location.reload();
            }else{
              alert('!Oops Something went Wrong.');
            }
          });

    });

    $('.addq_editmychakra').click(function(){
      var mnid = $(this).data('id');
      var getnewvalue = prompt('Enter your New text here');
      var getnewvalue2 = prompt('Enter your New Position here. If you do not want to change leave it blank.');
          var postdata = "action=chkgroupedit&param=editquestion_vfchakratest&id="+mnid+"&update="+getnewvalue+"&position="+getnewvalue2;
          jQuery.post(ajax_object,postdata,function(response){

            var data = jQuery.parseJSON(response);
            if(data.status==1){
            alert('Question updated');
              location.reload();
            }else{
              alert('!Oops Something went Wrong.');
            }
          });

    });

    $('.qinp_editmychakra').click(function(){
      var mnid = $(this).data('id');
      var getnewvalue = prompt('Enter your New text here');
      var getnewvalue2 = prompt('Enter your New Position here. If you do not want to change leave it blank.');
          var postdata = "action=chkgroupedit&param=editoption_vfchakratest&id="+mnid+"&update="+getnewvalue+"&position="+getnewvalue2;
          jQuery.post(ajax_object,postdata,function(response){

            var data = jQuery.parseJSON(response);
            if(data.status==1){
            alert('Question input updated');
              location.reload();
            }else{
              alert('!Oops Something went Wrong.');
            }
          });

    });

    $('.qgroup_deletemychakra').click(function(){
      var mnid = $(this).data('id');
        if(confirm('Are you sure. All data will be lost.')){
          var postdata = "action=chkgroupdelete&param=deletegroup_vfchakratest&id="+mnid;
          jQuery.post(ajax_object,postdata,function(response){
            
            var data = jQuery.parseJSON(response);
            if(data.status==1){
              alert('Question Group Deleted');
              location.reload();
            }else{
              alert('!Oops Something went Wrong.');
            }
          });
        }

    });

    $('.addq_deletemychakra').click(function(){
      var mnid = $(this).data('id');
        if(confirm('Are you sure. All data will be lost.')){
          var postdata = "action=chkgroupdelete&param=deletequestion_vfchakratest&id="+mnid;
          jQuery.post(ajax_object,postdata,function(response){
            
            var data = jQuery.parseJSON(response);
            if(data.status==1){
              alert('Question Deleted');
              location.reload();
            }else{
              alert('!Oops Something went Wrong.');
            }
          });
        }

    });

    $('.qinp_deletemychakra').click(function(){
      var mnid = $(this).data('id');
        if(confirm('Are you sure. All data will be lost.')){
          var postdata = "action=chkgroupdelete&param=deletequestioninp_vfchakratest&id="+mnid;
          jQuery.post(ajax_object,postdata,function(response){
            
            var data = jQuery.parseJSON(response);
            if(data.status==1){
              alert('Question Deleted');
              location.reload();
            }else{
              alert('!Oops Something went Wrong.');
            }
          });
        }

    });
    
    $('[name="chakraoption"]').change(function(){
      var vl11 = $(this).find(':selected').data('qid');
      var boxar1 = vl11.split(',');
      $('[name="chakraoptionmain"] option').each(function(){
          $(this).hide();
      });
      var ab =1;
      boxar1.forEach(element => {
        if(element!=''){
            $('[name="chakraoptionmain"] option[data-id="'+element+'"]').show();
            if(ab==1){
                $('[name="chakraoptionmain"] option[data-id="'+element+'"]').prop('selected',true);

                var vl2 = $('[name="chakraoptionmain"]').find(':selected').data('id');
                $('.chk_for_third').html('Position Previously used ');
                var boxarr2 = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('position');
                var boxarr22 = boxarr2.split(',');
                boxarr22.forEach(element2 => {
                  if(element2!=''){
                    $('.chk_for_third').append('<span>'+element2+'</span>');
                  }
                });

                $('.chk_for_forth').html('Value Previously used ');
              var boxarr2b = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('chkvalue');
              var boxarr22b = boxarr2b.split(',');
              boxarr22b.forEach(element2b => {
                if(element2b!=''){
                  $('.chk_for_forth').append('<span>'+element2b+'</span>');
                }
              });

              }
              ab++
          }
      });
    });

    var vl11 = $('[name="chakraoption"]').find(':selected').data('qid');
    var boxar1 = vl11.split(',');
    $('[name="chakraoptionmain"] option').each(function(){
        $(this).hide();
    });
    var ab =1;
    boxar1.forEach(element => {
      if(element!=''){
          $('[name="chakraoptionmain"] option[data-id="'+element+'"]').show();
          if(ab==1){
              $('[name="chakraoptionmain"] option[data-id="'+element+'"]').prop('selected',true);

              var vl2 = $('[name="chakraoptionmain"]').find(':selected').data('id');
              $('.chk_for_third').html('Position Previously used ');
              var boxarr2 = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('position');
              var boxarr22 = boxarr2.split(',');
              boxarr22.forEach(element2 => {
                if(element2!=''){
                  $('.chk_for_third').append('<span>'+element2+'</span>');
                }
              });

              $('.chk_for_forth').html('Value Previously used ');
              var boxarr2b = $('[name="chakraoptionmain"] [data-id="'+vl2+'"]').data('chkvalue');
              var boxarr22b = boxarr2b.split(',');
              boxarr22b.forEach(element2b => {
                if(element2b!=''){
                  $('.chk_for_forth').append('<span>'+element2b+'</span>');
                }
              });


            }
            ab++
        }
      });


      
        

    

});

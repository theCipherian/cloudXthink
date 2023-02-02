<style>
  *{
    user-select:none !important;
  }
</style>
<script>
  var data_go = '';
</script>
<div style='display:flex'>
<div class='button' id='see_materials'>materials  &nbsp <i class='bx bx-right-arrow-alt'></i></div>
<div class='button tooltip ' id='see_quiz'>asg.mt &nbsp <i class='bx bx-right-arrow-alt'></i>   <span class="tooltiptext2">Assignments</span></div>
<div class='button tooltip' id='add_quiz'>add asg.mt &nbsp <i class='bx bx-plus'></i>  <span class="tooltiptext">Add assignments</span></div>
</div>
<form class='material_add'>
<input type="text" id='material_data' placeholder='material name'>
<p class='p_3422'>Material type</p>
<div class='o_2344' style='display:flex;align-items:center;width:100%;'>
  <div  class='button ' id='chose_text_file'>Text file  &nbsp <i class='bx bx-file-blank'></i></div>
    <div> <i class='bx bx-radio-circle' ></i></div>
   <div style='' class='button ' id='chose_video_file'>Video file  &nbsp <i class='bx bx-file-blank'></i></div>
</div>
<p class='p_3422'>Material data</p>
<div class='o_2344 video_35302 noner' style='display:flex;align-items:center;width:100%;'>
  <div  class='button ' id='upload_video_btn'>Upload file  &nbsp <i class='bx bx-upload' ></i></div>
   <input style='display:none;' type="file" id='video_file'>
    <div> <i class='bx bx-link-alt' ></i> </div>
   <input style='max-width:40%;' class='input' type="text" id='url_data_yt' placeholder='youtube link'>
</div>
<div class='o_2344 text_34322 noner' style='display:flex;align-items:center;width:100%;'>
  <div  class='button ' id='upload_text_btn'>Upload file  &nbsp <i class='bx bx-upload' ></i></div>
     <input style='display:none;' type="file" id='text_file'>
    <div> <i class='bx bx-link-alt' ></i> </div>
   <input style='max-width:40%;' class='input' type="text" id='url_data_ebook' placeholder='ebook link'>
</div>
<input type="text" id='material_data_note' placeholder='Leave a note'>
<div class='button noner btn_0731' id='add_to_material_1'>Done  </div>
</form>
<div>
    <img src="Flame_Design_Science_transparent_by_Icons8.gif" alt="">
</div>
<script>
  file_type = '';
  selection = '';
    $("#chose_text_file").click(function(){
        $(".btn_0731").removeClass("noner");
        $(this).addClass("active_button");
        $("#chose_video_file").removeClass("active_button");
        $(".text_34322").removeClass("noner");
        $(".video_35302").addClass("noner");
        selection = 'text';
    })


    $("#chose_video_file").click(function(){
        $(this).addClass("active_button");
        $("#chose_text_file").removeClass("active_button");
        $(".btn_0731").removeClass("noner");
        $(".text_34322").addClass("noner");
        $(".video_35302").removeClass("noner");
        selection = 'video';
    })
      $(document).ready(function(){
            $("#upload_video_btn").click(function(){
              var video_file = document.getElementById("video_file");
              video_file.click();
            })  
          $("#video_file").on('change',function(){
            var property = document.getElementById('video_file').files[0];
            var video_name = property.name;
            var video_extension = video_name.split('.').pop().toLowerCase();

            if(jQuery.inArray(video_extension,['mp4']) == -1){
              show_pop_wrong("Invalid file extention");
              $("#upload_video_btn").text("Invalid file");
              $("#upload_video_btn").removeClass("active_button");
              $("#upload_video_btn").addClass("error_button");
                file_type = '';
            }else{
              show_pop("File gotten");
              $("#upload_video_btn").text("File gotten");
              $("#upload_video_btn").addClass("active_button");
              $("#upload_video_btn").removeClass("error_button");
              file_type = 'video'
            }
              $("#add_to_material_1").click(function(){
              let material_data = document.getElementById("material_data");
              let material_data_note = document.getElementById("material_data_note");
              let url_data_yt = document.getElementById("url_data_yt");
              if(selection == 'video'){
              if(!file_type && url_data_yt.value == ''){
                show_pop_wrong("Some error occured");
              }else if(file_type == 'video' && url_data_yt.value == ''){
               
                if(material_data.value == ''){
                  show_pop_wrong("Please enter material name");
                }else{
                    var form_data = new FormData();
                    form_data.append("file",property);
                    form_data.append("material_data",material_data.value);
                    form_data.append("material_data_note",material_data_note.value);
                    form_data.append("data_go",data_go);
                    form_data.append("type","video");
                    $.ajax({
                    url:'cloud_cat_1.php',
                    method:'POST',
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                     start_loader();
                    },
                    success:function(data){
                    $("#data_change_232").text("Course materials");
                    $("#get_data_3432").load("add_course_material.php",function(){
                    stop_loader();
                    $(".sidepart").removeClass("noner");
                     show_pop(data);
                    })
                       $("#data_change_2322").text("Course materials");
                  $("#get_data_34322").load("see_materials.php",function(){
                  $(".sidepart2").removeClass("noner");
                  })
                    }
                    });
                }
              }else if(file_type == '' && url_data_yt !== ''){
                if(material_data.value == ''){
                  show_pop_wrong("Please enter material name");
                }else{
                start_loader();
                $.ajax({
                  url:"cloud_cat_3.php",
                  type:"post",
                  async:false,
                  data:{
                      "material_data":material_data.value,
                      "data_yt": url_data_yt.value,
                      "material_data_note":material_data_note.value,
                      "data_go": data_go,
                      "type": "yt_link"
                  },success:function(data){
                    $("#data_change_232").text("Course materials");
                    $("#get_data_3432").load("add_course_material.php",function(){
                    stop_loader();
                    $(".sidepart").removeClass("noner");
                     show_pop(data);
                    })
                  $("#data_change_2322").text("Course materials");
                  $("#get_data_34322").load("see_materials.php",function(){
                  $(".sidepart2").removeClass("noner");
                  })
                  }
                })
                }
              }
              }
              })

          });
         

          $("#add_to_material_1").click(function(){
          if(selection == 'video'){
          let url_data_yt = document.getElementById("url_data_yt");
          let material_data = document.getElementById("material_data");
          let material_data_note = document.getElementById("material_data_note");
          if(file_type == '' && url_data_yt !== ''){
             if(material_data.value == ''){
               show_pop_wrong("Please enter material name");
             }else{
                start_loader();
                $.ajax({
                  url:"cloud_cat_3.php",
                  type:"post",
                  async:false,
                  data:{
                      "material_data":material_data.value,
                      "data_yt": url_data_yt.value,
                      "material_data_note":material_data_note.value,
                      "data_go": data_go,
                      "type": "yt_link"
                  },success:function(data){
                    $("#data_change_232").text("Course materials");
                    $("#get_data_3432").load("add_course_material.php",function(){
                    stop_loader();
                    $(".sidepart").removeClass("noner");
                     show_pop(data);
                    })
                    $("#data_change_2322").text("Course materials");
                    $("#get_data_34322").load("see_materials.php",function(){
                    $(".sidepart2").removeClass("noner");
                   })
                  }
                })
             }
           }
          }else if(selection == 'text'){
             let url_data_text = document.getElementById("url_data_ebook");
               let material_data = document.getElementById("material_data");
             let material_data_note = document.getElementById("material_data_note");
           if(file_type == '' && url_data_text !== ''){
             if(material_data.value == ''){
               show_pop_wrong("Please enter material name");
             }else{
                start_loader();
                $.ajax({
                  url:"cloud_cat_4.php",
                  type:"post",
                  async:false,
                  data:{
                      "material_data":material_data.value,
                      "data_text": url_data_text.value,
                      "material_data_note":material_data_note.value,
                      "data_go": data_go,
                      "type": "ebook_link"
                  },success:function(data){
                    $("#data_change_232").text("Course materials");
                    $("#get_data_3432").load("add_course_material.php",function(){
                    stop_loader();
                    $(".sidepart").removeClass("noner");
                     show_pop(data);
                    })
                  $("#data_change_2322").text("Course materials");
                  $("#get_data_34322").load("see_materials.php",function(){
                  $(".sidepart2").removeClass("noner");
                  })
                  }
                })
             }
           }
          }
          })

        $("#upload_text_btn").click(function(){
          var text_file = document.getElementById("text_file");
          text_file.click();
        })
     
      $("#text_file").on('change',function(){
        var property = document.getElementById('text_file').files[0];
        var text_name = property.name;
        var text_extension = text_name.split('.').pop().toLowerCase();

        if(jQuery.inArray(text_extension,['pdf','docx']) == -1){
          show_pop_wrong("Invalid file extention");
           $("#upload_text_btn").text("Invalid file");
           $("#upload_text_btn").removeClass("active_button");
           $("#upload_text_btn").addClass("error_button");
           file_type = '';
        }else{
          show_pop("File gotten");
          $("#upload_text_btn").text("File gotten");
          $("#upload_text_btn").addClass("active_button");
          $("#upload_text_btn").removeClass("error_button");
          file_type = 'text'
        }
              $("#add_to_material_1").unbind("click").click(function(){
             let material_data = document.getElementById("material_data");
             let url_data_text = document.getElementById("url_data_ebook");
             let material_data_note = document.getElementById("material_data_note");
          if(selection == 'text'){
           if(!file_type && url_data_text.value == ''){
             show_pop_wrong("Some error occured");
           }else if(file_type == 'text' && url_data_text.value == ''){
             if(material_data.value == ''){
               show_pop_wrong("Please enter material name");
             }else{
                    var form_data = new FormData();
                    form_data.append("file",property);
                    form_data.append("material_data",material_data.value);
                    form_data.append("material_data_note",material_data_note.value);
                    form_data.append("data_go",data_go);
                    form_data.append("type","text");
                    $.ajax({
                    url:'cloud_cat_2.php',
                    method:'POST',
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                     start_loader();
                    },
                    success:function(data){
                    $("#data_change_232").text("Course materials");
                    $("#get_data_3432").load("add_course_material.php",function(){
                    stop_loader();
                    $(".sidepart").removeClass("noner");
                     show_pop(data);
                    })
                      $("#data_change_2322").text("Course materials");
                  $("#get_data_34322").load("see_materials.php",function(){
                  $(".sidepart2").removeClass("noner");
                  })
                    }
                    });
             }
           }else if(file_type == '' && url_data_text !== ''){
             if(material_data.value == ''){
               show_pop_wrong("Please enter material name");
             }else{
                start_loader();
                $.ajax({
                  url:"cloud_cat_4.php",
                  type:"post",
                  async:false,
                  data:{
                      "material_data":material_data.value,
                      "data_text": url_data_text.value,
                      "material_data_note":material_data_note.value,
                      "data_go": data_go,
                      "type": "ebook_link"
                  },success:function(data){
                    $("#data_change_232").text("Course materials");
                    $("#get_data_3432").load("add_course_material.php",function(){
                    stop_loader();
                    $(".sidepart").removeClass("noner");
                     show_pop(data);
                    })
                   
                  $("#data_change_2322").text("Course materials");
                  $("#get_data_34322").load("see_materials.php",function(){
                  $(".sidepart2").removeClass("noner");
                  })
                  }
                })
             }
           }
          }
          })
      });
    });

    $("#add_to_course_1").click(function(){
      let course_data = document.getElementById("course_data");
      if(course_data.value.length < 1){
          show_pop_wrong("Fill field");
      }else{
      start_loader();
      $.ajax({
          url:"data_controller.php",
          type:"post",
          async:false,
          data:{
              "course_data":course_data.value
          },success:function(){
              course_data.value = "";
              stop_loader();
              show_pop("Data saved");
                $(".load_av_departments").load("courses_data.php");
          }
      })
      }
    })
   $("#see_materials").click(function(){
        data_go = $(this).attr("data-get");
        start_loader();
        $("#data_change_2322").text("Course materials");
        $("#get_data_34322").load("see_materials.php",function(){
        stop_loader();
        $(".sidepart2").removeClass("noner");
        })
    })
   $("#see_quiz").click(function(){
        start_loader();
        $("#data_change_2322").text("All asg.mt quests");
        $("#get_data_34322").load("see_quiz.php",function(){
        stop_loader();
        $(".sidepart2").removeClass("noner");
        })
    })
    $("#add_quiz").click(function(){
        start_loader();
        $("#data_change_232").text("Add assignment");
        $("#get_data_3432").load("add_quiz.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
        })
      $(".button").click(function(){
    var button = document.querySelectorAll(".button");
    button.forEach((btn) => {
    btn.classList.remove("button_active");
    this.classList.add("button_active");
    })
    })
</script>
<?php


?>
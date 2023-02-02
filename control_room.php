<!-- Written By THE DARK TRHONE -->
<?php
session_start();
include("init.php");
if(isset($_SESSION['cloudcat_data'])){
    $cloudcat_mayor = $_SESSION['cloudcat_data'];
    $query = mysqli_query($init, "SELECT * FROM administrators_ WHERE unique_id = '$cloudcat_mayor'");
    $array = mysqli_fetch_array($query);
    $admin_name = $array['admin_name'];
    $admin_email = $array['admin_email'];
    $avatar = $array['avatar'];
}else{
    echo"
    <script>
      window.location.href = 'cloudcat_passage.php'
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='author' content='Kenneth Okpala Chibuzor'>
     <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!-- FONTS -->
      <link rel="shortcut icon" type="image/jpg" href="weldios_thingy.png"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="style.css">
        <link rel="manifest" href="go.webmanifest">
    <!-- END STYLESHEETS -->
      <!-- SCRIPTS --> 
    <script src="jquery.js"></script>
    <!-- END SCRIPTS -->
    <title>Weldios LMS</title>
    <style>
    
    :root {
    --accent: red;	
    --main: #ffffff;
    }

    .icon {
        cursor: pointer;
        height: 30px;
        width: 35px;
        margin-right: 4px;
        margin-left: 4px;
        border: none;
        background: none;
        filter: invert(100%) sepia(0%) saturate(1%) hue-rotate(92deg) brightness(104%) contrast(101%);
    }

    #video-controls {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 1fr;
        grid-template-areas: "progressbar"
                            "controls-main";
        position: absolute;
        bottom: 4px;
        width: 100%;
        padding-bottom: 7px;
        box-sizing: border-box;
        opacity: 0;
        -webkit-transition: opacity .3s;
        -moz-transition: opacity .3s;
        -o-transition: opacity .3s;
        -ms-transition: opacity .3s;
        transition: opacity .3s;
        background: #0000007d;
    }
    
    .playerContainer:hover #video-controls {
            opacity: .9;
    } 

    .progress {
        grid-area: progressbar;
        display: grid;
        grid-template-columns: 14% 72% 14%;
        grid-template-rows: 1fr;
        grid-template-areas: "ctime seek ttime";
        cursor: pointer;
        width: 100%;
        margin: auto;
        border-radius: 6px;
        left: 4px;
        bottom: 100%;
        transition: height 0.1s ease-in-out;
    }
    .current-time {
        grid-area: ctime;
        color: #ffffff;
        margin: auto
    }

    .total-time {
        grid-area: ttime;
        color: #ffffff;
        margin: auto
    }

    #seek{
        cursor: pointer;
        grid-area: seek;
        width: 100%;
        outline: none;
        height: 5px;
        margin: auto;
    }

    .controls-main {
        grid-area: controls-main;
        width: 100%;
        margin: auto;
        height: 100%;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr;
        grid-template-areas: "controls-left play controls-right";
        justify-content: space-between;
    }

    .controls-left {
        grid-area: controls-left;
        align-items: center;
        display: flex;
        padding-left: 14px;
    }

    .controls-right {
        grid-area: controls-right;
        align-items: center;
        display: flex;	
        justify-content: flex-end;
        padding-right: 14px;
    }

    #center_p {
        display: flex;
        grid-area: play;
        cursor: pointer;
        text-align: center;
        justify-content: center;
    }
    
    .volume{
        display: flex;
        align-items: center;
    }

    #volumeSeek{
        cursor: pointer;
        border-radius: 6px;
        width: 80px;
        height: 5px;
        margin: auto;
    }

    #unlock{
        position: absolute;
        left: 14px;
        z-index: 1;
        top: 14px;
        display: none;
    }

    #superplay {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        display: block;
    }

#speed-list {
	cursor: pointer;
	display: none;
	background: #131212e3;
    color: #fff;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
	min-width: 160px;
	text-align: center;
	position: absolute;
	top: 0;
    right: 0;
}
.speed-list p {
	color: var(--main);
	padding: 5px;
	cursor: default;
}
.speed-list p:hover{
	color: var(--accent);
	font-weight: bold;
}

.fullscreen {
	cursor: pointer;
	display: flex;
	justify-content: center;
}

@media only screen and (max-width: 600px) {

	.icon {
		cursor: pointer;
		height: 25px;
		width: 30px;
		margin-right: 4px;
		margin-left: 4px;
		border: none;
		background: none;
		filter: invert(100%) sepia(0%) saturate(1%) hue-rotate(92deg) brightness(104%) contrast(101%);
	}
	
	#video-controls {
		display: grid;
		grid-template-columns: 1fr;
		grid-template-rows: 1fr 1fr;
		grid-template-areas: "progressbar"
							 "controls-main";
		position: absolute;
		bottom: 4px;
		width: 100%;
		padding-bottom: 0px;
		box-sizing: border-box;
		opacity: 0;
		-webkit-transition: opacity .3s;
		-moz-transition: opacity .3s;
		-o-transition: opacity .3s;
		-ms-transition: opacity .3s;
		transition: opacity .3s;
		background: #0000007d;
	  }
	  
	  .playerContainer:hover #video-controls {
			opacity: .9;
	  } 
	  
	
	.progress {
		grid-area: progressbar;
		display: grid;
		grid-template-columns: 14% 72% 14%;
		grid-template-rows: 1fr;
		grid-template-areas: "ctime seek ttime";
		cursor: pointer;
		width: 100%;
		margin: auto;
		border-radius: 6px;
		left: 4px;
		bottom: 100%;
		transition: height 0.1s ease-in-out;
	}
	.current-time {
		grid-area: ctime;
		color: #ffffff;
		margin: auto
	}
	.total-time {
		grid-area: ttime;
		color: #ffffff;
		margin: auto
	}
	#seek{
		cursor: pointer;
		grid-area: seek;
		width: 100%;
		outline: none;
		height: 5px;
		margin: auto;
	}
	
	.controls-main {
		grid-area: controls-main;
		width: 100%;
		margin: auto;
		height: 100%;
		display: grid;
		grid-template-columns: 40% 20% 40%;
		grid-template-rows: 1fr;
		grid-template-areas: "controls-left play controls-right";
		justify-content: space-between;
	}
	
	.controls-left {
		grid-area: controls-left;
		align-items: center;
		display: flex;
		padding-left: 14px;
	}
	.controls-right {
		grid-area: controls-right;
		align-items: center;
		display: flex;	
		justify-content: flex-end;
		padding-right: 14px;
	}
	
	#play {
		grid-area: play;
		cursor: pointer;
		text-align: center;
	}
	 
	.volume{
		display: flex;
		align-items: center;
	}
	
	#volumeSeek{
		cursor: pointer;
		border-radius: 6px;
		width: 80px;
		height: 5px;
		margin: auto;
	}
	#unlock{
		position: absolute;
		left: 14px;
		z-index: 1;
		top: 14px;
		display: none;
	}
	
	#superplay {
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%,-50%);
		display: block;
	}
	
	#speed-list {
		cursor: pointer;
		display: none;
		background: #131212e3;
		color: #fff;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		min-width: 160px;
		text-align: center;
		position: absolute;
		top: 0;
		right: 0;
		font-size: 10px;
	}
	.speed-list p {
		color: var(--main);
		padding: 5px;
		cursor: default;
	}
	.speed-list p:hover{
		color: var(--accent);
		font-weight: bold;
	}
	
	.fullscreen {
		cursor: pointer;
		display: flex;
		justify-content: center;
	}
  }
  .other_cont{


  }
  .other_cont img{
    
  }

  .item_holder_98{
      max-width:90%;
      font-size:1.1rem;
      display:flex;
      flex-direction:column;
  }
  .item_holder_98 div{
      margin:10px;
  }
  .head_98{
      font-weight:bold;
      font-size:1.2rem;
      color:grey;
  }

  .button{
      width:8rem;
      height:3.8rem;
      display:flex;
      align-items:center;
      justify-content:center;
      background-color:#fff;
      border:2px dashed grey;
      cursor:pointer;
      color:grey;
      min-width:6.8rem;
      border-radius:5px;
  }
  .button {

  }
  #loader {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -2.7em;
  margin-left: -2.7em;
  width: 5.4em;
  height: 5.4em;
}

#hill {
  position: absolute;
  width: 7.1em;
  height: 7.1em;
  top: 1.7em;
  left: 1.7em;
  background-color: transparent;
  border-left: .25em solid #fff;;
  transform: rotate(45deg);
}

#hill:after {
  content: '';
  position: absolute;
  width: 7.1em;
  height: 7.1em;
  left: 0;
}

#box {
  position: absolute;
  left: 0;
  bottom: -.1em;
  width: 1em;
  height: 1em;
  background-color: transparent;
  border: .25em solid #fff;
  border-radius: 15%;
  transform: translate(0, -1em) rotate(-45deg);
  animation: push 2s cubic-bezier(.79, 0, .47, .97) infinite;
}

@keyframes push {
  0% {
    transform: translate(0, -1em) rotate(-45deg);
  }
  5% {
    transform: translate(0, -1em) rotate(-50deg);
  }
  20% {
    transform: translate(1em, -2em) rotate(47deg);
  }
  25% {
    transform: translate(1em, -2em) rotate(45deg);
  }
  30% {
    transform: translate(1em, -2em) rotate(40deg);
  }
  45% {
    transform: translate(2em, -3em) rotate(137deg);
  }
  50% {
    transform: translate(2em, -3em) rotate(135deg);
  }
  55% {
    transform: translate(2em, -3em) rotate(130deg);
  }
  70% {
    transform: translate(3em, -4em) rotate(217deg);
  }
  75% {
    transform: translate(3em, -4em) rotate(220deg);
  }
  100% {
    transform: translate(0, -1em) rotate(-225deg);
  }
}
.noner{
    display:none;
    opacity:0;
    visibility:hidden;
}
.loader_main{
    position:fixed;
    left:0;
    right:0;
    bottom:0;
    top:0;
    width:100%;
    height:100%;
    margin: auto;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:9999;
 background-color:rgba(255,255,255,0.80)
}
.action_384{
    display:flex;
}
.button{
    margin:10px;
}
.p-34923-3{
    width:12rem !important;
}
.p-34923-1{
    width:8rem !important;
}
.p-34923-2{
    width:8rem !important;
}
 .lineloader{
  /* width:100%;
  max-height:4px !important;
  height:4px !important;
  background:linear-gradient(to right, #ADD8E6, #ADD8E6);
  position:fixed;
  top:0;
  left:0;
  z-index:999 !important;
  margin:0;
background-size: 20%;
background-repeat:repeat-y;
background-position:-25% 0;
border-radius:30px;
animation: scroll 1.3s linear infinite; */
position:fixed;
top:0;
left:0;
width:100vw;
height:100vh;
display:flex;
align-items:center;
justify-content:center;
z-index:9999 !important;
background-color:rgba(255,255,255,0.80);
}
@keyframes scroll{
  50%{
    background-size:70%;
  }
  100%{
    background-position:125% 0;
  }
}
#loading {
  display: inline-block;
  width: 50px;
  height: 50px;
  border: 3px solid transparent;
  border-radius: 50%;
  border-top-color:#ADD8E6;
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { -webkit-transform: rotate(360deg); }
}
@-webkit-keyframes spin {
  to { -webkit-transform: rotate(360deg); }
}

.sidepart{
    animation: sikes 1s ease;
    position:fixed;
    right:0;
    bottom:0;
    width:45%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:999 !important;
      box-shadow: -5px 0 5px -5px rgba(0,0,0,.1);
}
.sidepart2{
    animation: sikes2 1s ease;
    position:fixed;
    left:0;
    bottom:0;
    width:52%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:999 !important;
    box-shadow:  5px 0 5px -5px rgba(0,0,0,.1);
}

.sidepart3{
    animation: sikes2 1s ease;
    position:fixed;
    left:0;
    bottom:0;
    width:98%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:999 !important;
    box-shadow:  5px 0 5px -5px rgba(0,0,0,.1);
}

.sidepart_items{
   overflow-x:hidden;
   overflow-y:scroll;
   bottom:0;
   left:0;
   position:absolute;
   right:1rem;
   height:90%;
   bottom:0;
   padding:10px;
}

.sidepart_items2{
   overflow-x:hidden;
   overflow-y:scroll;
   bottom:0;
   left:0;
   position:absolute;
   right:1rem;
   height:90%;
   bottom:0;
   padding:10px;
}

.sidepart_items3{
   overflow-x:hidden;
   overflow-y:scroll;
   bottom:0;
   left:0;
   position:absolute;
   right:1rem;
   height:90%;
   bottom:0;
   padding:10px;
}

@media screen and (max-width:900px){
    .sidepart{
    animation: sikes 1s ease;
    position:fixed;
    right:0;
    bottom:0;
    
    width:95%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:9999 !important;
      box-shadow: -5px 0 5px -5px rgba(0,0,0,.1);
}

#username_data{
    width:90%;
}

.sidepart2{
    animation: sikes2 1s ease;
    position:fixed;
    left:0;
    bottom:0;
    width:85%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:9999 !important;
    box-shadow:  5px 0 5px -5px rgba(0,0,0,.1);
}

.sidepart3{
    animation: sikes2 1s ease;
    position:fixed;
    left:0;
    bottom:0;
    width:85%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:9999 !important;
      box-shadow:  5px 0 5px -5px rgba(0,0,0,.1);
}
}
.sidepart_items::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.sidepart_items::-webkit-scrollbar-thumb{
    border-radius:30px;
    background-color:rgba(138, 43, 226, 0.09);
}
.sidepart_items2::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.sidepart_items2::-webkit-scrollbar-thumb{
    border-radius:30px;
    background-color:rgba(138, 43, 226, 0.09);
}
.sidepart_items3::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.sidepart_items3::-webkit-scrollbar-thumb{
    border-radius:30px;
    background-color:rgba(138, 43, 226, 0.09);
}
@keyframes sikes {
    0%{
        transform:translateX(100%);
    }
    100%{
        transform:translateX(0%);
    }
}
@keyframes sikes2 {
    0%{
        transform:translateX(-100%);
    }
    100%{
        transform:translateX(0%);
    }
}
.sidepart_header{
    position:absolute;
    left:0;
    padding:1rem;
    font-size:15px;
    width:100%;
    flex-direction:row-reverse;
    background-color:#fff;
    top:5px;
    display:flex;
    height:10%;
    justify-content:space-between;
    align-items:center;
}
.sidepart_header2{
    position:absolute;
    left:0;
    padding:1rem;
    font-size:15px;
    width:100%;
    flex-direction:row-reverse;
    background-color:#fff;
    top:5px;
    display:flex;
    height:10%;
    justify-content:space-between;
    align-items:center;
}
.sidepart_header3{
    position:absolute;
    left:0;
    padding:1rem;
    font-size:15px;
    width:100%;
    flex-direction:row-reverse;
    background-color:#fff;
    top:5px;
    display:flex;
    height:10%;
    justify-content:space-between;
    align-items:center;
}
.sidepart_header i{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    cursor:pointer;
}
.sidepart_header2 i{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    cursor:pointer;
}
.sidepart_header3 i{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    cursor:pointer;
}
.logout{
    z-index:99 !important;
}
.department_add{
    display:flex;
    width:100%;
    flex-direction:column;
}
.course_add{
    display:flex;
    width:100%;
    flex-direction:column;
}
.department_add input{
    width:95%;
    border:2px dashed #ddd;
    margin:1rem;
    border-radius:5px;
    height:4.2rem;
    padding:10px;
}
select{
        width:95%;
    border:2px dashed #ddd;
    margin:1rem;
    border-radius:5px;
    height:4.2rem;
    padding:10px;
}
 select:focus{
    outline:none;
    border:2px dashed #ddd;
}
.course_add input, .material_add input, .input{
    width:95%;
    border:2px dashed #ddd;
    margin:1rem;
    border-radius:5px;
    height:4.2rem;
    padding:10px;
}
.department_add input:focus{
    outline:none;
    border:2px dashed #ddd;
}
 .input:focus{
    outline:none;
    border:2px dashed #ddd;
}
.course_add input:focus{
    outline:none;
    border:2px dashed #ddd;
}
.material_add input:focus{
    outline:none;
    border:2px dashed #ddd;
}
.active_button{
    border-color:limegreen;
    color:limegreen;
}
.error_button{
    border-color:red;
    color:red;
}
.o_2344 div{
 margin:10px;    
}
.p_3422{
    color:grey;
    padding:10px;
}
.thing_345{
    border-radius:7px;
    height:3rem;
    background-color:rgba(255,255,0,0.30);
    display:flex;
    width:max-content;
    padding:1rem;
    align-items:center;
    justify-content:center;

}
.thing_3455, .thing_34555{
    border-radius:7px;
    height:3rem;
    background-color:rgba(255,255,0,0.30);
    display:flex;
    width:max-content;
    padding:1rem;
    align-items:center;
    justify-content:center;

}
.changes_pop, .changes_pop_wrong{
    top:0;
    position:fixed;
    z-index:99999;
    left:0;
    width:100%;
    height:100vh;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    background-color:rgba(255,255,255,0.80);
}
#text_34322, #text_3432299{
    margin:1rem;
    color:grey;
}
.form_2934{
    display:flex;
    width:100%;
    flex-direction:column;
}

.form_2934 div{
    margin:1rem;
    display:flex;
    flex-direction:column;
    width:60%;
}
@media screen and (max-width:900px){
    .form_2934 div{
    margin:1rem;
    display:flex;
    flex-direction:column;
    width:90%;
}
}

.form_2934 div label{
    color:grey;
}
.form_2934 div textarea, .textarea{
    width:95%;
    border:2px dashed #ddd;
    margin:1rem;
    border-radius:5px;
    resize:none;
    height:4.2rem;
    padding:10px;
}
.form_2934 div textarea:focus{
    outline:none;
    border:2px dashed #ddd;
}
.textarea:focus{
    outline:none;
    border:2px dashed #ddd;
}
.thing_345, .thing_3455{
    font-weight:bold !important;
}
.thing_345, .thing_34555{
    font-weight:bold !important;
}
.msg{
    width:max-content;
    height:max-content;
    padding:1rem;
    border-radius:10px;
    margin-bottom:10px;
    color:blueviolet;
    background-color:rgba(255,255,0,0.30);
}
.cloudthink{
       font-family: 'Josefin Sans', sans-serif;
       font-size:2rem;
       color:#454545;
       font-weight:bold;
}
.p-34924{
    cursor:pointer;
}
.p-34924 img{
    border-radius:0%;
}
.clock{
     transition:.2s ease;
}
.clock:hover{
     transform:scale(1.1);
     transition:.2s ease;
}
@keyframes clock{
    to{
        transform:rotate(360deg);
    }
}
.button{
    transition:.5s ease;
}
.button:hover{
    transform:translateY(-10px) !important;
    transition:.5s ease;
}
.p-34927-1{
    transition:.5s ease;
}

/* .p-34927-1:hover{
    transform:rotate(2deg);
    transition:.5s ease;
} */
.button_active{
    border-color:limegreen !important;
    color:limegreen !important;
}
.row_item{
    display:flex;
    width:100%;
    justify-content:space-evenly;
    height:6rem;
    align-items:center;
      padding:1rem !important;
    padding:1rem;
    border-bottom:1px solid #ddd;
}
.row_item_data1{
    text-transform:uppercase;
    color:blueviolet;
    font-weight:bold;
}
.row_item_data i{
    font-size:2rem;
    color: grey;
    cursor:pointer;
}
.client_nav_sec{
    display:none;
    opacity:0;
    visibility:hidden;
}
  #terminate_data{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    display:none;
    cursor:pointer;

  }
  html{
    -webkit-tap-highlight-color: transparent !important;
}

.p-34923-1{
    background-color: hsl(252, 75%, 60%, 0.06);
    color:#9b59b6;
    border:1px solid #9b59b6;;
}
.p-34923-2{
    background-color: hsl(252, 75%, 60%, 0.06);
    color:#9b59b6;;
    border:1px solid #9b59b6;;
}
.p-34923-3{
    background-color: hsl(252, 75%, 60%, 0.06);
    color:#9b59b6;;
    border:1px solid #9b59b6;
}
@media screen and (max-width:1200px){
    .p-34927{
        display:flex;
        width:100%;
        flex-direction:column;
    }
    .p-34923{
        display:none;
    }
      #terminate_data{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    display:flex;
    cursor:pointer;

  }
    .client_nav_sec{
    display:flex;
    opacity:1;
    visibility:visible;
}
    .p-34927-1{
        width:100%;
        position:fixed;
        left:0;
        top:0;
        z-index:99;
        width:90%;

    }
    .p-34927-1:hover{
     transform:rotate(0deg);
    }
    .p-34927{
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .p-34927-2{
        width:95%;
    }
    .p-34924{
        display:flex;
        align-items:center;
    }
    nav{
        justify-content:space-around;
    }
    .sikes34532{
        display:none;
    }
  }
  .client_nav{  
    animation: sikes2 1s ease;
    position:fixed;
    left:0;
    bottom:0;   
    width:90%;
    background-color:#fff;
    padding:1rem;
    transform:translateX(0%);
    height:100vh;
    z-index:999 !important;
    box-shadow:  5px 0 5px -5px rgba(0,0,0,.1);

  }
  .options_data{
      position:absolute;
      top:20%;
      left:0;
      width:100%;
      height:max-content;
  }
  .option_item{
      width:70%;
      height:4rem;
      margin-top:1rem;
      border-top-right-radius:30px;
      display:flex;
      padding-left:1rem;
      cursor:pointer;
      align-items:center;
      background-color:#eee;
      color:black;
      border-bottom-right-radius:30px;
  }
  .op1{
        background-color: rgb(50, 205, 50, 0.09);
        color:limegreen;
        border:2px dashed limegreen;
        border-left:none;
  }
  .op2{
        background-color: rgba(255, 166, 0, 0.09);
        color:orange;
        border:2px dashed orange;
        cursor:pointer;
        border-left:none;
  }
  .op3{
        background-color: rgba(138, 43, 226, 0.09);
        color:blueviolet;
        border:2px dashed blueviolet;
        border-left:none;
  }
  .client_nav_sec{
      cursor:pointer;
  }
  .row_item{
      padding:1rem !important;
      height:9rem !important;
  }
  /* Tooltip container */
.tooltip {
  position: relative;

}

/* Tooltip text */
.tooltip .tooltiptext {
  visibility: hidden;
  min-width: 120px;
  background-color: limegreen;
  color: #fff;
  text-align: center;
  padding: 10px 0;
  border-radius: 6px;
   top: -5px;
   font-weight:bold;
  left: 105%;
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}
.tooltip .tooltiptext2 {
  visibility: hidden;
  min-width: 120px;
  background-color: limegreen;
  color: #fff;
  text-align: center;
  padding: 10px 0;
  border-radius: 6px;
   top: -5px;
   font-weight:bold;
  right: 105%;
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}
.tooltip .tooltiptext3 {
  visibility: hidden;
  min-width: 120px;
  background-color: limegreen;
  color: #fff;
  text-align: center;
  padding: 10px 0;
  border-radius: 6px;

   font-weight:bold;
bottom: 100%;
  left: 50%;
  margin-left: -60px; /* Use half of the width (120/2 = 60), to center the tooltip */
  /* Position the tooltip text - see examples below! */
  position: absolute;
  z-index: 1;
}


/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
  visibility: visible;
}
.tooltip:hover .tooltiptext2 {
  visibility: visible;
}
.tooltip:hover .tooltiptext3 {
  visibility: visible;
}
.loader3 {
   width:50px;
   height:50px;
   display:inline-block;
   padding:0px;
   text-align:left;
}
.loader3 span {
   position:absolute;
   display:inline-block;
   width:50px;
   height:50px;
   border-radius:100%;
   background:rgba(135, 211, 124,1);
   -webkit-animation:loader3 1.5s linear infinite;
   animation:loader3 1.5s linear infinite;
}
.loader3 span:last-child {
   animation-delay:-0.9s;
   -webkit-animation-delay:-0.9s;
}
@keyframes loader3 {
   0% {transform: scale(0, 0);opacity:0.8;}
   100% {transform: scale(1, 1);opacity:0;}
}
@-webkit-keyframes loader3 {
   0% {-webkit-transform: scale(0, 0);opacity:0.8;}
   100% {-webkit-transform: scale(1, 1);opacity:0;}
}
.loader4 {
   width:50px;
   height:50px;
   display:inline-block;
   padding:0px;
   text-align:left;
}
.loader4 span {
   position:absolute;
   display:inline-block;
   width:50px;
   height:50px;
   border-radius:100%;
   background:rgba(255, 0, 0,1);
   -webkit-animation:loader3 1.5s linear infinite;
   animation:loader4 1.5s linear infinite;
}
.loader4 span:last-child {
   animation-delay:-0.9s;
   -webkit-animation-delay:-0.9s;
}
@keyframes loader4 {
   0% {transform: scale(0, 0);opacity:0.8;}
   100% {transform: scale(1, 1);opacity:0;}
}
@-webkit-keyframes loader4{
   0% {-webkit-transform: scale(0, 0);opacity:0.8;}
   100% {-webkit-transform: scale(1, 1);opacity:0;}
}
.thing_download{
    width:3rem;
    height:3rem;
    border-radius:50%;
    background-color:limegreen;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
}
.logout{
    width:50px;
    height:50px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    font-size:1.3rem;
    position:absolute;
    top:1.5%;
    border:2px solid limegreen;
    right:3%;
    z-index:9;
    background-color:limegreen;
    color:#fff;
    transition:.5s ease;
}
.activity_hld{
    width:100%;
    display:flex;
    flex-direction:column;
    border-bottom:1px solid #eee;
    padding:10px;
    margin-bottom:10px;
}
.ac_1{
    font-size:14px !important;
    font-weight:200 !important;
    color:grey; 
}
.button{
    border: 2px solid #ddd;
}
        .head_text{
        font-size:16px;
        color:grey;
        }
         .note{
        padding:10px;
        border-radius:10px;
        font-size:14px;
        max-width:max-content !important;
        background-color:hsl(252, 75%, 60%, 0.06);
        color:#9b59b6;
        margin-top:10px;
        }
        .bubble_gum{
            display:flex;
            flex-wrap:wrap;
            align-items:center;

        }
        .bubble_gum span{
            min-width:8rem !important;
            height:3rem;
            color:#fff;
            padding:20px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:13px !important;
            cursor:pointer;
            margin-top:10px;
            margin-left:10px;
            border:1px solid #9b59b6;
            border-radius:5px;
            color:#9b59b6;
            background-color:transparent;
            transition:all .2s ease;

        }
        .bubble_gum span:hover{
            color:#fff;
            background-color:#9b59b6;
            transition:all .2s ease;
        }
        .bb_active{
           color:#fff !important;
           background-color:#9b59b6 !important;
        }
          .label-float{
  position: relative;
  padding-top: 13px;
}

.label-float input{
  border: 1px solid lightgrey;
  border-radius: 5px;
  outline: none;
  min-width: 250px;
  padding: 15px 20px;
  font-size: 16px;
  transition: all .1s linear;
  -webkit-transition: all .1s linear;
  -moz-transition: all .1s linear;
  -webkit-appearance:none;
}

.label-float input:focus{
  border: 2px solid #9b59b6;
}

.label-float input::placeholder{
  color:transparent;
}

.label-float label{
  pointer-events: none;
  position: absolute;
  top: calc(50% - 8px);
  left: 15px;
  transition: all .1s linear;
  -webkit-transition: all .1s linear;
  -moz-transition: all .1s linear;
  background-color: white;
  padding: 5px;
  box-sizing: border-box;
}

.label-float input:required:invalid + label{
  color: red;
}
.label-float input:focus:required:invalid{
  border: 2px solid red;
}
.label-float input:required:invalid + label:before{
  content: '*';
}
.label-float input:focus + label,
.label-float input:not(:placeholder-shown) + label{
  font-size: 13px;
  top: 0;
  color: #9b59b6;
}
.sikes{
    display:flex;
    flex-wrap:wrap;
}
.label-float{
    margin:5px;
}
 /** Custom Select **/
.custom-select-wrapper {
  position: static;
  display: inline-block;
  user-select: none;
  min-width:max-content !important;
}
  .custom-select-wrapper select {
    display: none;
  }
  .custom-select {
    position: relative;
    display: inline-block;
  }
    .custom-select-trigger {
      position: relative;
      display: block;
      min-width: calc(100% + 50px) !important;
      padding: 1rem;
      font-size: 14px;
      font-weight: 300;
      color: #121212;
      background:#fff;
      border-radius: 4px;
      cursor: pointer;
      border:1px solid #eee;
    }
      .custom-select-trigger:after {
        position: absolute;
        display: block;
        content: '';
        width: 10px; height: 10px;
        top: 50%; right: 25px;
        margin-top: -3px;
       
        border-bottom: 1px solid #121212;
        border-right: 1px solid #121212;
        transform: rotate(45deg) translateY(-50%);
        transition: all .4s ease-in-out;
        transform-origin: 50% 0;
      }
      .custom-select.opened .custom-select-trigger:after {
        margin-top: 3px;
        transform: rotate(-135deg) translateY(-50%);
      }
  .custom-options {
    position: fixed;
    display: block;
    top: 40%; left: 0; right: 0;
    min-width: max-content !important;
    max-width:30rem;

    margin: 0 auto;
    border: 1px solid #eee;
    border-radius: 4px;
    box-sizing: border-box;
    box-shadow: 0 2px 1px rgba(0,0,0,.07);
    background: #fff;
    transition: all .4s ease-in-out;
    max-height:20rem;
    overflow-y:scroll;
    overflow-x:hidden;
    opacity: 0;
    z-index:9;
    visibility: hidden;
    pointer-events: none;
    transform: translateY(-15px);
  }
  .custom-options::-webkit-scrollbar {
       background-color:transparent;
        width:5px !important;
  }
  .custom-options::-webkit-scrollbar-thumb {
       background-color:#eee;
       width:10px !important;
       border-radius:30px;
  }
  .custom-select.opened .custom-options {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
    transform: translateY(0);
  }

 
    .custom-option {
      position: relative;
      display: block;
      padding: 0 22px;
      /* border-bottom: 1px solid #b5b5b5; */
      font-size: 12px !important;
      font-weight: 600;
      color: #b5b5b5;
      line-height: 47px;
      cursor: pointer;
      transition: all .4s ease-in-out;
    }
    .custom-option:first-of-type {
      border-radius: 4px 4px 0 0;
    }
    .custom-option:last-of-type {
      border-bottom: 0;
      border-radius: 0 0 4px 4px;
    }
    .custom-option:hover,
    .custom-option.selection {
      background: #f9f9f9;
    }
    .bg-pop{
        position:fixed;
        left:0;
        top:0;
        width:100vw;
        height:100vh;
        z-index:9999 !important;
        display:flex;
        align-items:center;
        justify-content:center;
        background-color:rgba(0,0,0,0.80);
    }
    .bg-pop_cont{
        width:25rem;
        height:10rem;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-direction:column;
        border-radius:10px;
        background-color:#fff;
    }
    .pop_acc{
        display:flex;
    }
    .greencard{
        margin:10px;
        width:8rem;
        height:3rem;
        display:flex;
        align-items:center;
        justify-content:center;
        background-color:limegreen;
        border-radius:5px;
        color:#fff;
        cursor:pointer;
    }
    .redcard{
         margin:10px;
        width:8rem;
        height:3rem;
        display:flex;
        align-items:center;
        justify-content:center;
        background-color:red;
        border-radius:5px;
        color:#fff;
        cursor:pointer;
    }
    .writeup{
        padding:10px;
        min-width:30rem !important;
        height:8rem;
        font-family: 'Maven Pro', sans-serif;
        width:30rem;
        min-height:8rem !important;
        border:1px solid #eee;
        border-radius:5px;
    }
    .writeup:focus{
        outline:none;
        border:2px solid #9b59b6;
    }
    #username_data{
      border:2px solid #eee !important;
    }
     input{
         font-family: 'Maven Pro', sans-serif !important;
     }
       select{
        border:2px solid #eee;
        padding:0px !important;
        height:3rem;
         font-family: 'Maven Pro', sans-serif;
        width:max-content !important;
    }
    select:focus{
        border:2px solid #eee;
        padding:0px !important;
    }
    </style>
    <script>
        let data_go = '';
    </script>
</head>
<body>
    <div class='bg-pop noner'>
        <div  class='bg-pop_cont'>
            <div style='font-size:1.2rem'>This action is irreversible!</div>
            <div class='pop_acc'>
            <div class='redcard'>Exit</div>
            <div class='greencard'>Confirm</div>
</div>
        </div>
    </div>
    <div class='changes_pop noner'>
  <img  style='width:20rem;height:20rem;object-fit:cover;display:none'src="Flame_Success_transparent_by_Icons8.gif" alt="">
       <div class="loader3">
    <span></span>
    <span></span>
</div> 
  <div id='text_34322'>Changes saved</div>
    </div>
    <div class='changes_pop_wrong noner'>
  <img class='src_set_1'  style='width:20rem;height:20rem;object-fit:cover;display:none'src="Flame_No_Connection_transparent_by_Icons8.gif" alt="">
       <div class="loader4">
    <span></span>
    <span></span>
</div> 
  <div id='text_3432299'>Changes saved</div>
    </div>
        <div class='lineloader noner'>
    <div id="loading"></div>
    </div>
    <!-- SIDE PARTS -->
     <div class='sidepart noner'>
         <div class='sidepart_header'> <span class='thing_345' id='data_change_232'> </span> <div id='sidepart_terminate'> <i class='bx bx-chevron-right '></i></div> </div>
         <div class='sidepart_items' id='get_data_3432'> 
         </div>
     </div>
     <div class='sidepart2 noner'>
         <div class='sidepart_header2'> <span class='thing_3455' id='data_change_2322'> </span> <div id='sidepart_terminate2'> <i class='bx bx-chevron-right '></i></div> </div>
         <div class='sidepart_items2' id='get_data_34322'>
         </div>
     </div>
     <div class='client_nav noner'>
         <div class='options_data' style='z-index:120;'>
              <div class='option_item op1'  id='department_89'>Departments</div>
              <div class='option_item op2' id='students_99'>Students</div>
              <div class='option_item op3' id='registrations_89'>Registrations</div>
         </div>
           <div class='sidepart_header2'> <span class='thing_3455' >Options</span> <div id='client_nav_close'> <i class='bx bx-chevron-right '></i></div> </div>
          <div class='sidepart_items2' >
         <div style='text-align:center'>
            <span class='cloudthink'>Weldios<span style='color:grey'>LMS<span></span>
        </div>
         </div>
     </div>
     <div class='sidepart3 noner'>
         <div class='sidepart_header3'> <span class='thing_34555' id='data_change_23222'> </span> <div id='sidepart_terminate3'> <i class='bx bx-chevron-right '></i></div> </div>
         <div class='sidepart_items3' id='get_data_343222'>
         </div>
     </div>
    <div class='loader_main noner'>
     <div id="loading"></div>
    </div>
    <section>
    <nav>
        <div class='sikes34532'>
            <span class='cloudthink '>Weldios<span style='color:grey'>LMS<span></span>
        </div>      
        <div class='p-34923'>
        <!-- <div id='department_88' class='p-34923-1'>Departments</div> -->
        <div id='students_90' class='p-34923-2'>Students</div>
        <div id='registrations_88' class='p-34923-3'>Registrations</div>
           <div class='thing_download option_222' id=''>Install</div>
        </div>
        <div id='change_details' class='p-34924'>
       <img class='clock' src="<?php echo $avatar  ?>"/>&nbsp/&nbsp<span id='username_23'style='font-size:13px;'><?php echo $admin_name  ?></span>
        </div>
        <div class='client_nav_sec'>
           <i style='font-size:2rem;color:grey' class='bx bxs-grid-alt fa-bars'></i>
        </div>
    </nav>
    </section>
    <section>
        <div class='p-34927'>
            <div class='p-34927-1 noner'>
               <div class='p-34927-1-1' style='display:flex;align-items:center;justify-content:space-around' > <div id='change_89v1'>General </div> <div id='terminate_data'> <i class='bx bx-chevron-right '></i></div> </div>
               <div class='p-34927-1-2' id='load_data1'></div>
            </div>
            <div class='p-34927-2'>
      
                    <div class='p-34927-1-1-1' id='change_89v2'>General info</div>
                    <div class='p-34927-1-2'>
                      <div class='main_container' id='load_data2'>
                </div>
            </div>
        </div>
    </section>
<script>
    $("#students_90").click(function(){
          $("#change_89v1").text("Actions");
        $("#change_89v2").text("Data points");
        start_loader();
            $("#load_data2").load("view_students.php",function(){
            stop_loader();
            })
       
    })
        async function registerSW() {
        if ('serviceWorker' in navigator) {
            try {
            await navigator.serviceWorker.register('./sw.js');
            } catch (e) {
            console.log(`SW registration failed`);
            }
        }
        }
        $(document).ready(function(){
        let deferredPrompt;
        var addBtn = document.querySelectorAll('.option_222');
        for(h=0;h<addBtn.length;h++){
        addBtn[h].style.display = 'none';
        }
        window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
        for(i=0;i < addBtn.length; i++){
        addBtn[i].style.display = 'flex';
        addBtn[i].addEventListener('click', (e) => {
            deferredPrompt.prompt();
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
            
                } else {
        
                }
                deferredPrompt = null;
            });
        });
        }
        });

        })
        window.addEventListener('load', () => {
        registerSW();
        });
        $(".client_nav_sec").click(function(){
            $(".client_nav").removeClass("noner");
        })
        $(".op1").click(function(){
            $(".p-34927-1").removeClass("noner");
        })
        $("#terminate_data").click(function(){
                $(".p-34927-1").addClass("noner");
        })
        $(document).ready(function(){
            $("#department_89").click();
        })
            $(".button").click(function(){
        var button = document.querySelectorAll(".button");
        button.forEach((btn) => {
        btn.classList.remove("button_active");
        this.classList.add("button_active");
        })
        })   
        show_pop = (text) => {
            $(".changes_pop").removeClass("noner");
            $("#text_34322").text(text);
            setTimeout(() => {
                $(".changes_pop").addClass("noner");
            }, (1500));
        }
        show_pop_wrong = (text) => {
        let src_set_1 = document.querySelector(".src_set_1");
        src_set_1.setAttribute("src","Flame_No_Connection_transparent_by_Icons8.gif");
        $(".changes_pop_wrong").removeClass("noner");
        $("#text_3432299").text(text);
        setTimeout(() => {
            $(".changes_pop_wrong").addClass("noner");
                src_set_1.setAttribute("src","");
        }, (1500));
        }
        
        first_show = () => {
            document.querySelector(".loader_main").classList.remove("noner");
        setTimeout(() => {
                  document.querySelector(".loader_main").classList.add("noner");
            }, 2500)
         }
        start_loader = () => {
            document.querySelector(".lineloader").classList.remove("noner");
        }
        stop_loader = () => {
            document.querySelector(".lineloader").classList.add("noner");
        }
        first_show();
        $("#department_89").click(function(){
        $("#change_89v1").text("Actions");
        $("#change_89v2").text("Data points");
        start_loader();
        $("#load_data1").load("actions.php", function(){
            $("#load_data2").load("data_points.php",function(){
                $("#get_dep").click();
            stop_loader();
            })
        })
        })
        $("#department_88").click(function(){
        $("#change_89v1").text("Departments");
        $("#change_89v2").text("Stats");
        start_loader();
        $("#load_data1").load("department_lists.php", function(){
            $("#load_data2").load("shy.php",function(){
            stop_loader();
            })
        })
        })
        $("#students_89").click(function(){
        start_loader();
        $("#data_change_232").text("Add students");
        $("#get_data_3432").load("add_students.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
        })
        $("#students_88").click(function(){
        start_loader();
        $("#data_change_232").text("Add students");
        $("#get_data_3432").load("add_students.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
        })
        $("#change_details").click(function(){
        start_loader();
        $("#data_change_232").text("Personalize");
        $("#get_data_3432").load("change_details.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
        })
        $("#registrations_89").click(function(){
        start_loader();
        $("#data_change_23222").text("Registrations");
        $("#get_data_343222").load("see_registrations.php",function(){
        stop_loader();
        $(".sidepart3").removeClass("noner");
        })
        })
        $("#registrations_88").click(function(){
        start_loader();
        $("#data_change_23222").text("Registrations");
        $("#get_data_343222").load("see_registrations.php",function(){
        stop_loader();
        $(".sidepart3").removeClass("noner");
        })
        })
        $("#sidepart_terminate").click(function(){
            $(".sidepart").addClass("noner");
        })
        $("#sidepart_terminate2").click(function(){
            $(".sidepart2").addClass("noner");
        })
        $("#sidepart_terminate3").click(function(){
            $(".sidepart3").addClass("noner");
        })
        $("#client_nav_close").click(function(){
            $(".client_nav").addClass("noner");
        })
        const player = document.querySelector('.playerContainer');
        const video = document.querySelector('.xdPlayer');
        const fullscreenBtn = document.querySelector('.fullscreen');
        const seek = document.getElementById('seek');
        const speedbtn = document.getElementById('speedbtn');
        const playButton = document.getElementById('play');
        const playbackIcons = document.querySelectorAll('.playback-icons use');
        const togglePlayBtn = document.querySelector('.toggle-play');
        const speedBtns = document.querySelectorAll('.speed-item');
        const volumeSeek = document.getElementById('volumeSeek');
        const lock = document.getElementById('lock');
        const unlock = document.getElementById('unlock');
        const videocontrols = document.getElementById('video-controls');
        const superplay = document.getElementById('superplay');
        const rewbtn = document.getElementById('rew');
        const forbtn = document.getElementById('for');
        var textCurrent = document.querySelector('.current-time');
        var duration = document.querySelector('.total-time');
        var speedlist = document.querySelector('#speed-list');
        //GLOBAL VARS
        let lastVolume = 1;
        let isMouseDown = false;
        let isSpeedSheet = false;
        let isMax = false;
        function togglePlay() {
            // For Firest Play Btn
            if (superplay.style.display != 'none') {
                superplay.style.display = 'none';
            }
            if (video.paused || video.ended) {
                video.play();
            }
            else {
                video.pause();
            }
        }
        // Function For Time Making
        function neatTime(time) {
            let minutes = Math.floor((time % 3600) / 60);
            let seconds = Math.floor(time % 60);
            seconds = seconds > 9 ? seconds : `0${seconds}`;
            return `${minutes}:${seconds}`;
        }

        // Function For Makeing Seconds Into Minutes formet
        function formatTime(timeInSeconds) {
            const result = new Date(timeInSeconds * 1000).toISOString().substr(11, 8);

            return {
                minutes: result.substr(3, 2),
                seconds: result.substr(6, 2),
            };
        };

        // Play Button Image Update
        function updatePlayButton() {

            if (video.paused) {
                togglePlayBtn.innerHTML = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 17.804 17.804" style="enable-background:new 0 0 17.804 17.804;" xml:space="preserve"><g><g id="c98_play"><path d="M2.067,0.043C2.21-0.028,2.372-0.008,2.493,0.085l13.312,8.503c0.094,0.078,0.154,0.191,0.154,0.313
			   c0,0.12-0.061,0.237-0.154,0.314L2.492,17.717c-0.07,0.057-0.162,0.087-0.25,0.087l-0.176-0.04
			   c-0.136-0.065-0.222-0.207-0.222-0.361V0.402C1.844,0.25,1.93,0.107,2.067,0.043z"/></g><g id="Capa_1_78_"></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
   `;
            } else {
                togglePlayBtn.innerHTML = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		viewBox="0 0 47.607 47.607" style="enable-background:new 0 0 47.607 47.607;" xml:space="preserve"><g><path d="M17.991,40.976c0,3.662-2.969,6.631-6.631,6.631l0,0c-3.662,0-6.631-2.969-6.631-6.631V6.631C4.729,2.969,7.698,0,11.36,0
		   l0,0c3.662,0,6.631,2.969,6.631,6.631V40.976z"/><path d="M42.877,40.976c0,3.662-2.969,6.631-6.631,6.631l0,0c-3.662,0-6.631-2.969-6.631-6.631V6.631
		   C29.616,2.969,32.585,0,36.246,0l0,0c3.662,0,6.631,2.969,6.631,6.631V40.976z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
   `;
            }

        }


        // Updateing Seekbar
        function updateProgress() {
            seek.value = Math.floor(video.currentTime);
            textCurrent.innerHTML = `${neatTime(video.currentTime)}`;
            // isMax Is For Set Max For Seekbar Only 1 Time
            if (isMax) {

            }
            else {
                const time = formatTime(Math.round(video.duration))
                duration.innerHTML = `${time.minutes}:${time.seconds}`;
                seek.setAttribute('max', Math.round(video.duration));
                console.log(video.lenth);
                isMax = true;
            }
        }

        // Function For Change Volume 
        function changevolume() {
            if (video.muted) {
                video.muted = false;
            }
            video.volume = volumeSeek.value;
        }

        // Function For Skip Video By Seekbar
        function skipAhead(event) {
            const skipTo = event.target.dataset.seek
                ? event.target.dataset.seek
                : event.target.value;
            video.currentTime = skipTo;
            seek.value = skipTo;
        }

        //Function For Fullscreen
        function launchIntoFullscreen(element) {
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }
        }
        function exitFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }

        var fullscreen = false;
        function toggleFullscreen() {
            fullscreen ? exitFullscreen() : launchIntoFullscreen(player)
            fullscreen = !fullscreen;
        }

        // function For Playback Speed
        function setSpeed(e) {
            console.log(parseFloat(this.dataset.speed));
            video.playbackRate = this.dataset.speed;
            speedBtns.forEach(speedBtn => speedBtn.classList.remove('active'));
            this.classList.add('active');
        }

        function showSpeedSheet() {
            if (isSpeedSheet) {
                speedlist.style.display = 'none';
                isSpeedSheet = false;
            }
            else {
                speedlist.style.display = 'block';
                isSpeedSheet = true;
            }
        }

        // Keyboard Controll
        function handleKeypress(e) {
            switch (e.key) {
                case 'p':
                    togglePlay();
                    break;
                case 'm':
                    volumeSeek.value = 0;
                    video.volume = volumeSeek.value;
                    break;
                case 'f':
                    toggleFullscreen();
                    break;
                case 's':
                    showSpeedSheet();
                    break;
                case 'p':
                    togglePip();
                    break;
            }
        }
        // Functions For Lock & UnLock
        function lockControls() {
            unlock.style.display = 'block';
            videocontrols.style.opacity = '0';
        }
        function unLockControls() {
            unlock.style.display = 'none';
            videocontrols.style.opacity = '.9';
        }
        //EVENT LISTENERS
        playButton.addEventListener('click', togglePlay);
        video.addEventListener('click', togglePlay);
        video.addEventListener('play', updatePlayButton);
        video.addEventListener('pause', updatePlayButton);
        video.addEventListener('ended', togglePlay);
        video.addEventListener('timeupdate', updateProgress);
        video.addEventListener('canplay', updateProgress);
        superplay.addEventListener('click', function () {
            superplay.style.display = 'none';
            togglePlay();
        })
        seek.addEventListener('input', skipAhead);
        volumeSeek.addEventListener('input', changevolume);
        lock.addEventListener('click', lockControls);
        unlock.addEventListener('click', unLockControls);
        rewbtn.addEventListener('click', function () {
            let skip = video.currentTime - 10;
            video.currentTime = skip;
            seek.value = skip;
        });
        forbtn.addEventListener('click', function () {
            let skip = video.currentTime + 10;
            video.currentTime = skip;
            seek.value = skip;
        });
        window.addEventListener('mousedown', () => isMouseDown = true)
        window.addEventListener('mouseup', () => isMouseDown = false)

        fullscreenBtn.addEventListener('click', toggleFullscreen);
        speedbtn.addEventListener('click', showSpeedSheet);

        speedBtns.forEach(speedBtn => {
            speedBtn.addEventListener('click', setSpeed);
        });

        window.addEventListener('keyup', handleKeypress);
 

        $(".redcard").click(function(){
          $(".bg-pop").addClass("noner");
        })
   
</script>    
</body>
</html>
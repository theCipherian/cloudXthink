<!-- Written By THE DARK THRONE -->
<?php
session_start();
include("init_sec.php");
if(!isset($_SESSION['cloudcat_data_sec'])){
  ?>
<script>
    window.location.href = 'cloudcat_passage1.php'
</script>
  <?php
}else{
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='author' content='Kenneth Okpala Chibuzor'>
    <link rel="shortcut icon" type="image/jpg" href="weldios_thingy.png"/>
     <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!-- FONTS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@500&display=swap" rel="stylesheet">
    <script src='https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js'></script>
    <link rel="manifest" href="manifest.webmanifest">
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="style.css">
    <!-- END STYLESHEETS -->
    <!-- SCRIPTS --> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
    <script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>
    <!-- END SCRIPTS -->
    <title>Weldios LMS</title>
    <style>

    :root {
	--accent: #0094ff;	
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
    background-color:rgba(255,255,255,0.80);
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
.sidepart_items::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.sidepart_items::-webkit-scrollbar-thumb{
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
.sidepart_header i{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    cursor:pointer;
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
 select:focus{
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
    min-height:100vh;
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
.icon_show, .icon_hide{
    color:grey;
    font-size:1.5rem;
    cursor:pointer;
}


.noner{
    display:none;
    opacity:0;
    visibility:hidden;
}


.top-bar {
  background: #333;
  color: #fff;
  padding: 1rem;
}

.btn {
  background: coral;
  color: #fff;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 0.7rem 2rem;
}

.btn:hover {
  opacity: 0.9;
}

.page-info {
  margin-left: 1rem;
}

.error {
  background: orangered;
  color: #fff;
  padding: 1rem;
}
.cloudthink{
       font-family: 'Josefin Sans', sans-serif;
       font-size:2rem;
       color:#454545;
       font-weight:bold;
}

.p-34927-1{
    transition:.5s ease;
}

.p-34927-1:hover{
    transform:rotate(2deg);
    transition:.5s ease;
}

.button{
    transition:.5s ease;
}
.button:hover{
    transform:translateY(-10px) !important;
    transition:.5s ease;
}
.button_active{
    border-color:limegreen !important;
    color:limegreen !important;
}
.row_item{
    display:flex;
    width:100%;
    justify-content:space-evenly;
    height:9rem;
    align-items:center;
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
  #terminate_data{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    display:none;
    cursor:pointer;

}
.client_nav_sec{
    display:none;
    opacity:0;
    visibility:hidden;
}
.bg_s{
    width:50% !important;
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
    .bg_s{
    width:100% !important;
}
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
       .row_item{
    display:flex !important;
    flex-direction:column !important;
    width:100% !important;
    justify-content:space-around !important;
    min-height:20rem !important;
    height:20rem !important;
    align-items:flex-start !important;;
    padding:1rem;
    border-bottom:1px solid #ddd;
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

.sidepart_header2 i{
    color:#ddd;
    margin-right:2rem;
    font-size:3rem;
    cursor:pointer;
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

.sidepart_items2::-webkit-scrollbar{
    background-color:rgba(255, 166, 0, 0.01);
}

.sidepart_items2::-webkit-scrollbar-thumb{
    border-radius:30px;
    background-color:rgba(138, 43, 226, 0.09);
}

.p-34927-1{
    z-index:1000;
}

html{
    -webkit-tap-highlight-color: transparent !important;
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
    font-size:14px !important;
      font-family: 'Maven Pro', sans-serif !important;
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
  font-size:14px !important;
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
@-webkit-keyframes loader4 {
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
.button, .btn{
    border: 2px solid #ddd !important;
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
.department_add input{
    border:2px solid #eee !important;
}
textarea{
       border:2px solid #eee !important;
}
.flex-wrapper {
  display: flex;
  flex-flow: row nowrap;
}

.single-chart {
  width: 33%;
  justify-content: space-around ;
}

.circular-chart {
  display: block;
  margin: 10px auto;
  max-width: 100%;
  max-height: 50px;
}

.circle-bg {
  fill: none;
  stroke: #eee;
  stroke-width: 3.8;
}

.circle {
  fill: none;
  stroke-width: 2.8;
  stroke-linecap: round;
  animation: progress 1s ease-out forwards;
}

@keyframes progress {
  0% {
    stroke-dasharray: 0 100;
  }
}

.circular-chart.orange .circle {
  stroke: #ff9f00;
}

.circular-chart.green .circle {
  stroke: #4CC790;
}

.circular-chart.blue .circle {
  stroke:rgba(255, 166, 0, 1);
}

.percentage {
  fill: #666;
  font-size: 0.5em;
  text-anchor: middle;
}
    </style>
</head>
<body>
    <div class='lineloader noner'>
    <div class="loader3">
    <span></span>
    <span></span>
</div>
    </div>
    <div class='loader_main noner'>
     <div class="loader3">
    <span></span>
    <span></span>
</div>
  </div>
    <section>
             <div class='client_nav noner'>
         <div class='options_data' style='z-index:120;'>
              <div class='option_item op1' id='list_news_89'>News</div>
              <div class='option_item op2' id='list_courses_88'>Courses</div>
              <div class='option_item op3' id='list_progress_88'>Progress</div>
         </div>
           <div class='sidepart_header2'> <span class='thing_3455' >Options</span> <div id='client_nav_close'> <i class='bx bx-chevron-right '></i></div> </div>
          <div class='sidepart_items2' >
         <div style='text-align:center'>
            <span class='cloudthink'>Weldios<span style='color:grey'>LMS<span></span>
        </div>
         </div>
     </div>
    <nav>
        <div class='sikes34532'>
            <span class='cloudthink'>Weldios<span style='color:grey'>LMS<span></span>
        </div>
        <div class='p-34923'>
        <i class='icon_show bx bx-fullscreen'></i>
        <i class='icon_hide noner bx bx-exit-fullscreen'></i>
        <div class='p-34923-1 ' id='list_news_88'>News</div>
        <div class='p-34923-2' id='list_courses_89'>Courses</div>
        <div class='p-34923-3' id='list_progress_89'>Progress</div>
         <div class='thing_download option_222' id=''>Install</div>
        </div>  
        <div id='change_details' class='p-34924'>
        <img class='clock' src="<?php echo $avatar  ?>" />&nbsp/ <span id='username_23' style='font-size:13px;'><?php echo $username  ?></span>
        </div>
         <div class='client_nav_sec'>
          <i style='font-size:2rem;color:limegreen' class='bx bx-navigation'></i>
        </div>
    </nav>
    </section>
    <section>
        <div  class='changes_pop noner'>
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
        <!-- SIDE PARTS -->
        <div class='sidepart noner'>
        <div class='sidepart_header'> <span class='thing_345' id='data_change_232'> </span> <div id='sidepart_terminate'> <i class='bx bx-chevron-right '></i></div> </div>
        <div class='sidepart_items' id='get_data_3432'> 
        </div>
        </div>
        <div class='p-34927'>
            <div class='p-34927-1'  >
               <div class='p-34927-1-1' style='display:flex;align-items:center;justify-content:space-around' > <div id='change_89v1'>Courses </div> <div id='terminate_data'> <i class='bx bx-chevron-right '></i></div>
             <div class="single-chart">
    <svg viewBox="0 0 36 36" class="circular-chart blue">
      <path class="circle-bg"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <path class="circle"
        stroke-dasharray="80, 100"
        d="M18 2.0845
          a 15.9155 15.9155 0 0 1 0 31.831
          a 15.9155 15.9155 0 0 1 0 -31.831"
      />
      <text x="18" y="20.35" class="percentage ">90%</text>
    </svg>
    
  </div>
  <div style='font-size:14px' class='tooltip'>400hrs <span class="tooltiptext2">finish time</span></div>
            </div>
               <div class='p-34927-1-2' id='load_data1'>    
               </div>
            
            </div>
            <div class='p-34927-2' id='trench'>
               
            <a href='terminate.php'> <div class='logout'>
                 <i class='bx bx-power-off'></i>
                    </div></a>
                    <div class='p-34927-1-1-1' > <div style='position:absolute;left:10px;font-size:2rem'> <i class='bx bx-left-arrow-alt'></i></div> <?php echo $student_department_name  ?> - <?php echo $student_programme_name   ?></div>
                    <div class='p-34927-1-2'>
                      <div class='main_container' id='load_data2'>
                </div>
             
            </div>
        </div>
    </section>
<script>
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
    $(".op2").click(function(){
        $(".p-34927-1").removeClass("noner");
    })
    $("#terminate_data").click(function(){
         $(".p-34927-1").addClass("noner");
    })
    $("#client_nav_close").click(function(){
            $(".client_nav").addClass("noner");
    })
    $(document).ready(function(){
    $("#list_progress_89").click();
    })
    $(".icon_show").click(function(){
    var elem = document.documentElement;
    /* View in fullscreen */
    function openFullscreen() {
    if (elem.requestFullscreen) {
    elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) {
    elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) {
    elem.msRequestFullscreen();
    }
    }

    openFullscreen();
    $(".icon_show").addClass("noner");
    $(".icon_hide").removeClass("noner");
    // var elem = document.documentElement;
    // elem.addEventListener('fullscreenchange', (event) => {
    //    $(".icon_show").removeClass("noner");
    // $(".icon_hide").addClass("noner");
    // });

    })
$(".icon_hide").click(function(){
var elem = document.documentElement;

/* Close fullscreen */
function closeFullscreen() {
  if (document.exitFullscreen) {
    document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { 
    document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen();
  }
}


closeFullscreen();
$(".icon_show").removeClass("noner");
$(".icon_hide").addClass("noner");
})

       $("#sidepart_terminate").click(function(){
            $(".sidepart").addClass("noner");
        })
        $("#change_details").click(function(){
        start_loader();
        $("#data_change_232").text("Personalize");
        $("#get_data_3432").load("change_details_2.php",function(){
        stop_loader();
        $(".sidepart").removeClass("noner");
        })
        })
       show_pop = (text) => {
           $(".changes_pop").removeClass("noner");
           $("#text_34322").text(text);
           setTimeout(() => {
                $(".changes_pop").addClass("noner");
           }, (2000));
       }
       show_pop_wrong = (text) => {
       let src_set_1 = document.querySelector(".src_set_1");
           src_set_1.setAttribute("src","Flame_No_Connection_transparent_by_Icons8.gif");
           $(".changes_pop_wrong").removeClass("noner");
           $("#text_3432299").text(text);
           setTimeout(() => {
                $(".changes_pop_wrong").addClass("noner");
                   src_set_1.setAttribute("src","");
           }, (3000));
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
        $("#list_courses_89").click(function(){
        $("#change_89v1").text("Courses");
        $("#change_89v2").text("Materials");
        start_loader();
        $("#load_data1").load("student_course_list.php", function(){
            $("#load_data2").load("course_data.php",function(){
            stop_loader();
            })
        })
        })
        $("#list_news_89").click(function(){
            show_pop("Coming soon");
        })
        $("#list_news_88").click(function(){
            show_pop("Coming soon");
        })
        $("#list_progress_89").click(function(){
        $("#change_89v1").text("Courses");
        $("#change_89v2").text("Progress");
        start_loader();
        $("#load_data1").load("student_course_list.php", function(){
            $("#load_data2").load("view_progress.php",function(){
            stop_loader();
            })
        })
        })
        $("#list_courses_88").click(function(){
        $(".client_nav").addClass("noner");
        $("#change_89v1").text("Courses");
        $("#change_89v2").text("Materials");
        start_loader();
        $("#load_data1").load("student_course_list.php", function(){
            $("#load_data2").load("course_data.php",function(){
            stop_loader();
            })
        })
        })
        $("#list_progress_88").click(function(){
               $(".client_nav").addClass("noner");
        $("#change_89v1").text("Courses");
        $("#change_89v2").text("Progress");
        start_loader();
        $("#load_data1").load("student_course_list.php", function(){
            $("#load_data2").load("view_progress.php",function(){
            stop_loader();
            })
        })
        })
      

   
</script>    
</body>
</html>
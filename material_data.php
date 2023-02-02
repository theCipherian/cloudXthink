<style>
    .video_frame{
        width:100%;
        height:100%;
    }
    @media screen and (max-width:900px){
     .video_frame{
         width:100%;
         height:315px;
         
    }
        #video-controls{
        max-width:100% !important;
        width:100% !important;
        min-width:100% !important;
        right:0 !important;

    }
    }

    #volumeSeek{
        max-width:40px !important;
    }
</style>
<?php
session_start();
include("init_sec.php");
if(isset($_SESSION['cloudcat_data_sec'])){
    $cloudcat_citizen = $_SESSION['cloudcat_data_sec'];
}
if(isset($_SESSION['material_data'])){
    $material_data = $_SESSION['material_data'];
}
    $query = mysqli_query($init_sec, "SELECT * FROM course_material_ WHERE unique_id = '$material_data'");
    $array = mysqli_fetch_array($query);
    $uni2232 = $array['unique_id'];
    $material_name = $array['material_name'];
    $material_data = $array['material_data'];
    $material_type = $array['material_type'];
    $material_deploy_note = $array['deploy_note'];
    $material_deploy_date = $array['date'];

    if($material_type == 'yt_link'){
        ?>
<iframe class='video_frame' id='iframe' src="<?php echo $material_data ?>" title="YouTube video player"
frameborder="0" allow="accelerometer"
allowfullscreen></iframe>
<script>
 
 function run(){
     var igo = document.getElementById("iframe");
     igo.addEventListener("load", function(e){
         console.log(e)
     })
 }
 run();
</script>

<?php
    }else if($material_type == 'video'){
   
        ?>
          <video  style='width:100%;height:100%'  class='player'
                                controls
                                crossorigin
                                playsinline
                                data-poster="">
                                <source
                                src='video_uploads/<?php echo $material_data ?>'
                                type="video/mp4"
                                size="576"
                                />
                                </video>
        <!-- Video Controls End -->
    
    </div>
    <script>
var players = Array.from(document.querySelectorAll('.player')).map((p) => new Plyr(p));</script>
<script>
    <script>
        var  player = document.querySelector('.playerContainer');
        var video = document.querySelector('.xdPlayer');
        var fullscreenBtn = document.querySelector('.fullscreen');
        var seek = document.getElementById('seek');
        var speedbtn = document.getElementById('speedbtn');
        var playButton = document.getElementById('play');
        var playbackIcons = document.querySelectorAll('.playback-icons use');
        var togglePlayBtn = document.querySelector('.toggle-play');
        var speedBtns = document.querySelectorAll('.speed-item');
        var volumeSeek = document.getElementById('volumeSeek');
        var lock = document.getElementById('lock');
        var unlock = document.getElementById('unlock');
        var videocontrols = document.getElementById('video-controls');
        var superplay = document.getElementById('superplay');
        var rewbtn = document.getElementById('rew');
        var forbtn = document.getElementById('for');

        var textCurrent = document.querySelector('.current-time');
        var duration = document.querySelector('.total-time');
        var speedlist = document.querySelector('#speed-list');

        //GLOBAL VARS
          var lastVolume = 1;
         var isMouseDown = false;
          var isSpeedSheet = false;
          var isMax = false;


        //PLAYER FUNCTIONS

        // Play/Pause Function
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
              var result = new Date(timeInSeconds * 1000).toISOString().substr(11, 8);

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
                 var time = formatTime(Math.round(video.duration))
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
              var skipTo = event.target.dataset.seek
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
              var skip = video.currentTime - 10;
            video.currentTime = skip;
            seek.value = skip;
        });
        forbtn.addEventListener('click', function () {
             var skip = video.currentTime + 10;
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
    </script>
<?php
    }else if($material_type == 'text'){
            ?>
<script>
    window.location.href = 'cloudreader/';
</script>

<?php
    }
    ?>


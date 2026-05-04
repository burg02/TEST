$(document).ready(function() {

    if(window.location.pathname == "/dashboard") {

        let audioFile = "assets/uploads/music-file/"+$(".btn-play-trending").data("target");
        let audio = new Audio(audioFile);
        let count = 0;

        $(".btn-play-trending").on("click", function() {
            if(count === 0) {
                count = 1;
                audio.play();
                $(this).html("Pause <i class='bx bx-pause'></i>");
            } else {
                count = 0;
                audio.pause();
                $(this).html("Play <i class='bx bx-play'></i>");
            }
        });
    }

    $("audio").on("play", function() {
        $("audio").not(this).each(function(index, audio) {
            audio.pause();
        });
        savePlayedMusic(this.id);
    });

    function savePlayedMusic(id) {
        $.ajax({
            url: '/savePlayedMusic',
            type: 'post',
            data: {
                id: id
            }, success: function(response) {
                console.log(response);
            }
        })
    }

});
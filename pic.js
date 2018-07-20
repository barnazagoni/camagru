(function () {

    var video = document.getElementById('video'),
        canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia = (navigator.getUserMedia ||
        navigator.webkitGetUserMedia ||
        navigator.mozGetUserMedia ||
        navigator.msGetUserMedia);

    navigator.getMedia({
        video: true,
        audio: false
    }, function (stream) {
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function (error) {
        document.getElementById('vid-container').innerHTML = '<div class="notification">No webcam was detected. Please upload an image.</div><input type="file" accept="image/*" onchange="loadFile(event)">'        
        console.log(error);
    });

    document.getElementById('video').addEventListener('click', function () {
        canvas.width = video.clientWidth;
        canvas.height = video.clientHeight;
        var vratio = canvas.width / video.videoWidth;
        context.drawImage(video, 0,0, video.videoWidth, video.videoHeight, 0, 0, video.clientWidth, video.clientHeight);
        document.getElementById("canvas").style.display = "";
        document.getElementById("video").style.display = "none";
        saveImage();
    })
    document.getElementById('canvas').addEventListener('click', function () {
        document.getElementById("canvas").style.display = "none";
        document.getElementById("video").style.display = "";
    })

    //stickers
    var stickers = document.getElementsByClassName("control image");
    for (element of stickers)
    {
        element.addEventListener('click', function (){
            output = this.firstChild.nextSibling;
            document.getElementsByName("stickername")[0].setAttribute("value", this.firstChild.nextSibling.id);
            context.drawImage(output, 0,0, canvas.width, canvas.height);
        });
    }
})();

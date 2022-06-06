<div class="card-style mb-30">
    <h6 class="mb-25">Input Film</h6>
    <form wire:submit.prevent="uploadVideo">
        <div class="input-style-1">
            <label>Video</label>
            <input type="file" id="video" wire:model="video"/>
        </div>

        <div class="input-style-3">
            <div class="progress">
                <div id="progress" class="progress-bar" role="progressbar" style="width: 0"
                     aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <button id="cl" type="button">select</button>
        <button type="submit">Send</button>
    </form>
    <video id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="640"
    height="264"
    poster="MY_VIDEO_POSTER.jpg"
    data-setup="{}"
    >
    <source src="{{asset('videos/dwTAy1BO9j5KvOZHgiLu8OxbUt1dGWbliyk02WiA.mp4')}}" type="video/mp4" />
    <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
        >
    </p>
    </video>
</div>

<script>
    document.getElementById('cl').addEventListener('click', function () {
        document.getElementById('video').click();
    });
    window.addEventListener('livewire-upload-start', event => {
        console.log('upload started');
    });
    window.addEventListener('livewire-upload-finish', event => {
        console.log('upload finished');
        document.getElementById('progress').style.width = `100%`;

    });
    window.addEventListener('livewire-upload-error', event => {
        console.log('upload error');
    });
    window.addEventListener('livewire-upload-progress', event => {
        console.log(`${event.detail.progress}%`);
        document.getElementById('progress').style.width = `${event.detail.progress}%`;
    });
</script>

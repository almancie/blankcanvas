(() => {

  // Variables
  const videoReadyClass = 'video-ready';
  const videoStartedClass = 'video-started';

  // Create player
  const createPlayer = (element, settings) => {
    if (settings.videoWidth) {
      element.style.width = settings.videoWidth;
    }

    if (settings.videoAlignment) {
      element.classList.add('video-align-' + settings.videoAlignment)
    }

    const player = document.createElement('div');

    element.appendChild(player);

    const onPlayerReady = () => {
      element.classList.add(videoReadyClass);

      element.youtubePlayer.mute();
  
      if (settings.videoState === 'scroll') {
        onScreen(element, () => {
          element.youtubePlayer?.playVideo();
        });

        return;
      }
  
      if (settings.videoState === 'playing') {
        element.youtubePlayer?.playVideo();
      }
    }
  
    const onPlayerStateChange = event => {
      if (event.data !== YT.PlayerState.PLAYING) return;

      element.classList.add(videoStartedClass);
    }

    element.youtubePlayer = new YT.Player(player, {
      videoId: settings.videoId,
      playerVars: {
        'playsinline': 1,
        'controls': settings.videoControls === 'false' ? 0 : 1,
      },
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }

  // Create player on API ready
  const createPlayerOnReady = (element, settings) => {
    if (YT.loaded === 1) {
      createPlayer();

      return;
    }

    onYouTubeIframeAPIReady = () => {
      createPlayer(element, settings);
    }
  }

  // Create dynamically
  document.querySelectorAll('[data-video-id]').forEach(element => {
    createPlayerOnReady(element, element.dataset);
  });
})();
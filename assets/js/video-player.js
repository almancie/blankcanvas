window.addEventListener('load', () => {
  document.querySelectorAll('video').forEach(video => {
    const addReadyClass = () => video.classList.add('video-ready');
    const addStartedClass = () => video.classList.add('video-started');
    const isVideoPlaying = video => !! (video.currentTime > 0 && ! video.paused && ! video.ended && video.readyState > 2);
    
    if (video.readyState === 4) {
      addReadyClass();
    }

    if (isVideoPlaying(video)) {
      addStartedClass();
    }

    video.addEventListener('canplay', addReadyClass);
    video.addEventListener('play', addStartedClass);

    if (video.hasAttribute('wait')) {
      onScreen(video, () => {
        video.readyState === 4 
          ? video.play()
          : video.addEventListener('canplay', () => video.play());
      });
    }
  });
});
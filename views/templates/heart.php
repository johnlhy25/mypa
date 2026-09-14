<style>
  #snowflakeContainer {
    position: absolute;
    left: 0px;
    top: 0px;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
    z-index: 1000;
  }

  .snowflake {
    position: fixed;
    user-select: none;
    z-index: 1000;
    pointer-events: none;
    font-size: 20px;
  }
</style>

<div id="snowflakeContainer">
  <i class="fa fa-snowflake-o snowflake" aria-hidden="true"></i>
</div>

<audio id="backgroundMusic">
  <source src="https://rms.tesdar02onlinereporting.ph/music/1.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/2.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/3.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/4.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/5.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/6.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/7.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/8.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/9.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/10.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/11.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/12.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/13.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/14.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/15.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/16.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/17.mp3" type="audio/mpeg">
  <source src="https://rms.tesdar02onlinereporting.ph/music/18.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>

<script>
  let snowflakes = [];
  let browserWidth;
  let browserHeight;
  const numberOfSnowflakes = 50;
  let resetPosition = false;
  let enableAnimations = false;
  const reduceMotionQuery = matchMedia("(prefers-reduced-motion)");

  function setAccessibilityState() {
    enableAnimations = !reduceMotionQuery.matches;
  }
  setAccessibilityState();
  reduceMotionQuery.addListener(setAccessibilityState);

  function setup() {
    if (enableAnimations) {
      window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
      window.addEventListener("resize", setResetFlag, false);
      //document.addEventListener('click', playAudio, false); // Trigger play on user interaction
    }
  }
  setup();

  class Snowflake {
    constructor(element, speed, xPos, yPos) {
      this.element = element;
      this.speed = speed;
      this.xPos = xPos;
      this.yPos = yPos;
      this.scale = 1;
      this.counter = 0;
      this.sign = Math.random() < 0.5 ? 1 : -1;
      this.element.style.opacity = (0.1 + Math.random()) / 3;

      // Randomly assign color
      const colors = ["#FF0000", "#008000", "#FFFFFF", "#FFFF00"]; // red, green, white, yellow
      this.element.style.color = colors[Math.floor(Math.random() * colors.length)];
    }

    update(delta) {
      this.counter += (this.speed / 5000) * delta;
      this.xPos += (Math.random() * this.sign * delta * this.speed * Math.cos(this.counter)) / 20;
      this.yPos += Math.random() * 0.5 + (this.speed * delta) / 25;
      this.scale = 0.5 + Math.abs((10 * Math.cos(this.counter)) / 20);

      setTransform(this.xPos, this.yPos, this.scale, this.element);

      if (this.yPos > browserHeight) {
        this.yPos = -50;
        this.xPos = Math.random() * browserWidth;
      }
    }
  }

  function setTransform(xPos, yPos, scale, el) {
    el.style.transform = `translate3d(${xPos}px, ${yPos}px, 0) scale(${scale}, ${scale})`;
  }

  function generateSnowflakes() {
    const originalSnowflake = document.querySelector(".snowflake");
    const snowflakeContainer = originalSnowflake.parentNode;
    snowflakeContainer.style.display = "block";

    browserWidth = document.documentElement.clientWidth;
    browserHeight = document.documentElement.clientHeight;

    for (let i = 0; i < numberOfSnowflakes; i++) {
      const snowflakeClone = originalSnowflake.cloneNode(true);
      snowflakeContainer.appendChild(snowflakeClone);

      const initialXPos = getPosition(50, browserWidth);
      const initialYPos = getPosition(50, browserHeight);
      const speed = 10 + Math.random() * 30;

      const snowflakeObject = new Snowflake(snowflakeClone, speed, initialXPos, initialYPos);
      snowflakes.push(snowflakeObject);
    }

    snowflakeContainer.removeChild(originalSnowflake);
    requestAnimationFrame(moveSnowflakes);
  }

  let previousTime = performance.now();
  const framesPerSecond = 60;
  const frameInterval = 1000 / framesPerSecond;

  function moveSnowflakes(currentTime) {
    const delta = (currentTime - previousTime) / frameInterval;

    if (enableAnimations) {
      for (let snowflake of snowflakes) {
        snowflake.update(delta);
      }
    }

    previousTime = currentTime;

    if (resetPosition) {
      browserWidth = document.documentElement.clientWidth;
      browserHeight = document.documentElement.clientHeight;

      for (let snowflake of snowflakes) {
        snowflake.xPos = getPosition(50, browserWidth);
        snowflake.yPos = getPosition(50, browserHeight);
      }

      resetPosition = false;
    }

    requestAnimationFrame(moveSnowflakes);
  }

  function getPosition(offset, size) {
    return Math.round(-1 * offset + Math.random() * (size + 2 * offset));
  }

  function setResetFlag() {
    resetPosition = true;
  }

  function playAudio() {
    // Ask the user if they want to autoplay the music
  
  }

  function playRandomSong1() {
    const songs = ["https://rms.tesdar02onlinereporting.ph/music/1.mp3", "https://rms.tesdar02onlinereporting.ph/music/2.mp3", "https://rms.tesdar02onlinereporting.ph/music/3.mp3", "https://rms.tesdar02onlinereporting.ph/music/4.mp3", "https://rms.tesdar02onlinereporting.ph/music/5.mp3", "https://rms.tesdar02onlinereporting.ph/music/6.mp3", "https://rms.tesdar02onlinereporting.ph/music/7.mp3", "https://rms.tesdar02onlinereporting.ph/music/8.mp3", "https://rms.tesdar02onlinereporting.ph/music/9.mp3", "https://rms.tesdar02onlinereporting.ph/music/10.mp3", "https://rms.tesdar02onlinereporting.ph/music/11.mp3", "https://rms.tesdar02onlinereporting.ph/music/12.mp3", "https://rms.tesdar02onlinereporting.ph/music/13.mp3", "https://rms.tesdar02onlinereporting.ph/music/14.mp3", "https://rms.tesdar02onlinereporting.ph/music/15.mp3"];
    const randomSong = songs[Math.floor(Math.random() * songs.length)];
    const audioElement = document.getElementById("backgroundMusic");
    audioElement.src = randomSong;
    audioElement.play();
  }

</script>

$(function() {
  jQuery('.fullwidthbanner').revolution({
      delay: 9000,
      startwidth: 1170,
      startheight:450,
      hideThumbs: 10,
      fullWidth: "on",
      forceFullWidth: "on"
  });
  AOS.init({
    duration: 800,
    easing: 'ease-in-sine',
    delay: 100,
  });
});

/* affix the navbar after scroll below header */
$('nav').affix({
    offset: {
      top: $('#body').offset().top
    }
});
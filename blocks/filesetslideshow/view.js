function fileSetSlideShow(container) {
  var images = container.find('.fileset-slideshow-images img'),
      captions = container.find('.fileset-slideshow-caption'),
      navItems = container.find('.fileset-slideshow-nav-item'),
      previous = container.find('.fileset-slideshow-previous a'),
      next = container.find('.fileset-slideshow-next a'),
      thumbs = container.find('.fileset-slideshow-thumb-item'),
      thumbsExist = (thumbs.length > 0) ? true : false,
      thumbList = $('.fileset-slideshow-thumbs-list'),
      thumbPrevious = $('.fileset-slideshow-thumbs-previous'),
      thumbNext = $('.fileset-slideshow-thumbs-next'),
      count = images.length - 1,
      thumbWidth = 162,
      visibleThumbs = 5,
      index = 0,
      hold = false,
      goodbye = function(index) {
        images.eq(index).fadeOut('slow');
        captions.eq(index).fadeOut('slow');
        navItems.eq(index).removeClass('fileset-slideshow-nav-item-selected');
        if (thumbsExist) {
          thumbs.eq(index).removeClass('fileset-slideshow-thumb-item-selected');
        }
      },
      hello = function(index) {
        images.eq(index).fadeIn('slow');
        captions.eq(index).fadeIn('slow');
        navItems.eq(index).addClass('fileset-slideshow-nav-item-selected');
        if (thumbsExist) {
          thumbs.eq(index).addClass('fileset-slideshow-thumb-item-selected');
          if (index === 0) thumbList.stop().animate({left: 0});
          if (index + 1 > visibleThumbs) thumbNext.trigger('click');
        }
      };

  images.eq(0).show();
  captions.eq(0).show();
  navItems.eq(0).addClass('fileset-slideshow-nav-item-selected');

  // If there is only one image, don't animate
  if (images.length === 1) {
    return;
  }

  if (thumbsExist) {
    thumbs.eq(0).addClass('fileset-slideshow-thumb-item-selected');
  }

  setInterval(function() {
    if (hold) {
      hold = false;
      return;
    } else {
      goodbye(index);
      index = (index < count) ? index + 1 : 0;
      hello(index);
    }
  }, 6000);


  navItems.find('a').each(function(i) {
    $(this).click(function() {
      goodbye(index);
      index = i;
      hello(index);

      hold = true;

      return false;
    });
  });

  previous.click(function() {
    goodbye(index);
    index = (index > 0) ? index - 1 : count;
    hello(index);

    hold = true;

    return false;
  });

  next.click(function() {
    goodbye(index);
    index = (index < count) ? index + 1 : 0;
    hello(index);

    hold = true;

    return false;
  });

  if (thumbsExist) {

    // Set width of thumbList
    thumbList.css('width', thumbWidth * thumbs.length);

    thumbs.find('a').each(function(i) {
      $(this).click(function() {
        goodbye(index);
        index = i;
        hello(index);

        hold = true;

        return false;
      });

    });

    thumbPrevious.click(function() {
      var leftPosition = parseInt(thumbList.css('left'));
      if (leftPosition === 0) {
        return false;
      } else {
        thumbList.stop().animate({
          left: thumbWidth + leftPosition
        });
      }

      return false;
    });

    thumbNext.click(function() {
      var leftPosition = parseInt(thumbList.css('left')),
          maxLeft = -1 * ((thumbs.length - visibleThumbs) * thumbWidth);

      if (leftPosition > maxLeft) {
        thumbList.stop().animate({
          left: leftPosition - thumbWidth
        });
      }

      return false;
    });
  }


}

$(function() {
  fileSetSlideShow($('.fileset-slideshow'));
});

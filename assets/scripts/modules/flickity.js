const flickityelem2x = document.querySelector('.flickity-carousel--2x');
const flickityelem3x = document.querySelector('.flickity-carousel--3x');

if (flickityelem2x !== null){
  const flickitychildren = flickityelem2x.childElementCount;
  if (flickitychildren > 2){
    var flkty = new Flickity( flickityelem2x, {
      pageDots: false,
      prevNextButtons: false,
      freeScroll: false,
      cellAlign: 'left',
      setGallerySize: true
    });
  } else {
    flickityelem2x.className = "";
    flickityelem2x.classList.add('posts-list', 'posts-list--2x');
  }
};


if (flickityelem3x !== null){
  const flickitychildren = flickityelem3x.childElementCount;
  if (flickitychildren > 3){
    var flkty = new Flickity( flickityelem3x, {
      pageDots: false,
      prevNextButtons: false,
      freeScroll: false,
      cellAlign: 'left',
      setGallerySize: true
    });
  } else {
    flickityelem3x.className = "";
    flickityelem3x.classList.add('posts-list', 'posts-list--3x');
  }
};
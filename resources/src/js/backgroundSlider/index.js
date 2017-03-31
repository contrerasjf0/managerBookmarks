"use strict";

import 'vegas';

$(document).ready(() => {
  var container = $("#container-main-page-init");

  if(container.length == 1){

    container.vegas({
      delay: 11000,
      overlay: true,
        slides: [
            { src: "../../img/background/img1.png" },
            { src: "../../img/background/img2.png" },
            { src: "../../img/background/img3.png" },
            { src: "../../img/background/img4.jpg" }
        ]
    });
  }
});

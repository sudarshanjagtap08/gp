


$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('header').addClass('header-scrolled');
    } else {
      $('header').removeClass('header-scrolled');
    }
});



// ################## Latest Articles #################
// ####################################################
var swiper = new Swiper(".slide-content-latest-articles", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: false,
  centerSlide: true,
  fade: true,
  grabCursor: false,
  allowTouchMove: true,
  autoplay: {
      delay: 300000,
      disableOnInteraction: true,
  },
  pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
  },
  navigation: {
      nextEl: ".next_article",
      prevEl: ".prev_article",
  },

  breakpoints: {
      0: {
          slidesPerView: 1,
      },
      570: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 4,
      },
  },
});
// ################## Recent Posts #################
// ####################################################
var swiper = new Swiper(".slide-content-recent-posts", {
  slidesPerView: 1,
  spaceBetween: 20,
  loop: false,
  centerSlide: true,
  fade: true,
  grabCursor: false,
  allowTouchMove: true,
  autoplay: {
      delay: 300000,
      disableOnInteraction: true,
  },
  pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
  },
  navigation: {
      nextEl: ".next_article",
      prevEl: ".prev_article",
  },

  breakpoints: {
      0: {
          slidesPerView: 1,
      },
      570: {
          slidesPerView: 2,
      },
      950: {
          slidesPerView: 3,
      },
  },
});
// ####################################################
// ###################Filter Select#######################
// ####################################################
var x, i, j, selElmnt, a, b, c, inputBox;
x = document.getElementsByClassName("tt-select");

for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.setAttribute("onclick", "selectedItem(this)");


    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");

    divinputBox = document.createElement("DIV");
    divinputBox.setAttribute("class","px-1 py-1 filter_input_box");

    inputBox = document.createElement("input");
    inputBox.setAttribute("class","filter-option fs-tiny");
    inputBox.setAttribute("placeholder","Filter");

    divinputBox.appendChild(inputBox)
    b.appendChild(divinputBox);

    for (j = 0; j < selElmnt.length; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
           
            var y, i, k, s, h;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            h = this.parentNode.previousSibling;
            for (i = 0; i < s.length; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    for (k = 0; k < y.length; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
}
    a.addEventListener("click", function(e) {
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
function closeAllSelect(elmnt) {
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < x.length; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
// document.addEventListener("click", closeAllSelect);
document.addEventListener("click", function (e) {
    const target = e.target;
    const isInput = target.tagName === 'INPUT';

    if (!isInput) {
        closeAllSelect(target);
    }
});
// ####################################################
// ###################### Filter Items On typing ################
// ####################################################
let parent;
let selectItems;
let options;

function selectedItem(elm) {
    parent = elm.parentNode;
    selectItems = parent.querySelector(".select-items");
    options = selectItems.querySelectorAll("div");
}
let allInput = document.querySelectorAll(".select-items .filter-option");

allInput.forEach(function(elm){
    elm.addEventListener('input', function() {
        const filterText = elm.value.toLowerCase();

        options.forEach(function (option) {
            const optionText = option.textContent.toLowerCase();
            if (optionText.includes(filterText)) {
                option.style.display = "block";
            } else {
                if(!option.classList.contains("filter_input_box")){
                    option.style.display = "none";
                }
            }
        });
    })
})
// ####################################################
// ####################################################
// ####################################################
// Property Details Page

    $(document).ready(function() {
        $('.carousel-link').on('click', function(e) {
            e.preventDefault();
            var targetSlideIndex = $(this).data('slide-index');
            $('#modalPropertyFullView').carousel(targetSlideIndex);
        });
    });

// Modal Full View Carousel
// $(document).ready(function(){
//     var propertyimageclicked = $('.property_images');
//     var imgclickedon;
//     propertyimageclicked.click(function(e){
//         var carouselitems = document.querySelectorAll('.propertydetailsmodal');
//         carouselitems.forEach(function(item){
//             item.classList.remove('active');
//             console.log('carouselitems removed');
//         })
//         // console.log(e);
//         // carouselitems[img].classList.add('active');
       
//     })
//     function activeCarousel(item){
//         let carouselItems = document.querySelectorAll('.propertydetailsmodal');
//         console.log(carouselItems);
//         carouselItems[item-1].classList +=' active';
//     }
    
//     // // Function to remove active class from Carousel Items
//     function removeActive(){
//         let carouselItems = document.querySelectorAll('.propertydetailsmodal');
//         carouselItems.forEach(function(){
//             this.classList -= 'active';
//             console.log('removed active class');
//         })
//     }

// })

// ####################################################
// ####################################################
// ####################################################
// Homepage Load More Buttons 
let loadButton;
let loaderIcon;
let itemList;
let item;
// const itemList = document.getElementById('top-properties-list');
// const item = itemList.querySelectorAll('.col');


// Reset the Default items 
window.onload = function() {
    alert("Okay");
    // Homepage Top Properties Section 
    const topProp = document.getElementById('top-properties-list');
    const topPropItem = topProp.querySelectorAll('.col');
    // Display none of more than 6 items 
    for (let i = 6; i < topPropItem.length; i++) { topPropItem[i].style.display = 'none'; }
    // Homepage Featured Properties 
    const featuredProp = document.getElementById('featured-properties-list');
    const featuredPropItem = featuredProp.querySelectorAll('.col');
    // Display none of more than 6 items 
    for (let i = 6; i < featuredPropItem.length; i++) { featuredPropItem[i].style.display = 'none'; }
    // Homepage Explore the Deal Market 
    const ExploretheDealMarket = document.getElementById('explore-the-deal-market');
    const ExploretheDealMarketItem = ExploretheDealMarket.querySelectorAll('.col');
    // Display none of more than 6 items 
    for (let i = 6; i < ExploretheDealMarketItem.length; i++) { ExploretheDealMarketItem[i].style.display = 'none'; }

}


function getElements(buttonID,itemWrapperID){
    loadButton = document.getElementById(buttonID);
    loaderIcon = loadButton.querySelector('.loader-icon');
    itemList = document.getElementById(itemWrapperID);
    item = itemList.querySelectorAll('.col');
}

let itemCount = 6; // Initial item count
let ExploretheDealMarketloadMoreitemCount = 8; // Initial item count

function loadMore(buttonID,itemWrapperID) {
    // sets the value of elements 
    getElements(buttonID,itemWrapperID);

    loadButton.disabled = true;
    loaderIcon.style.visibility = 'visible';
    loaderIcon.style.display = 'inline-block';
    if(itemCount < item.length){ 
            itemCount += 3; // Update the item count
        }
    // Simulate loading data (setTimeout for demonstration)
    setTimeout(function() {
        for (let i = 6; i < itemCount; i++) {
            if(item[i]){ item[i].style.display = 'block'; }
            else{ break; }
        }
        
        loadButton.disabled = false;
        loaderIcon.style.visibility = 'hidden';
        loaderIcon.style.display = 'none';
    }, 1200); // Simulated loading delay in milliseconds
}

// Explore the Deal Market 
function ExploretheDealMarketloadMore(buttonID,itemWrapperID) {
    alert(buttonID)
    // sets the value of elements 
    getElements(buttonID,itemWrapperID);

    loadButton.disabled = true;
    loaderIcon.style.visibility = 'visible';
    loaderIcon.style.display = 'inline-block';
    if(ExploretheDealMarketloadMoreitemCount < item.length){ 
        ExploretheDealMarketloadMoreitemCount += 4; // Update the item count
        }
    // Simulate loading data (setTimeout for demonstration)
    setTimeout(function() {
        for (let i = 8; i < ExploretheDealMarketloadMoreitemCount; i++) {
            if(item[i]){ item[i].style.display = 'block'; }
            else{ break; }
        }
        
        loadButton.disabled = false;
        loaderIcon.style.visibility = 'hidden';
        loaderIcon.style.display = 'none';
    }, 1200); // Simulated loading delay in milliseconds
}

// ####################################################
// ####################################################
// ####################################################


let banner = document.querySelector(".banner");
let imgs = document.querySelectorAll(".banner ul li a img");
let lis = document.querySelectorAll(".banner .cur_li li");
let index = 0;
let timer = null;
change();

function change() {
    timer = setInterval(function() {
        if (index >= 3) {
            index = 0;
        }
        index++;
        imgs[1].setAttribute("src", "images/l" + index + ".jpg");

        for (let i = 1; i <= lis.length; i++) {

            if (i == index) {
                lis[i - 1].setAttribute("class", "cur");
            } else {
                lis[i - 1].setAttribute("class", "");
            }
        }
    }, 1000)
}

banner.onmouseenter = function() {
    clearInterval(timer);
}
banner.onmouseout = function() {
    change();
}
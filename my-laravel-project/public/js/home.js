$(document).ready(function () {
    'use strict';
    {
     // DOM取得
     // 親メニューのli要素
    const parentMenuItem = document.querySelectorAll('.menu__item');
    let prevScrollpos = window.pageYOffset;
    const header = document.querySelector('header');
    $(window).scroll(function(){
      let currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        console.log("上にスクロールしています");
        $(header).removeClass("scroll-down").addClass("scroll-up");
      } else {
        console.log("下にスクロールしています");
        $(header).removeClass("scroll-up").addClass("scroll-down");
      }
      prevScrollpos = currentScrollPos;
    });
    
        // イベントを付加
    for (let i = 0; i < parentMenuItem.length; i++) {
        parentMenuItem[i].addEventListener('mouseover', dropDownMenuOpen);
        parentMenuItem[i].addEventListener('mouseleave', dropDownMenuClose);
    }
    // ドロップダウンメニューを開く処理
    function dropDownMenuOpen(e) {
        // 子メニューa要素
        const childMenuLink = e.currentTarget.querySelectorAll('.drop-menu__link');
        console.log(childMenuLink);
        // is-activeを付加
        for (let i = 0; i < childMenuLink.length; i++) {
            childMenuLink[i].classList.add('is-active');
        }
    }
    // ドロップダウンメニューを閉じる処理
    function dropDownMenuClose(e) {
        // 子メニューリンク
        const childMenuLink = e.currentTarget.querySelectorAll('.drop-menu__link');
        console.log(childMenuLink);
        // is-activeを削除
        for (let i = 0; i < childMenuLink.length; i++) {
            childMenuLink[i].classList.remove('is-active');
        }
    }
    }
    });
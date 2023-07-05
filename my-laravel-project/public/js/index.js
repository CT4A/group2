$(document).ready(function () {
    'use strict';
    {
    // DOM取得
    // 親メニューのli要素
    const parentMenuItem = $('.menu__item');
    const header = $('header');
    const hamburgerIcon = $('.hamburger-icon');
    const hamburgerArea = $('.hamburger-area');
    const menuList  =  $('.menu_list');
    const accordion = $('.accordion');
    const menuItem =$(".menu_item");
    var hamburgerCnt =0;
    var windowNow = $(window);
    let prevScrollpos = window.pageYOffset;
    $(window).scroll(function(){
        let currentScrollPos = window.pageYOffset;
        if (prevScrollpos > currentScrollPos) {
            $(header).removeClass('scroll-down').addClass('scroll-up');
        } else {
            $(header).removeClass('scroll-up').addClass('scroll-down');
        }
        prevScrollpos = currentScrollPos;
    });
    $(hamburgerIcon).click(function() {
        if(hamburgerCnt ==0){
            $(hamburgerArea).addClass('hamburger-area-aft');
            hamburgerCnt = 1;
        }else{
            $(hamburgerArea).removeClass('hamburger-area-aft');
            hamburgerCnt = 0;
        }
    });
    $(accordion).click(function(){
        $(accordion).removeClass('.accordion');
        if($(this).hasClass('accordion-aft')){
            $(this).removeClass('accordion-aft');
        }else{
            $(this).addClass('accordion-aft');
            var numChildren = $(this).find('a').length;
        }
    });
    $(window).resize(function(){
        windowNow =$(window);
        console.log(windowNow);
    });
    // $(header).hover( 
    //     function(){     
    //         if($(windowNow).width() >= 767 && !$(hamburgerArea).hasClass("hamburger-area-aft")){
    //             $(menuList).addClass("menu_list_aft");
    //    }
    // },
    //     function(){
    //         $(menuList).removeClass("menu_list_aft");
    // }
    // )
    $(menuList).hover( 
        function(){     
            if($(windowNow).width() >= 767 && !$(hamburgerArea).hasClass("hamburger-area-aft")){
                $(this).addClass("menu_list_aft");
       }
    },
        function(){
            $(this).removeClass("menu_list_aft");
    }
    )

        // イベントを付加
    for (let i = 0; i < parentMenuItem.length; i++) {
        parentMenuItem[i].addEventListener('mouseover', dropDownMenuOpen);
        parentMenuItem[i].addEventListener('mouseleave', dropDownMenuClose);
    }
    // ドロップダウンメニューを開く処理
    function dropDownMenuOpen(e) {
        // 子メニューa要素
        const childMenuLink = e.currentTarget.querySelectorAll('.drop-menu__link');
        // is-activeを付加
        for (let i = 0; i < childMenuLink.length; i++) {
            childMenuLink[i].classList.add('is-active');
        }
    }
    // ドロップダウンメニューを閉じる処理
    function dropDownMenuClose(e) {
        // 子メニューリンク
        const childMenuLink = e.currentTarget.querySelectorAll('.drop-menu__link');
        // is-activeを削除
        for (let i = 0; i < childMenuLink.length; i++) {
            childMenuLink[i].classList.remove('is-active');
        }
    }
    }
});
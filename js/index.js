    $(document).ready(function () {
    'use strict';
    {
    // DOM取得
    // 親メニューのli要素
    const parentMenuItem = $('.menu__item');
    const hoverTest = $('')
    const header = $('header');
    const hamburgerIcon = $('.hamburger-icon');
    const hamburgerArea = $('.hamburger-area');
    const menuItem  =  $('.menu_item');
    const accordion = $('.accordion');
    var hamburgerCnt =0;
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
            // $(header).removeClass('scroll-up').addClass('scroll-down');
            hamburgerCnt = 1;
        }else{
            $(hamburgerArea).removeClass('hamburger-area-aft');
            // $(header).removeClass('scroll-down');
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
    $(header).hover(
        function(){
            console.log("開始");
            $(menuItem).addClass("menu_item_aft");
        },
        function(){
            console.log("終了");
            $(menuItem).removeClass("menu_item_aft");
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
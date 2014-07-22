Tuitui.headerView = Backbone.View.extend({

    el: "body",

    events: {
        "mouseover .publish-menu": "showPublish",
        "mouseout .publish-menu": "hiddenPublish",
        "mouseover .notice": "showNotice",
        "mouseout .notice": "hiddenNotice",
        "mouseover .userName": "showUserMenu",
        "mouseout .userName": "hiddenUserMenu"

    },


    initialize: function(options) {

    },

    showPublish: function(e) {
        e.preventDefault();
        $(".publish-menu").addClass('publish-cur');
        $(".publish").show();
    },
    hiddenPublish: function() {
        $(".publish-menu").removeClass('publish-cur');
        $(".publish").hide();
    },

    showNotice: function(e) {
        $(".notice").addClass('notice-cur');
        $(".notice_menu").show();
    },
    hiddenNotice: function(e) {
        $(".notice").removeClass('notice-cur');
        $(".notice_menu").hide();
    },
    showUserMenu: function() {
        $(".userName").addClass('usermenu-cur');
        $(".userNameMenu").show();
    },
    hiddenUserMenu: function() {
        $(".userName").removeClass('usermenu-cur');
        $(".userNameMenu").hide();
    }

});
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
        $(".publish").show();
    },
    hiddenPublish: function() {
        $(".publish").hide();
    },

    showNotice: function(e) {
        $(".notice_menu").show();
    },
    hiddenNotice: function(e) {
        $(".notice_menu").hide();
    },
    showUserMenu: function() {
        $(".userNameMenu").show();
    },
    hiddenUserMenu: function() {
        $(".userNameMenu").hide();
    }

});
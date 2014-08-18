Tuitui.headerView = Backbone.View.extend({

    el: "body",

    compiled_tpl: {
        'recommendItem': juicer($("#J-recommendItem").html() || '')

    },

    events: {
        "mouseover .publish-menu": "showPublish",
        "mouseout .publish-menu": "hiddenPublish",
        "mouseover .notice": "showNotice",
        "mouseout .notice": "hiddenNotice",
        "mouseover .userName": "showUserMenu",
        "mouseout .userName": "hiddenUserMenu"

    },


    initialize: function(options) {
        var self = this;
        self.getNotice();
        setInterval(function() {
            self.getNotice();
        }, 30000);

        self.getRecommendList();
        $(".J-recommedChange").on("click", function(e) {
            e.preventDefault();
            self.getRecommendList();
        });

        
    },

    getRecommendList: function() {
        var tpl = this.compiled_tpl['recommendItem'];
        var html = '';
        //TODO后期去掉
        $("#J-siderRecommendWrap").hide();
        return;
        $("#J-siderRecommend").html('');
        getApi('user', 'recommend', {}, function(resp) {
            if (resp.status == 1) {
                var list = resp.body;
                if(list.length == 0){
                    $("#J-siderRecommendWrap").hide();
                    return;
                }
                for (var i = 0; i < list.length; i++) {
                    list[i].avatar = urlpath + list[i].h_img;
                    html += tpl.render(list[i]);
                }
                $("#J-siderRecommend").html(html);
            }
        })

    },
    getNotice: function() {
        getApi('user', 'checknotice', {}, function(resp) {
            var result = resp.body;
            var counts = '';
            if (resp.status == 1) {
                for (var key in result) {
                    if (result[key]) {
                        counts = key == 'all_count' ? result[key] : '(' + result[key] + ')';
                        $(".msg_" + key).text(counts).show();
                    } else {
                        counts = '';
                        $(".msg_" + key).hide();
                    }

                }
            }
        });
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
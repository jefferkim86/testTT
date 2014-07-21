Tuitui.userView = Backbone.View.extend({

    el: "body",

    events: {
        "click .J-follow": "follow"
    },


    initialize: function(options) {

    },

    follow: function(e) {
        e.preventDefault();
        var self = this;
        var target = e.currentTarget;
        var uid = $(target).attr('data-uid');
        self.obj = $(target);
        if ($(target).hasClass('followed')) {
            self.remove(uid);
        } else {
            self.add(uid);
        }
    },


    action: function(type, uid, cb) {
        getApi('user', 'fllow', {
            type: type,
            uid: uid
        }, function(data) {
            if (data.status == 1) {
                cb && cb(data);
            } else {
                tips(data.msg)
            }
        });
    },

    add: function(uid) {
        var self = this;
        this.action('link', uid, function(data) {
            self.obj.addClass('followed');
            self.obj.text('取消关注');
        });
    },

    remove: function(uid) {
        var self = this;
        this.action('unlink', uid, function(data) {
            self.obj.removeClass('followed');
            self.obj.text('加关注');
        });
    },
    /*
     * @desc 用于feed流转发列表用户
     * */
    renderForward: function(data, isAdd) {
        var html = '';
        var len = data.length;
        if(!isAdd){
             html += '<li class="title"><span class="J-fNum">' + len + '</span>个人转发了这条信息</li>';
         }
        for (var i = 0; i < len; i++) {
            html += '<li><a href="' + data[i].h_url + '"><img src="' + data[i].h_img + '"/></a></li>';
        }
        return html;
    }


});
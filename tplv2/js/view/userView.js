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
    }


});
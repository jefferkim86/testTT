var getApi = function(c, m, params, fun) {
    if (params == undefined) {
        params = ''
    };
    $.ajax({
        url: urlpath + '/index.php?c=api&yc=' + c + '&ym=' + m,
        data: params,
        success: function(data) {
            fun(data)
        },
        error: function(x) {
            if (x.status != 200) {
                if (x.status != 0) {
                    waring('网络错误,请稍候');
                    return false
                }
            }
            return false
        },
        dataType: 'json',
        type: 'post'
    });
};

var fllow = Class.create({

    initialize: function() {
        var self = this;
        $(document).on("click", '.J-follow', function(e) {
            e.preventDefault();
            var uid = $(this).attr('data-uid');
            self.obj = $(this);
            if ($(this).hasClass('followed')) {
                self.remove(uid);
            } else {
                self.add(uid);
            }
        });
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


var feedComment = Class.create({
    initialize: function() {
        var self = this;
        $(document).on("click", ".J_Comment", function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            var oleft = $(this).offset().left;
            console.log(oleft);
            self.toggleComment(id,oleft);
        });

    },

    toggleComment: function(id,oleft) {
        //为了不显示feed下方圆角        
        var feedL = $("#blog_" + id).find(".feed-desc").offset().left;

        $("#comment_"+id).find(".pop-foot-corner").css({"left":oleft-feedL});
        $("#blog_" + id).find(".feed-desc").toggleClass('open');
        $('#comment_' + id).toggle();
        self._loadReplys(id);

    },

    _loadReplys: function(id) {

    },

    replyCmt: function() {

    },

    sendReplay: function() {
        var params = {
            bid: id,
            inputs: $('#replyInput_' + id).val(),
            repuid: $('#replyTo_' + id).val()
        };
        getApi('blog', 'setReply', params, function(data) {
            if (data.status == 1) {
                $('#commentLoading_' + id).attr("isld", "false");
                _loadReply(id);
                $('#replyTo_' + id).val('');
                $('#replyInput_' + id).html('')
            } else {
                tips(data.msg)
            }
        })
    },

    addComment: function() {

    }

})
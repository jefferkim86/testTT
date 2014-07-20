// var fllow = Class.create({

//     initialize: function() {
//         var self = this;
//         $(document).on("click", '.J-follow', function(e) {
//             e.preventDefault();
//             var uid = $(this).attr('data-uid');
//             self.obj = $(this);
//             if ($(this).hasClass('followed')) {
//                 self.remove(uid);
//             } else {
//                 self.add(uid);
//             }
//         });
//     },

//     action: function(type, uid, cb) {
//         getApi('user', 'fllow', {
//             type: type,
//             uid: uid
//         }, function(data) {
//             if (data.status == 1) {
//                 cb && cb(data);
//             } else {
//                 tips(data.msg)
//             }
//         });
//     },

//     add: function(uid) {
//         var self = this;
//         this.action('link', uid, function(data) {
//             self.obj.addClass('followed');
//             self.obj.text('取消关注');
//         });
//     },

//     remove: function(uid) {
//         var self = this;
//         this.action('unlink', uid, function(data) {
//             self.obj.removeClass('followed');
//             self.obj.text('加关注');
//         });
//     }
// });


var feedComment = Class.create({
    initialize: function() {
        var self = this;
        $(document).on("click", ".J_Comment", function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            $(this).toggleClass('cur');
            self.toggleComment(id);
        });

        $(document).on("click", ".J-sendReply", function(e) {
            e.preventDefault();
            var id = $(this).parents(".J_Feedfoot").attr("data-bid");
            self.sendReplay(id);
        })

    },

    toggleComment: function(id) {
        var cmtTpl = $("#J-cmtTpl").html();
        //为了不显示feed下方圆角
        $("#blog_" + id).find(".feed-desc").toggleClass('open');
        $('#comment_' + id).toggle();
        $('#comment_' + id).find(".cmtbox").html(cmtTpl);

        this._loadReplys(id);
    },

    _renderRelys: function(id, result) {
        var cmtLiTpl = $("#J-cmtList").html();
        var html = Mustache.render(cmtLiTpl, {
            'body': result.body,
            'urlpath': urlpath,
            'skinpath': skinpath
        });
        $('#comment_' + id).find(".J_CmtList").html(html);
    },

    _loadReplys: function(id, pageNo) {
        var self = this;
        getApi('blog', 'reply', {
            bid: id,
            page: pageNo || 1
        }, function(data) {
            var result = data.body;
            self._renderRelys(id, data);
        });
     
    },


    replyCmt: function() {


    },

    sendReplay: function(id) {
        var commentObj = $('#comment_' + id);
        var params = {
            bid: id,
            inputs: commentObj.find('.J_CmtCnt').val(),
            repuid: commentObj.attr("data-reply")
        };
        getApi('blog', 'setReply', params, function(data) {
            if (data.status == 1) {
                //$('#commentLoading_' + id).attr("isld", "false");
                commentObj.attr("data-reply", "");
                commentObj.find('.J_CmtCnt').val('')
            } else {
                tips(data.msg)
            }
        })
    },

    addComment: function() {

    }

})
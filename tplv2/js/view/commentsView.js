Tuitui.commentsView = Backbone.View.extend({

    el: "body",

    tpl: {
        "commentsLayout": $("#J-cmtTpl").html()
    },

    events: {
        "click .J_Comment": "toggleComment",
        "click .J-sendReply": "submitComment"
    },


    initialize: function(options) {
        var self = this;
        this.collection = new Tuitui.commentList();
        this.collection.on("reset", function() {
            self.render();
        });
    },

    toggleComment: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var bid = $(target).attr("data-id");
        this.feedHandleId = bid;
        $(target).toggleClass('cur');
        $("#blog_" + bid).find(".feed-desc").toggleClass('open');
        $('#comment_' + bid).toggle();
        this.getReplys(bid);
    },

    getReplys: function(bid, pageNo) {
        var self = this;
        getApi('blog', 'reply', {
            bid: bid,
            page: pageNo || 1
        }, function(data) {
            var result = data.body;
            console.log(result);
            self.collection.reset(result.body);
        });
    },

    submitComment: function(e) {
        var self = this;
        var target = e.currentTarget;
        var commentObj = $(target).parents(".J_Feedfoot");
        var bid = commentObj.attr("data-bid");
        var input = commentObj.find(".J_CmtCnt");
        var inputVal = input.val();
        if (inputVal === "") {
            alert("请填写评论内容");
            return;
        }
        if (inputVal.replace("/[^/x00-/xff]/g", "**").length > 140) {
            alert("不能超出140个字数");
            return;
        }

        var params = {
            bid: bid,
            inputs: inputVal,
            repuid: commentObj.attr("data-reply")
        };
        getApi('blog', 'setReply', params, function(data) {
            if (data.status == 1) {
                commentObj.attr("data-reply", "");
                input.val('');
                //后端接口没有返回
                self.getReplys(bid);
            } else {
                alert(data.msg)
            }
        });

    },

    addComment: function(comment) {
        var commentView = new Tuitui.commentItemView({
            model: comment
        });
        var cmtBox = $("#blog_" + this.feedHandleId).find(".J_CmtList");
        cmtBox.append(commentView.render());
    },


    render: function() {
        var self = this;
        $("#blog_" + this.feedHandleId).find(".J_CmtList").html('');
        this.collection.each(function(comment) {
            self.addComment(comment);
        });
    }

});
Tuitui.commentsView = Backbone.View.extend({

    el: "body",

    tpl: {
        "cmtBox": $("#J-feedFt").html()
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
        this.collection.on("add", function(comment) {
            self.addComment(comment,true);
        })
    },

    getReplys: function(bid, el, pageNo) {
        var self = this;
        this.el = el;
        getApi('blog', 'reply', {
            bid: bid,
            page: pageNo
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.body);
        });
    },

    submitComment: function(e) {
        var self = this;
        var target = e.currentTarget;
        var commentObj = $(target).parents(".feed-ft");
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
                self.collection.add({
                    "h_img": '/tuitui/avatar.php?uid=' + uid + '&size=small',
                    "h_url": '/tuitui/index.php?c=userblog&a=index&domain=home&uid=' + uid,
                    "msg": inputVal,
                    "user": {'username':G_username}
                });

            } else {
                alert(data.msg)
            }
        });

    },



    addComment: function(comment,isAdd) {
        var commentView = new Tuitui.commentItemView({
            model: comment
        });
        if(isAdd){
            this.el.find(".J_CmtList").prepend(commentView.render());
        }else{
            this.el.find(".J_CmtList").append(commentView.render());
        }
        
    },


    render: function() {
        var self = this;
        var bid = this.currentBlogId;

        this.el.find(".J_CmtList").html('');
        this.collection.each(function(comment) {
            self.addComment(comment);
        });
    }

});
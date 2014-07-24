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
            self.addComment(comment, true);
        })
    },
    /*
     * @param  {bid} blogId
     * @param  {el} feed-ft元素
     * @param  {pageNo} 首页comment不传入则不出分页
     * */

    getReplys: function(bid, el, totalPage, pageNo) {
        var self = this;
        this.el = el;
        this.bid = bid;
        this.totalPage = totalPage;
        if (pageNo) {
            this.commentPagination(function(index) {
                self._queryReply(bid, index);
            });
        } else {
            //_queryReply 会加1
            pageNo = pageNo || 0;
            this._queryReply(bid, pageNo);
        }
    },

    _queryReply: function(bid, pageNo) {
        var self = this;
        getApi('blog', 'reply', {
            bid: bid,
            page: pageNo + 1
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.body);
        });
    },

    commentPagination: function(cb) {
        var self = this;
        var bid = this.bid;
        var el = this.el;
        var options = {
            items_per_page: 10,
            num_display_entries: 10,
            current_page: 0,
            num_edge_entries: 0,
            link_to: "javascript:void(0)",
            prev_text: "Prev",
            next_text: "Next",
            ellipse_text: "...",
            prev_show_always: true,
            next_show_always: true,
            callback: function(index) {
                cb && cb(index);
            }
        };
        el.find(".pagination").pagination(this.totalPage, options);
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
                    "user": {
                        'username': G_username
                    }
                });

            } else {
                alert(data.msg)
            }
        });

    },



    addComment: function(comment, isAdd) {
        var commentView = new Tuitui.commentItemView({
            model: comment
        });
        if (isAdd) {
            this.el.find(".J_CmtList").prepend(commentView.render());
        } else {
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
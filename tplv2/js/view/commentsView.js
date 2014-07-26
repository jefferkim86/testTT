Tuitui.commentsView = Backbone.View.extend({

    el: "body",

    tpl: {
        "cmtBox": $("#J-feedFt").html()
    },

    events: {
        
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

    addComment: function(comment, isAdd) {
        var commentView = new Tuitui.commentItemView({
            model: comment
        });
        if (isAdd) {
            this.el.prepend(commentView.render());
        } else {
            this.el.append(commentView.render());
        }
    },

    render: function() {
        var self = this;
        var bid = this.currentBlogId;

        this.el.html('');
        this.collection.each(function(comment) {
            self.addComment(comment);
        });
    }

});
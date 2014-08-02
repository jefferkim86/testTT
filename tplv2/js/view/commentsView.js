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
        this._queryReply(bid, pageNo);
    },
    //TODO:两个分页的处理方式
    _queryReply: function(bid, pageNo) {
        var self = this;
        var feed = self.el.parents('.feed');
        var isDetailPage = typeof G_PAGE != 'undefined' && G_PAGE == 'detail';
        
        getApi('blog', 'reply', {
            bid: bid,
            page: pageNo || 1
        }, function(data) {
            var result = data.body;
            if (result.page && isDetailPage && !feed.find('.pagination').length) {
                feed.find('.J-feedPagination').twbsPagination({
                    totalPages: result.page.total_page,
                    visiblePages: 7,
                    onPageClick: function(event, page) {
                        self._queryReply(bid,page);
                    }
                });
            }
            self.collection.reset(result.body);
        });
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
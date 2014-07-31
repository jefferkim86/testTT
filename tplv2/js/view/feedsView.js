Tuitui.feedsView = Backbone.View.extend({

    el: "body",

    events: {

    },


    initialize: function(options) {
        var self = this;
        this.collection = new Tuitui.feedList();
        this.collection.on("reset", function() {
            self.render();
        });
    },
    /*
     * @desc 获取feed详情
     * */

    getFeedDetail: function(bid) {
        var self = this;
        getApi('blog', 'getOneBlog', {
            'bid': bid
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 获取首页feeds
     * */
    getFeeds: function(pageNo) {
        var self = this;
        getApi('blog', 'feeds', {
            'page': pageNo || 1
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 获取我喜欢的feeds
     * */
    getFollowFeeds: function(pageNo) {
        var self = this;
        getApi('blog', 'followfeeds', {
            'page': pageNo || 1
        }, function(data) {
            var result = data.body;
            if (result) {
                self.collection.reset(result.blog);
            } else {
                self._nofeed();
            }

        });
    },
    _nofeed: function() {
        $("#feedArea").html('<div class="no-item">暂无消息</div>');
        $("#feed_loading").hide();
    },
    /*
     * @desc 获取个人主页feeds
     * */

    getMyFeeds: function(uid, pageNo) {
        var self = this;
        getApi('blog', 'feeds', {
            'uid': uid,
            'page': pageNo || 1
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 获取我喜欢的feeds
     * */
    getMyLike: function(pageNo) {
        var self = this;
        getApi('user', 'mylikes', {
            'page': pageNo || 1
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 增加单个feed
     * */
    addFeed: function(feed) {
        var feedItemView = new Tuitui.feedItemView({
            model: feed
        });
        $("#feedArea").append(feedItemView.render());
    },

    render: function() {
        var self = this;
        //TODO 不能保证分页是否会出错
        if (this.collection.length == 0) {
            this._nofeed();
        }
        if (this.collection.length < 10) {
            Tuitui.globalData.end = true;
        }
        this.collection.each(function(feed) {
            self.addFeed(feed);
        });
        Tuitui.globalData.canLoadFeed = true;
    }
});
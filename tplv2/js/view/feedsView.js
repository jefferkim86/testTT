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
    getFeeds: function() {
        var self = this;
        getApi('blog', 'feeds', {}, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 获取我喜欢的feeds
     * */
    getMyLike: function() {
        var self = this;
        getApi('user', 'mylikes', {}, function(data) {
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
        this.collection.each(function(feed) {
            self.addFeed(feed);
        });
    }
});
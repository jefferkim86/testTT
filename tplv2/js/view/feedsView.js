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
        //请求页面数据
        getApi('blog', 'feeds', {}, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },

    addFeed: function(feed) {
        var feedItemView = new Tuitui.feedItemView({
            model: feed
        });
        $("#article").append(feedItemView.render());
    },

    render: function() {
        var self = this;
        this.collection.each(function(feed) {
            self.addFeed(feed);
        });
    }
});
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

        getApi('blog', 'feeds', {}, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },

    addFeed: function(comment) {
        var commentView = new Tuitui.feedItemView({
            model: comment
        });

        $("#article").append(commentView.render());
    },

    render: function() {
        var self = this;
      //  console.log(this.collection);
        this.collection.each(function(comment) {
           // console.log(comment);
            self.addFeed(comment);
        });
    }
});
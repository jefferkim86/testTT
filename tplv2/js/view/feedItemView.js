Tuitui.feedItemView = Backbone.View.extend({

    el: "div",
    classname: 'feed',

    compiled_tpl: {
        'feedLayout': juicer($("#J-feedLayout").html()),
        'text': juicer($("#J-feedTxt").html()),
        'photo': juicer($("#J-feedPhoto").html()),
        'good': juicer($("#J-feedGood").html())
    },
    events: {

    },


    initialize: function(options) {

        
    },

    addArrow: function() {


    },

    render: function() {
        var feedType = this.model.getfeedType();
        var layoutTpl = this.compiled_tpl['feedLayout'];
        var tpl = this.compiled_tpl[feedType];
        var feedContent = tpl.render(this.model.getFeedAttr());
        //渲染框架
        var feedData = this.model.getfeedData();
        feedData.feedItemContent = feedContent;
        var layout = layoutTpl.render(feedData);
        $("#article").append($(layout));
    }



});
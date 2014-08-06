Tuitui.commentItemView = Backbone.View.extend({

    tagName: "li",

    className: "comment-item",

    tpl: {
        "commentLi": juicer($("#J-cmtList").html() || '')
    },

    events: {
        "click .J_Reply": "replyCmt"
        //,"click .J_deleteCmt": "removeItem"
    },

    initialize: function() {
        var self = this;
        this.$el.on("hover", function(e) {
            var del = self.$el.find(".J_deleteCmt");
            if (e.type == 'mouseenter') {
                del.show();
            }
            if (e.type == 'mouseleave') {
                del.hide();
            }
        });
    },

   

    replyCmt: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var comment = this.model.toJSON();
        var feed = $(target).parents(".feed");
        var input = feed.find(".J_CmtCnt");
        var commentBtn = feed.find(".J-sendReply");
        commentBtn.attr("data-c",$(target).attr("data-c"));
        feed.find('.feed-ft').attr("data-reply", comment.user.uid);
        input.val("@" + comment.user.username + ":");

    },


    render: function() {
        var html = this.tpl["commentLi"].render(this.model.getComment());
        return this.$el.html(html);

    }

});
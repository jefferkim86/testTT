Tuitui.commentItemView = Backbone.View.extend({

    tagName: "li",

    className: "comment-item",

    tpl: {
        "commentLi": juicer($("#J-cmtList").html() || '')
    },

    events: {
        "click .J_Reply": "replyCmt",
        "click .J-remove": "_removeItem"
    },

    initialize: function() {
        this.model.on("destroy", this._removeItem, this);
    },

    _removeItem: function() {
        
        
    },

    replyCmt: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var comment = this.model.toJSON();
        var feed = $(target).parents(".feed");
        var input = feed.find(".J_CmtCnt");
        feed.find('.feed-ft').attr("data-reply",comment.user.uid);
        input.val("@"+comment.user.username+":");
    },


    render: function() {
        var html = this.tpl["commentLi"].render(this.model.getComment());
        return this.$el.html(html);

    }

});
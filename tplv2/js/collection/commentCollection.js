Tuitui.commentList = Backbone.Collection.extend({

	initialize: function() {

		this.loaded = false;
	},

	model: Tuitui.commentModel
});
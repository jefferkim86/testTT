Tuitui.commentModel = Backbone.Model.extend({

	initialize: function() {

		

	},

	getComment: function() {
		return {
			"logo": urlpath + this.get("h_img"),
			"logoUrl": this.get("h_url"),
			"msg": this.get("msg"),
			"userName": this.get("user").username

		}

	}



});
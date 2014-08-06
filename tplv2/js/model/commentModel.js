Tuitui.commentModel = Backbone.Model.extend({

	initialize: function() {



	},

	getComment: function() {
		return {
			"id": this.get('id'),
			"logo": urlpath + this.get("h_img"),
			"logoUrl": this.get("h_url"),
			"msg": this.get("msg"),
			"time": this.get("time"),
			"userName": this.get("user").username,
			"canDel": this.get("del_flag") == 1

		}

	}



});
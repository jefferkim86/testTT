Tuitui.feedModel = Backbone.Model.extend({

	initialize: function() {

		console.log("M:feed");

	},

	feedImgMap: {
		'feed-layout1': [{
			'style': 'left:0;top:0;width:auto;height:auto'
		}],
		'feed-layout2': [{
			'style': 'left:0;top:0;width:289px;height:334px'
		}, {
			'style': 'left:291px;top:0;width:289px;height:334px'
		}],
		'feed-layout3': [{
			'style': 'left:0;top:0;width:289px;height:334px'
		}, {
			'style': 'left:291px;top:0;width:289px;height:166px'
		}, {
			'style': 'left:291px;top:168px;width:289px;height:166px'
		}],
		'feed-layout4': [{
			'style': 'left:0;top:0;width:289px;height:166px'
		}, {
			'style': 'left:291px;top:0;width:289px;height:334px'
		}, {
			'style': 'left:0;top:168px;width:289px;height:334px'
		}, {
			'style': 'left:291px;top:336px;width:289px;height:166px'
		}],
		'feed-layout5': [{
			'style': 'left:0;top:0;width:289px;height:334px'
		}, {
			'style': 'left:291px;top:0;width:289px;height:166px'
		}, {
			'style': 'left:291px;top:168px;width:289px;height:166px'
		}, {
			'style': 'left:0;top:336px;width:289px;height:166px'
		}, {
			'style': 'left:291px;top:336px;width:289px;height:166px'
		}]
	},

	getfeedType: function() {
		var feedTypeMap = {
			'3': 'photo',
			'1': 'text',
			'2': 'good'
		};
		//return feedTypeMap[2];
		return feedTypeMap[this.get('type')];
	},

	getfeedData: function() {
		return {
			'username': this.get('username'),
			'bid': this.get('bid'),
			'time': this.get('time'),
			'avatar': this.get('h_img'),
			'avatarHref': this.get('h_url'),
			'feedType': this.getfeedType(),
			'feedLink': this.get('b_url'),
			'feedcount': this.get('replaycount'),
			'replaycount': this.get('replaycount'),
			'likeNum': 1,
			'forwardData': this.get('repto') || false
			//'forwardData': this.get('repto') || true
		}
	},

	//通过图片数量获取对应的数据
	getPhotoAttr: function() {
		var feedLayout = 'feed-layout' + this.get('attr').count;
		var feedLayoutData = this.feedImgMap[feedLayout];
		return feedLayoutData;
	},

	getFeedAttr: function() {
		var result = {};
		if (this.getfeedType() == 'photo') {
			result.pics = this.get('attr').img;
			result.position = this.getPhotoAttr();
		}
		if (this.getfeedType() == 'text') {
			result = {
				'title': this.get('title'),
				'feedContent': this.get('body')
			}
		}
		if (this.getfeedType() == 'good') {
			result = {};
		}
		return result;
	},



	//转发的数据

	getRetoData: function() {
		var repto = this.get('repto');

	}

});
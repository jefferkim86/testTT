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
			'5': 'good'
		};
		//return feedTypeMap[2];
		return feedTypeMap[this.get('type')];
	},
	//TODO: forwardData引用getFeedAttr
	getfeedData: function() {
		return {
			'username': this.get('username'),
			'bid': this.get('bid'),
			'time': this.get('time'),
			'avatar': urlpath + this.get('h_img'),
			'avatarHref': this.get('h_url'),
			'feedType': this.getfeedType(),
			'feedLink': this.timeLink(),
			'forwardcount': this.get('forwardcount'),
			'replaycount': this.get('replaycount'),
			'likecount': this.get('likecount'),
			'feedForwardContent': this.get('title') || '',
			'isSelf': this.get('uid') == uid,
			'isLiked': this.get('likeid') ? 'liked' : '',
			'forwardData': this.get('repto') || false
		}
	},
	timeLink: function() {
		var feedLink;
		if (typeof G_PAGE != 'undefined' && G_PAGE == 'detail') {
			feedLink = 'javascript:void(0)';
		} else {
			feedLink = this.get('b_url')
		}
		return feedLink;
	},
	//获取外层feed数据
	getFeedNumData: function() {
		return {
			'Forward': this.get('forwardcount'),
			'Comment': this.get('replaycount'),
			'Like': this.get('likecount')
		};
	},
	//通过图片数量获取对应的数据
	getPhotoAttr: function(attr) {
		var feedLayout = 'feed-layout' + attr.count;
		var feedLayoutData = this.feedImgMap[feedLayout];
		return feedLayoutData;
	},

	getFeedAttr: function() {
		var result = {};
		//图片feed
		if (this.getfeedType() == 'photo') {
			var repto = this.get('repto');
			var attr;
			//转发数据

			if (repto) {
				attr = repto.attr;
				result = {
					'pics': repto.attr.img,
					'forwardcount': repto.forwardcount,
					'replaycount': repto.replaycount,
					'likecount': repto.likecount,
					'feedContent': repto.body,
					'title': repto.title,
					'feedLink': repto.b_url,
					'isSelf': repto.uid == uid,
					'isLiked': repto.likeid ? 'liked' : false,
					'time': repto.time
				};
			} else {
				attr = this.get('attr');
				result = {
					'pics': attr.img,
					'feedLink': this.get('b_url'),
					'feedContent': this.get('body')
				}
			}
			result.position = this.getPhotoAttr(attr);
		}
		//文字feed
		if (this.getfeedType() == 'text') {
			var repto = this.get('repto');
			if (repto) {
				console.log(repto.attr.length > 0 ? repto.attr[0] : '');
				result = {
					'feedTitle': repto.forward_title,
					'feedContent': repto.body,
					'feedLink': repto.b_url,
					'time': repto.time,
					'pic': repto.attr.length > 0 ? repto.attr[0] : '',
					'forwardcount': repto.forwardcount,
					'replaycount': repto.replaycount,
					'likecount': repto.likecount,
					'isSelf': repto.uid == uid,
					'isLiked': repto.likeid ? 'liked' : false
				}
			} else {
				result = {
					'feedTitle': this.get('title') || '',
					'feedContent': this.get('body'),
					'pic': this.get('attr').length > 0 ? this.get('attr')[0] : '',
					'feedLink': this.get('b_url')
				}
			}

		}
		//商品feed
		//TODO: result 封装成方法，或者加入判断
		if (this.getfeedType() == 'good') {
			var repto = this.get('repto');
			if (repto) {
				result = {
					'goodTitle': repto.attr.title,
					'goodPic': repto.attr.image,
					'oprice': repto.attr.oprice || '',
					'price': repto.attr.price,
					'producturl': repto.attr.producturl,
					'feedContent': repto.body,
					'isSelf': repto.uid == uid,
					'priceTxt': repto.attr.oprice == repto.attr.price ? '价格' : '促销',
					'isLiked': repto.likeid ? 'liked' : false
				};
			} else {
				var attr = this.get('attr');
				result = {
					'goodTitle': attr.title,
					'goodPic': attr.image,
					'oprice': attr.oprice || '',
					'price': attr.price,
					'producturl': attr.producturl,
					'priceTxt': attr.oprice == attr.price ? '价格' : '促销',
					'feed': attr.deliveryFees,
					'feedContent': this.get('body')
				};
			}
		}

		return result;
	},

	_getTextFeedAttr: function() {

	},
	_getPhotoFeedAttr: function() {

	},
	_getGoodFeedAttr: function() {

	}



});
Tuitui.feedModel = Backbone.Model.extend({

	initialize: function() {

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
			'photo': 'photo',
			'text': 'text',
			'product': 'good'
		};
		return feedTypeMap[this.get('type_name')];
	},
	_getPreForward: function() {
		var result = '';
		var repto = this.get('repto');
		if (repto && repto.forward) {
			var url = repto.forward.h_url;
			var username = repto.forward.username;
			var content = repto.forward.forward_title;
			result = ' //<a href="' + url + '" target="_blank">' + username + '</a> : ' + content;

		}
		return result;
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
			'preforwardContent': this._getPreForward(),
			'feedLink': this._isDetail() ? 'javascript:void(0)' : this.get('b_url'),
			'forwardcount': this.get('forwardcount'),
			'replaycount': this.get('replaycount'),
			'likecount': this.get('likecount'),
			'feedForwardContent': this.get('title') || '',
			'isSelf': this.get('uid') == uid,
			'isLiked': this.get('likeid') ? 'liked' : '',
			'forwardData': this.get('repto') || false,
			'isDeleted': this.get('bid') == null,
			'isForwardDeleted': this.get('repto') && this.get('repto').bid == null
		}
	},

	_isDetail: function() {
		return (typeof G_PAGE != 'undefined' && G_PAGE == 'detail');
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
	/*
	 * @desc
	 * @params isRepto 是否是转发
	 * */
	_style: function(attr) {
		var ratio = 1,
			style = '';
		if (attr) {
			if (attr.image_width && attr.image_height) {
				ratio = attr.image_width / attr.image_height;
			}
		}
		style = ratio < 1 ? 'height:290px' : 'width:290px';

		return style;
	},
	_addLinkToText: function(txt) {
		var reg = /(http:\/\/|https:\/\/)((\w|=|\?|\.|\/|&|-)+)/g;
		var picReg = /(?:\.jpg|png|jpeg|bmp|gif)$/g;
		var r = txt.replace(reg, function(link) {
			return picReg.test(link) ? link : '<a href="' + link + '" target="_blank">' + link + '</a>';
		});
		return r;
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
					'isDeleted': repto.bid == null,
					'pics': repto.attr.img,
					'forwardcount': repto.forwardcount,
					'replaycount': repto.replaycount,
					'likecount': repto.likecount,
					'feedContent': this._addLinkToText(repto.body),
					'title': repto.title,
					'feedLink': repto.b_url,
					'isSelf': repto.uid == uid,
					'isLiked': repto.likeid ? 'liked' : false,
					'time': repto.time
				};
			} else {
				attr = this.get('attr');
				result = {
					'isDeleted': this.get('bid') == null,
					'pics': attr.img,
					'feedLink': this.get('b_url'),
					'feedContent': this.get('body')
				}
			}
			result.position = this.getPhotoAttr(attr);
		}
		//文字feed,图片信息在attr字段中
		if (this.getfeedType() == 'text') {
			var repto = this.get('repto');
			if (repto) {
				result = {
					'isDeleted': repto.bid == null,
					'feedTitle': repto.title || '',
					'feedContent': this._addLinkToText(repto.body),
					'feedLink': repto.b_url,
					'time': repto.time,
					'pic': (repto.attr.length > 0 && !this._isDetail()) ? repto.attr[0] : '',
					'forwardcount': repto.forwardcount,
					'replaycount': repto.replaycount,
					'likecount': repto.likecount,
					'isSelf': repto.uid == uid,
					'isLiked': repto.likeid ? 'liked' : false,
					'needFeedMore': repto.more == 1,
					'style': this._style(this.get('image_info'))
				}
			} else {
				result = {
					'isDeleted': this.get('bid') == null,
					'feedTitle': this.get('title') || '',
					'feedContent': this._addLinkToText(this.get('body')),
					'pic': (this.get('attr').length > 0 && !this._isDetail()) ? this.get('attr')[0] : '',
					'feedLink': this._isDetail() ? 'javascript:void(0)' : this.get('b_url'),
					'needFeedMore': this.get('more') == 1,
					'style': this._style(this.get('image_info'))
				}
			}

		}
		//商品feed
		//TODO: result 封装成方法，或者加入判断
		if (this.getfeedType() == 'good') {
			var repto = this.get('repto');
			if (repto) {
				result = {
					'isDeleted': repto.bid == null,
					'goodTitle': repto.attr.title,
					'goodPic': repto.attr.image + '_300x1000.jpg',
					'price': repto.attr.price,
					'discount_price': repto.attr.discount_price,
					'producturl': repto.attr.producturl,
					'feedLink': repto.b_url,
					'feedContent': repto.body,
					'isSelf': repto.uid == uid,
					'hasDiscout': repto.attr.discount_price ? 'hasDiscount' : '',
					'isLiked': repto.likeid ? 'liked' : false,
					'needFeedMore': repto.more == 1,
					'style': this._style(repto.attr)

				};
			} else {
				var attr = this.get('attr');
				result = {
					'isDeleted': this.get('bid') == null,
					'goodTitle': attr.title,
					'goodPic': attr.image + '_300x1000.jpg',
					'price': attr.price,
					'discount_price': attr.discount_price,
					'feedLink': this.get('b_url'),
					'producturl': attr.producturl,
					'hasDiscout': attr.discount_price ? 'hasDiscount' : '',
					'feed': attr.deliveryFees,
					'feedContent': this.get('body'),
					'needFeedMore': this.get('more') == 1,
					'style': this._style(attr)
				};
			}
		}
		if (this.getfeedType() == undefined) {
			result = {
				'isDeleted': true
			};
		}
		return result;
	}



});
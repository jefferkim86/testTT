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
			//'forwardData': this.get('repto') || false
			'forwardData': this.get('repto') || true
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

	// {
	//                "bid": "50",
	//                "uid": "21",
	//                "top": "0",
	//                "type": "3",
	//                "tag": "",
	//                "title": null,
	//                "body": "",
	//                "open": "1",
	//                "hitcount": "0",
	//                "feedcount": "0",
	//                "replaycount": "0",
	//                "noreply": "0",
	//                "time": "1小时前",
	//                "likeid": null,
	//                "username": "jeffer",
	//                "domain": "jeffer",
	//                "more": 0,
	//                "h_url": "/index.php?c=userblog&a=index&domain=jeffer",
	//                "h_img": "/avatar.php?uid=21&size=middle",
	//                "b_url": "/index.php?c=userblog&a=show&bid=50",
	//                "time_y": "2014.07",
	//                "time_d": "20",
	//                "attr": {
	//                    "count": 1,
	//                    "img": [
	//                        {
	//                            "url": "attachs/14/7/06/46/t_1451599859.jpg",
	//                            "desc": "Boston city flow"
	//                        }
	//                    ]
	//                },
	//                "repto": {
	//                    "uid": "23",
	//                    "username": "minzhan",
	//                    "domain": "",
	//                    "time": 1404817517,
	//                    "h_url": "/index.php?c=userblog&a=index&domain=home&uid=23",
	//                    "h_img": "/avatar.php?uid=23&size=small"
	//                }
	//            }



});
Tuitui.feedsView = Backbone.View.extend({

    el: "body",

    events: {

    },


    initialize: function(options) {
        var self = this;
        this.collection = new Tuitui.feedList();
        this.collection.on("reset", function() {
            self.render();
        });
    },
    /*
     * @desc 获取feed详情
     * */

    getFeedDetail: function(bid) {
        var self = this;
        getApi('blog', 'getOneBlog', {
            'bid': bid
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 获取首页feeds
     * */
    getFeeds: function(pageNo) {
        var self = this;
        getApi('blog', 'feeds', {
            'page': pageNo || 1
        }, function(data) {
            var result = data.body;
            self.collection.reset(result.blog);
        });
    },
    /*
     * @desc 获取我喜欢的feeds
     * */
    getFollowFeeds: function(pageNo) {
        var self = this;
        getApi('blog', 'followfeeds', {
            'page': pageNo || 1
        }, function(data) {
            if (data.status == 1) {
                var result = data.body;
                if (result.blog) {
                    self.collection.reset(result.blog);
                } else {
                    self._nofeed('还没有任何关注的人的动态哦～', 'style="width:300px;"');
                }
            } else {
                self._nofeed('还没有任何关注的人的动态哦', 'style="width:300px;"');

            }
        });
    },
    _nofeed: function(msg, style) {

        $("#feedArea").html('<div class="no-item" ' + style + '>' + (msg || '暂无消息') + '</div>');
        $("#feed_loading").hide();
        Tuitui.globalData.end = true;
    },
    /*
     * @desc 获取个人主页feeds
     * */

    getMyFeeds: function(uid, pageNo) {
        var self = this;
        var pre = G_isSelf ? '你' : 'Ta';
        getApi('blog', 'feeds', {
            'uid': uid,
            'page': pageNo || 1
        }, function(data) {
            if (data.status == 1) {
                var result = data.body;
                if (result.blog) {
                    self.collection.reset(result.blog);
                } else {
                    self._nofeed(pre + '还没有发布任何内容哦～', 'style="width:300px;"');
                }
            } else {
                self._nofeed(pre + '还没有发布任何内容哦～', 'style="width:300px;"');
            }
        });
    },
    /*
     * @desc 获取我喜欢的feeds
     * */
    getMyLike: function(pageNo) {
        var self = this;
        getApi('user', 'mylikes', {
            'page': pageNo || 1
        }, function(data) {
            if (data.status == 1) {
                var result = data.body;
                if (result.blog) {
                    self.collection.reset(result.blog);
                } else {
                    self._nofeed('你还没有喜欢任何用户哦～', 'style="width:300px;"');
                }
            } else {
                self._nofeed('你还没有喜欢任何用户哦～', 'style="width:300px;"');
            }

        });
    },
    /*
     * @desc 增加单个feed
     *       加入详情页展开评论转发的逻辑
     *       getQueryString方法详情页再之前引入，后期封装成util方法
     * */
    addFeed: function(feed) {
        var feedItemView = new Tuitui.feedItemView({
            model: feed
        });
        $("#feedArea").append(feedItemView.render());
        if (typeof G_PAGE != 'undefined' && G_PAGE == 'detail') {
            var actionType = getQueryString('t');
            var target;
            if (actionType == 'reply') {
                target = $('.feed .J_Comment')[0]
            }
            if (actionType == 'forward') {
                target = $('.feed .J_Forward')[0];
            }
            //默认展开评论
            if (actionType == '') {
                target = $('.feed .J_Comment')[0]
            }
            feedItemView.expandFt(null, target);

        }
    },

    render: function() {
        var self = this;
        //TODO 不能保证分页是否会出错
        if (this.collection.length == 0) {
            this._nofeed();
            return;
        }
        this.collection.each(function(feed) {
            self.addFeed(feed);
        });
        if (this.collection.length < 10) {
            Tuitui.globalData.end = true;
            $("#feed_loading").hide();
        } else {
            Tuitui.globalData.canLoadFeed = true;
        }

    }
});
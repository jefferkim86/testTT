/*
 * @desc 转发功能比较简单，直接在这里处理
 * TODO: 下方操作区剥离成model，collection 计算数量
 * MODEL => FEED + HANDLE_NUM + COMMENT + FORWARD
 * 重构底部事件处理，现在太糟糕了
 *
 * 将class直接加到最外层feed
 *
 * 通过blogId获取评论可以复用
 * */
Tuitui.feedItemView = Backbone.View.extend({

    tagName: 'div',

    className: 'feedWrap',

    compiled_tpl: {
        'feedLayout': juicer($("#J-feedLayout").html() || ''),
        'text': juicer($("#J-feedTxt").html() || ''),
        'photo': juicer($("#J-feedPhoto").html() || ''),
        'good': juicer($("#J-feedGood").html() || ''),
        'corner': '<span class="pop-foot-corner"><s class="outter"></s><s class="inner"></s></span>'
    },
    events: {
        "click .feed-photo-cell": "bigPicView",
        "click .feed-original-cell": "previewView",
        "click .J_Comment": "expandFt",
        "click .J_Forward": "expandFt",
        "click .J-sendForward": "sendForward",
        "click .J-sendReply": "submitComment",
        "click .J_Like": "likeFeed",
        "click .fold": "foldFt"
    },


    initialize: function(options) {
        //能改变的就几个数字
        var self = this;
        this.model.on("change", function() {
            self.triggerDomUpdate();
        });
    },
    /*
     * @desc 根据数据直接渲染
     * */
    triggerDomUpdate: function() {
        var feed = this.$el;
        var counts = this.model.getFeedNumData();
        for (var key in counts) {
            feed.find(".J_" + key + ' b').text(counts[key]);
        }
    },
    /*
     * @params {type} 类型(comment,forward,like)
     * @params {setType} 设置类型(add,sub)
     * */
    setCounts: function(type, setType) {
        var oldVal = parseInt(this.model.get(type));
        if (setType == 'add') {
            this.model.set(type, oldVal + 1);
        } else {
            this.model.set(type, oldVal - 1);
        }
    },
    /*
     * @desc 喜欢feed
     * */
    likeFeed: function(e) {
        e.preventDefault();
        var self = this;
        var target = e.currentTarget;
        var data = this.model.toJSON();

        getApi('blog', 'setLike', {
            'bid': data.bid
        }, function(data) {
            if (data.status == '1') {
                if (data.body == 'add') {
                    $(target).addClass("liked");
                    self.setCounts('likecount', 'add');
                } else {
                    $(target).removeClass("liked");
                    self.setCounts('likecount', 'sub');
                }

            } else {
                alert(data.msg);
            }
        });
    },

    /*
     * @desc 评论feed
     * */
    submitComment: function(e) {
        var self = this;
        var target = e.currentTarget;
        var data = this.model.toJSON();
        var feed = $(target).parents(".feed");
        var input = feed.find(".J_CmtCnt");
        var inputVal = input.val();
        if (inputVal === "") {
            alert("请填写评论内容");
            return;
        }
        if (inputVal.replace("/[^/x00-/xff]/g", "**").length > 140) {
            alert("不能超出140个字数");
            return;
        }
        var params = {
            bid: data.bid,
            inputs: inputVal,
            repuid: feed.find('.feed-ft').attr("data-reply")
        };
        getApi('blog', 'setReply', params, function(resp) {
            if (resp.status == 1) {
                feed.find('.feed-ft').attr("data-reply", "");
                input.val('');
                var commentModel = new Tuitui.commentModel({
                    "h_img": '/avatar.php?uid=' + uid + '&size=small',
                    "h_url": 'tuitui/index.php?c=userblog&a=index&domain=home&uid=' + uid,
                    "msg": inputVal,
                    "user": {
                        'username': G_username
                    }
                });
                commentsView.addComment(commentModel, true);
                self.setCounts('replaycount', 'add');
            } else {
                alert(resp.msg)
            }
        });
    },
    /*
     * @desc 转发feed
     * */
    sendForward: function(e) {
        var self = this;
        var target = e.currentTarget;
        var feed = $(target).parents(".feed");
        var data = this.model.toJSON();
        var input = feed.find(".J_CmtCnt");
        var inputVal = input.val();
        if (inputVal === "") {
            alert("请填写评论内容");
            return;
        }
        if (inputVal.replace("/[^/x00-/xff]/g", "**").length > 140) {
            alert("不能超出140个字数");
            return;
        }
        getApi('blog', 'repblog', {
            'bid': data.bid,
            'title': _.escape(inputVal)
        }, function(resp) {
            if (resp.status == '1') {
                var result = [{
                    'h_img': '/avatar.php?uid=' + uid + '&size=middle',
                    'h_url': 'c=userblog&a=index&domain=home&uid=' + uid
                }];
                var html = userView.renderForward(result, true);
                self.setCounts('forwardcount', 'add');
                feed.find(".J_forwardList .title").after(html);

            } else {
                alert(resp.msg);
            }
        });
    },



    foldFt: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        $(target).parents(".feed").removeClass('comment_show forward_show');
    },

    expandFt: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var type = $(target).attr("type");
        var feed = $(target).parents(".feed");
        if (!$(target).find(".pop-foot-corner").length) {
            $(target).append($(this.compiled_tpl['corner']));
        }
        if (type == 'comment') {
            feed.toggleClass("comment_show");
            feed.removeClass("forward_show");
        } else {
            feed.toggleClass("forward_show");
            feed.removeClass("comment_show");
        }
        this['get' + type + 'List'](feed);
    },
    /*
     * @desc 读取评论列表
     * @params {feed} 传入当前feed元素，用于commentViews的渲染，
     *         TODO:后期commentsView只返回数据
     * @params {data} 数据
     * */
    getcommentList: function(feed) {
        var data = this.model.toJSON();
        var el = feed.find(".J_commentList");
        if (el.find('.loading-list').length) {
            commentsView.getReplys(data.bid, el, data.feedcount);
        }
    },
    /*
     * @desc 读取转发列表
     * */
    getforwardList: function(feed) {
        var data = this.model.toJSON();
        if ($('.J_forwardList .loading-list').length) {
            getApi('blog', 'getforward', {
                'bid': data.bid,
                'page': 1,
                'limit': 30
            }, function(resp) {
                var result = resp.body.body;
                var html = userView.renderForward(result);
                feed.find('.J_forwardList').html(html);
            });
        }
    },

    /*
     * @desc 图片feed=>点击预览大图
     * */
    bigPicView: function(e) {
        var target = e.currentTarget;
        var photoWrap = $(target).parents('.feed-photo-img');
        var smallPicWrap = $(target).parents(".feed-photo-layout");
        var bigPicWrap = photoWrap.find(".feed-original-pic");
        smallPicWrap.hide();
        bigPicWrap.show();
    },
    /*
     * @desc 图片feed=> 返回小图视图
     * */
    previewView: function(e) {
        var target = e.currentTarget;
        var photoWrap = $(target).parents('.feed-photo-img');
        var smallPicWrap = photoWrap.find(".feed-photo-layout");
        var bigPicWrap = $(target).parents(".feed-original-pic");
        bigPicWrap.hide();
        smallPicWrap.show();
    },
    /*
     * @desc 渲染模板
     *       根据不同的feed类型加载不同的模板
     * */
    render: function() {
        var feedType = this.model.getfeedType();
        var layoutTpl = this.compiled_tpl['feedLayout'];
        var tpl = this.compiled_tpl[feedType];
        //渲染内容
        var feedContent = tpl.render(this.model.getFeedAttr());
        var feedData = this.model.getfeedData();
        feedData.feedItemContent = feedContent;
        var layout = layoutTpl.render(feedData);
        return this.$el.html(layout);
    }

});
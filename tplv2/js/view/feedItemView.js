/*
 * @desc 转发功能比较简单，直接在这里处理
 * TODO: 下方操作区剥离成model，collection 计算数量
 * MODEL => FEED + HANDLE_NUM + COMMENT + FORWARD
 * */
Tuitui.feedItemView = Backbone.View.extend({

    tagName: 'div',

    className: 'feedWrap',

    compiled_tpl: {
        'feedLayout': juicer($("#J-feedLayout").html()),
        'text': juicer($("#J-feedTxt").html()),
        'photo': juicer($("#J-feedPhoto").html()),
        'good': juicer($("#J-feedGood").html())
    },
    events: {
        "click .feed-photo-cell": "bigPicView",
        "click .feed-original-cell": "previewView",
        "click .J_Comment": "toggleComment",
        "click .J_Forward": "getForwardList",
        "click .J-sendForward": "sendForward",
        "click .J_Like": "likeFeed"
    },


    initialize: function(options) {


    },
    likeFeed:function(e){
        e.preventDefault();
        var target = e.currentTarget;
        var data = this.model.toJSON();

        var bid = data.bid;
        getApi('blog', 'setLike', {
            'bid': bid
        }, function(data) {
            if(data.status == '1'){
                $(target).addClass("liked");
            }else{
                alert(data.msg);    
            }
        });
    },
    /*
     * @desc 转发feed
     * */
    sendForward: function(e) {
        var target = e.currentTarget;
        var ft = $(target).parents(".feed-ft");
        var bid = ft.attr("data-bid");
        var input = $(target).parents(".cmt-box").find(".J_CmtCnt");
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
            'bid': bid,
            'title': inputVal
        }, function(data) {
            if (data.status == '1') {
                var result = data.body.body;
                var html = userView.renderForward(result, true);
                var num = ft.find(".J-fNum").text();
                ft.find(".J_forwardList .title").after(html);
                ft.find(".J-fNum").text(parseInt(num) + 1);

            } else {
                alert("转发失败");
            }
        });
    },
    /*
     * @desc 读取转发列表
     * */
    getForwardList: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var data = this.model.toJSON();
        var bid = data.bid;
        var feedFtClass = '.J_Feedfoot';
        if ($(target).parents('.J-forward-actions').length) {
            bid = data.repto && data.repto.bid || 1; //TODO:需要添加
            feedFtClass = '.J_forwardFeedfoot';
        }
        var cmtEl = $(target).parents(".feed").find(feedFtClass);
        cmtEl.toggleClass('forward-show');
        cmtEl.removeClass('comment-show');
        cmtEl.find(".cmt-btn").addClass("J-sendForward").removeClass('J-sendReply');
        cmtEl.find(".J_CmtCnt").val('');
        if (cmtEl.find('.J_forwardList .loading-list').length) {
            getApi('blog', 'getforward', {
                'bid': bid,
                'page': 1,
                'limit': 30
            }, function(data) {
                var result = data.body.body;
                var html = userView.renderForward(result);
                cmtEl.find('.J_forwardList').html(html);
            });
        }
    },
    /*
     * @desc 加载数据
     * */
    toggleComment: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var data = this.model.toJSON();
        var bid = data.bid;
        var feedFtClass = '.J_Feedfoot';
        if ($(target).parents('.J-forward-actions').length) {
            bid = data.repto && data.repto.bid || 1; //TODO:需要添加
            feedFtClass = '.J_forwardFeedfoot';
        }
        var cmtEl = $(target).parents(".feed").find(feedFtClass);
        cmtEl.find(".cmt-btn").addClass("J-sendReply").removeClass('J-sendForward');
        cmtEl.find(".J_CmtCnt").val('');
        cmtEl.toggleClass('comment-show');
        cmtEl.removeClass('forward-show');
        if (cmtEl.find('.J_CmtList .loading-list').length) {
            commentsView.getReplys(bid, cmtEl);
        }
    },
    /*
     * @desc feed下方操作区点击后追加小箭头
     * */
    addArrow: function() {


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
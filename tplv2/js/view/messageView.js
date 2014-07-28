/*
 * @desc 消息，私信，转发，等等
 * TODO 分页
 * */

Tuitui.messageView = Backbone.View.extend({

    el: "body",

    compiled_tpl: {
        'privateMsg': juicer($("#J-followList").html() || ''),
        'msgItem': juicer($("#J-msgTpl").html() || ''),
        'allMsgItem': juicer($("#J-msgAllList").html() || ''),
        'msgFt': $("#J-ft").html()
    },

    events: {
        "click #send_submit": "submitPm",
        "click #J-Msgtab li": "getTabMsg",
        "click .J-msg-reply": "reply",
        "click .J-submit-msg": "submitMsg"
    },


    initialize: function(options) {


    },

    getTabMsg: function(e) {
        var target = e.currentTarget;
        var type = $(target).attr('type');
        $("#J-Msgtab li").removeClass('cur');
        $(target).addClass('cur');
        var opt = {
            'type': type,
            'listEl': '#list-content',
            'pagination': '#J-pagination'
        };
        this.getMsgListByType(opt);
    },
    submitPm: function(e) {
        var self = this;
        var target = e.currentTarget;
        if ($('#touser').val() == '') {
            waring('请等待页面载入');
            return false;
        }
        var txt = $('#textarea').val();
        if (txt == '') {
            waring('发信内容不能为空');
            return false;
        }
        getApi('pm', 'sendpm', {
            'username': $('#touser').val(),
            'body': txt
        }, function(resp) {
            if (resp.status == 1) {
                self.getPmInfo({
                    'touid': $("#toid").attr("toid"),
                    'listEl': '#J-pmInfoList',
                    'pagination': '#J-pagination'
                })

            } else {
                alert(resp.msg);
            }
        })
    },
    /*
     * @desc 渲染私信接口
     * */
    getPmList: function(opt) {
        var self = this;
        getApi('pm', 'pmlist', {
            uid: uid
        }, function(resp) {
            if (resp.status == 1) {
                var result = resp.body;
                console.log(result);
                self._renderPm(opt, result);
            } else {
                alert(resp.msg);
            }
        });
    },

    _renderPm: function(opt, result, isPrepend) {
        var tpl = this.compiled_tpl['privateMsg'];
        var list = result.data;
        var html = '';
        for (var i = 0; i < list.length; i++) {
            list[i].h_img = urlpath + list[i].h_img;
            list[i].replyUrl = '?c=pm&a=detail&uid=' + list[i].uid;
            html += tpl.render(list[i]);
        }
        if (isPrepend) {
            $(opt.listEl).prepend(html);
        } else {
            $(opt.listEl).html(html);
        }


    },
    //针对单个人的私信
    getPmInfo: function(opt) {
        var self = this;
        getApi('pm', 'pminfo', {
            'uid': opt.touid
        }, function(resp) {
            if (resp.status == 1) {
                var result = resp.body;
                self._renderPmInfo(opt, result);
            } else {
                alert(resp.msg);
            }
        });

    },
    _renderPmInfo: function(opt, result) {
        var cls, html = '';
        var tpl = this.compiled_tpl['msgItem'];
        $("#touser").val(result.args.t_name);
        $("#hd-touser").text(result.args.t_name);

        var list = result.data;
        for (var i = 0; i < list.length; i++) {
            console.log('k', list[i]);
            list[i].h_img = urlpath + list[i].h_img;
            cls = list[i].uid == uid ? 'det-me' : 'det-you';
            list[i].det = cls;
            html += tpl.render(list[i]);
        }
        $(opt.listEl).html(html);
    },

    getMsgListByType: function(opt) {
        var self = this;
        $(opt.listEl).html('<div class="loading">加载中...</div>');
        getApi('user', 'mynoticebytype', {
            'type': opt.type,
            'page_no': opt.pageNo,
            'page_size': 10
        }, function(resp) {
            if (resp.status == 1) {
                var result = resp.body;
                self._renderMsgByType(opt, result);
            } else {
                alert(resp.msg);
            }
        });


    },
    _renderMsgByType: function(opt, result, isPrepend) {
        var tpl = this.compiled_tpl['allMsgItem'];
        var list = result[opt.type];
        var html = '';
        var lastCls = 'last-li';
        var self = this;

        $(opt.pagination).twbsPagination({
            totalPages: result.page.total_page,
            visiblePages: 7,
            onPageClick: function(event, page) {
                opt.pageNo = page;
                self.getMsgListByType(opt);
            }
        });
        for (var i = 0; i < list.length; i++) {
            if(i == list.length-1){
                list[i].last = lastCls;
            }else{
                list[i].last = '';
            }
            list[i].topic = 'mock数据，先放上去';
            list[i].h_img = urlpath + list[i].user.h_img;
            list[i].h_url = list[i].user.h_url;
            list[i].replyUrl = '?c=pm&a=detail&uid=' + list[i].uid;
            html += tpl.render(list[i]);
        }
        if (isPrepend) {
            $(opt.listEl).prepend(html);
        } else {
            $(opt.listEl).html(html);
        }

    },
    reply: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var ft = this.compiled_tpl['msgFt'];
        var itemWrap = $(target).parents('.follow_list');
        var id = itemWrap.attr("data-id");
        if (!itemWrap.find(".msg-ft").length) {
            itemWrap.append(ft);
        }
        itemWrap.find(".msg-ft").toggle();

    },
    submitMsg: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var msgItem = $(target).parents(".follow_list");
        var textarea = msgItem.find('textarea');


    },

    getFollowList: function(opt) {

        getApi('user', 'myfollow', {
            'type': ty
        }, function(resp) {
            if (resp.status == 1) {
                $('#follow_area').html('');
                $('#feed_loading').hide();
                var tpl = juicer($("#J-followList").html());
                if (d.body.data.length > 0) {
                    for (var i = 0; i < d.body.data.length; i++) {
                        d.body.data[i].h_img = urlpath + d.body.data[i].h_img;
                        var html = tpl.render(d.body.data[i])
                        console.log(html);
                        $('#follow_area').append($(html));
                    }
                    if (d.body.data.length == 1) {
                        $("#follow_area .follow_list").css({
                            "border-bottom": "none"
                        });
                    }
                } else {
                    $('#follow_font').show();
                }
            } else {
                alert(resp.msg);
            }

        });
    },

    render: function() {

    }
});
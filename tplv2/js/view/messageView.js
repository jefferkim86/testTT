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
        'msgFt': juicer($("#J-ft").html() || '')
    },

    events: {
        "click #send_submit": "submitPm",
        "click #J-Msgtab li": "getTabMsg",
        "click .msg-reply": "reply",
        "click .J-submit-msg": "submitMsg",
        "click #J-pmOverlay": "showPop",
        "click #J-popPmSend": "submitPm",
        "click .close-pop": function(e) {
            e.preventDefault();
            $(".overlay").remove();
            $(".pm-pop").remove();
        }
    },


    initialize: function(options) {
        var counter = $(".pm-detail .counter");
        var max = 140;
        $(".pm-detail #textarea").on("keyup", function(e) {
            var val = $(this).val();
            var len = val.replace("/[^/x00-/xff]/g", "**").length;
            var num = max - len > 0 ? '还可以输入' + (max - len) + '字' : '已经超过<b>' + (len - max) + '</b>个字';
            counter.html(num);
        });
        $("body").on("click", "#J-popPmTitle", function() {
            if ($(this).val() == '输入发送的昵称') {
                $(this).val('');
            }
        });

    },

    showPop: function(e) {
        e.preventDefault();
        $("body").append('<div class="overlay"></div>');
        $("body").append($($("#J-popPmTpl").html()));

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
        var param_touserObj;
        var param_textareaObj;

        if ($(target).hasClass('pop-submit')) {
            param_touserObj = $('#J-popPmTitle');
            param_textareaObj = $("#J-popPmContent");
            if (param_touserObj.val() == '') {
                waring('请输入发送用户');
                return false;
            }
        } else {
            param_touserObj = $('#touser');
            param_textareaObj = $("#textarea");
            if (param_touserObj.val() == '') {
                waring('请等待页面载入');
                return false;
            }
        }

        var txt = param_textareaObj.val();
        if (txt == '') {
            waring('发信内容不能为空');
            return false;
        }
        if (txt.replace("/[^/x00-/xff]/g", "**").length > 140) {
            waring('不能超出140个字数');
            return;
        }

        getApi('pm', 'sendpm', {
            'username': param_touserObj.val(),
            'body': txt
        }, function(resp) {
            if (resp.status == 1) {
                if ($(target).hasClass('pop-submit')) {
                    tips('发送成功');
                    $(".overlay").remove();
                    $(".pm-pop").remove();
                } else {
                    param_textareaObj.val('');
                    tips('发送成功');
                    self.getPmInfo({
                        'touid': $("#toid").attr("toid"),
                        'listEl': '#J-pmInfoList',
                        'pagination': '#J-pagination'
                    })
                }

            } else {
                waring(resp.msg);
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
                self._renderPm(opt, result);
            } else {
                tips(resp.msg);
            }
        });
    },

    _renderPm: function(opt, result, isPrepend) {
        var tpl = this.compiled_tpl['privateMsg'];
        var list = result.data;

        if (result.pm_count) {
            $("#J-pmcount").html('(' + result.pm_count + ')');
        }
        if (!list) {
            $(opt.listEl).html('<div class="no-item">暂无消息</div>');
            return;
        }
        var html = '',
            rdata, lastCls = '';
        for (var i = 0; i < list.length; i++) {
            if (i == list.length - 1) {
                lastCls = 'last-li';
            }

            rdata = {
                'tousername': list[i].tousername,
                'time': list[i].time,
                'info': list[i].info,
                'id': list[i].id,
                'last': lastCls,
                'isNew': list[i].isNew,
                'h_img': urlpath + list[i].h_img,
                'h_url': list[i].h_url,
                'replyUrl': '?c=pm&a=detail&uid=' + list[i].uid
            }
            html += tpl.render(rdata);
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
            'uid': opt.touid,
            'page': opt.pageNo || 1
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
        var self = this;
        var tpl = this.compiled_tpl['msgItem'];
        $("#touser").val(result.args.t_name);
        $("#hd-touser").text(result.args.t_name);

        $(opt.pagination).twbsPagination({
            totalPages: result.page.total_page,
            visiblePages: 7,
            onPageClick: function(event, page) {
                opt.pageNo = page;
                self.getPmInfo(opt);
            }
        });

        var list = result.data;
        for (var i = 0; i < list.length; i++) {
            if (i == list.length - 1) {
                list[i].last = 'last-li';
            } else {
                list[i].last = '';
            }
            list[i].h_img = urlpath + list[i].h_img;
            cls = list[i].uid == uid ? 'det-me' : 'det-you';
            list[i].det = cls;
            html += tpl.render(list[i]);
        }
        $(opt.listEl).html(html);
    },

    getMsgListByType: function(opt) {
        var self = this;
        $(opt.listEl).html('<div class="msg-loading">加载中...</div>');
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
    //TODO 拉倒
    _renderMsgByType: function(opt, result, isPrepend) {
        var tpl = this.compiled_tpl['allMsgItem'];
        var list = result[opt.type];
        var html = '';
        var self = this;
        var lastCls = '';
        var actionMap = {
            '1': '<span>评论了你的</span><a href="{link}">动态</a>',
            '3': '<span>关注了你</span>',
            '4': '<span>转发了你的</span><a href="{link}">动态</a>',
            '5': '<span>喜欢了你的</span><a href="{link}">动态</a>',
            '6': '<span>回复了你的</span><a href="{link}">评论</a>'
        };
        var actionClsMap = {
            'comment': 'J-msg-reply',
            'forward': 'J-forward-replay',
            'like': null,
            'follow': null
        };
        var actionName = {
            'comment': '回复',
            'forward': '评论',
            'like': '',
            'follow': ''
        }
        //判断是否为空数据TODO:最好判断total_count
        if (list.length == 0) {
            $(opt.listEl).html('<div class="no-item">暂无消息</div>');
            return;
        }
        //mock
        //result.page.total_page = 100;
        var totalPages = result.page.total_page;
        if (parseInt(totalPages) > 1) {
            $(opt.pagination).twbsPagination({
                totalPages: totalPages,
                visiblePages: 7,
                onPageClick: function(event, page) {
                    opt.pageNo = page;
                    self.getMsgListByType(opt);
                }
            });
        }
        var notread = result.no_read;
        for (var key in notread) {
            if (notread[key] != '0') {
                $(".J-tab-" + key).text('(' + notread[key] + ')');
            }
        }
        var result;
        for (var i = 0; i < list.length; i++) {
            if (i == list.length - 1) {
                lastCls = 'last-li';
            }


            var reInfo = list[i].extend['info'] || '';
            var actionTmp = actionMap[list[i].sys].replace('{link}', list[i].location);

            result = {
                'last': lastCls,
                'muid': list[i].muid,
                'time': list[i].time,
                'username': list[i].username,
                'actionCls': actionClsMap[opt.type],
                'actionName': actionName[opt.type],
                'bid': list[i].extend['bid'],
                'location': list[i].location,
                'topic': list[i].extend['info'] || '',
                'action': actionTmp,
                'notread': list[i].isread == "0",
                'info': opt.type != "follow" ? list[i].info : '',
                'reInfo': reInfo,
                'h_img': urlpath + list[i].user.h_img,
                'h_url': list[i].user.h_url

            }
            html += tpl.render(result);
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
        var actionBtnTxt = '发布';
        var actionType = 'comment';
        var replyTo = $(target).attr('data-reply-to');
        if ($(target).hasClass('J-forward-replay')) {
            actionBtnTxt = '发布';
            actionType = 'forward';
        }
        var ft = this.compiled_tpl['msgFt'].render({
            'actionBtnTxt': actionBtnTxt,
            'actionType': actionType,
            'replyTo': replyTo
        });
        var itemWrap = $(target).parents('.follow_list');
        var id = itemWrap.attr("data-id");
        if (!itemWrap.find(".msg-ft").length) {
            itemWrap.append($(ft));
        }
        itemWrap.find(".msg-ft").toggle();

    },
    submitMsg: function(e) {
        e.preventDefault();
        var target = e.currentTarget;
        var msgItem = $(target).parents(".follow_list");
        var ft = msgItem.find('.msg-ft');
        var textarea = msgItem.find('textarea');
        var inputVal = textarea.val();
        var replyTo = $(target).attr('data-reply-to');
        var replyContent = $(target).parents('.follow_list').find('.userdata').text();
        var params;
        if (inputVal === "") {
            alert("请填写评论内容");
            return;
        }
        if (inputVal.replace("/[^/x00-/xff]/g", "**").length > 140) {
            alert("不能超出140个字数");
            return;
        }

        getApi('blog', 'setReply', {
            'bid': msgItem.attr('data-bid'),
            'inputs': '@' + replyTo + ':' + inputVal,
            'repcontent': replyContent,
            'repuid': msgItem.attr('data-muid')
        }, function(resp) {
            if (resp.status == '1') {
                ft.hide();
                textarea.val('');
                waring('回复成功');
            } else {
                tips(resp.msg);
            }
        });



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
                        var html = tpl.render(d.body.data[i]);
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
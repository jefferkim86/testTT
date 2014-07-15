function yb_load_feeds(c, a, params, customcallback) {
    var mp = $.feedToolBar.parm.morepage;
    var nc = $.imgCtrl.parm.notCtrl;
    $.paging({
        ctn1: "#feed_box",
        ctn2: "#paging",
        yc: c,
        ym: a,
        showpage: true,
        yprm: params,
        eclick: function() {
            $('#feed_loading').show()
        },
        ftype: function(data) {
            if (data.body.page == null) {
                $.feedToolBar.parm.ttpage = 0
            }
            if (data.status == 1) {
                $('#feed_loading').hide();
                if (!mp) {
                    $('#feed_box').html('')
                };
                if (data.body.blog == false) {
                    $('#feed_none').show()
                } else {
                	console.log(data.body);
                	var tpl = $("#J-feed_template").html();
                    
    var html = Mustache.render(tpl,{"blogs": data.body.blog });
    console.log(html);

                //    $('#feed_box').append(template('feed_template', data.body));
                    

                    $('.autoTxtCount').each(function() {
                        $(this).find('textarea').artTxtCount($(this).find('.tips'), 140)
                    }).removeClass("autoTxtCount");
                    $("#feed_box .box  .avatar").each(function() {
                        var _this_divobj = $(this).find("#divObj");
                        $(this).mouseDelay(200).hover(function() {
                            _this_divobj.show()
                        },
                        function() {
                            _this_divobj.hide()
                        })
                    });
                    if (nc) {
                        $.imgCtrl.setImgEvent($("#feed_box .box .content .text_area_all .wSet"))
                    }
                };
                if (customcallback != undefined) {
                    customcallback(data)
                }
            }
        }
    })
};
function loadCommend(div, bid) {
    if (typeof cus_tplhdefine && cus_tplhdefine.info_reply) {
        info_tpl = cus_tplhdefine.info_reply
    } else {
        info_tpl = tplhdefine.info_reply
    };
    $('#' + div).html(template(info_tpl, {
        bid: bid
    }));
    if (typeof cus_tplhdefine && cus_tplhdefine.reply) {
        tpl = cus_tplhdefine.reply
    } else {
        tpl = tplhdefine.reply
    };
    if (tpl == undefined) {
        tpl = 'tmpl_reply'
    };
    $.paging({
        ctn2: "#comment_paging_" + bid,
        yc: "blog",
        ym: "reply",
        scroll: false,
        likes: false,
        showpage: true,
        yprm: {
            bid: bid
        },
        ftype: function(data) {
            if (data.status == 1) {
                $('#comment_' + bid + ' .reply_comment').html(template(tpl, data.body))
            } else {
                alert(data.msg)
            }
        }
    })
}
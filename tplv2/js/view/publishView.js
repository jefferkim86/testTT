/*
 * @desc 发布view
 * */

Tuitui.publishView = Backbone.View.extend({

    el: "body",

    compiled_tpl: {
        'goodTpl': juicer($("#J_GoodInfoTmp").html() || '')
    },

    events: {
        "click #tags li": "selectTag",
        "click #submit": 'submitForm',
        "click #cancel": function(e) {
            e.preventDefault();
            window.history.go(-1)
        }
    },


    initialize: function(options) {
        var self = this;
        //获取商品
        var urlReg = /(http:\/\/|https:\/\/)((\w|=|\?|\.|\/|&|-)+)/g;
        $("#producturl").on("blur", function(e) {
            var target = e.currentTarget;
            var http = $(target).val();
            if (!$(target).val().match(urlReg)) {
                $("#goodInfoBlock").html('<div class="warn-txt">链接不正确!</div>');
                $(target).addClass('error-input');
                return;
            }
            $("#goodInfoBlock").html('');
            $(target).removeClass('error-input');
            self.getGood(http);
        });

    },

    submitForm: function(e) {
        e.preventDefault();

        var target = e.currentTarget;
        if ($(target).hasClass('disabled')) {
            return;
        }
        var submitType = $(target).attr('type');
        var textareaVal = ueditorInstance.getContent()
        var contentReg = /\<\/?(div|script|p|ol|li|ul|br)[^<>]*\>/gi;
        //$("#textarea").val(textareaVal.replace(contentReg, ''));
        $("#textarea").val(textareaVal);

        var text = $('#textarea').val();
        if (submitType == 'word') {
            if (text == '') {
                tips('内容不能为空喔');
                $('#textarea').focus();
                $(target).removeClass('disabled');
                return false;
            }
        }
        if (submitType == 'product') {
            if ($("#producturl").val() == '') {
                $("#goodInfoBlock").html('<div class="warn-txt">链接必须填写!</div>');
                $("#producturl").addClass('error-input');
                return;
            }
        }
        $(target).addClass('disabled');
        $('#form1').submit();
    },
    /*
     * @desc 如果一个标签，需要在之后加一个逗号。。
     **/
    selectTag: function(e) {
        var target = e.currentTarget;
        var tagVal = $(target).attr("tagVal");
        $(target).toggleClass('cur');
        $(target).siblings('li').removeClass('cur');
        if ($(target).hasClass('cur')) {
            $("#J-tagVal").val(tagVal + ",");
        } else {
            $("#J-tagVal").val("");
        }

    },

    getGood: function(link) {
        var goodTpl = this.compiled_tpl['goodTpl'];
        getApi('item', 'get', {
            'url': link
        }, function(data) {
            if (data.status == 1) {
                var result = data.body;
                //设置提交隐藏域
                for (var key in result) {
                    $("#J_" + key).val(result[key]);
                }
                result.oprice = result.oprice || '';
                result.image = result.image + '_160x160.jpg';
                var html = goodTpl.render(result);
                $("#goodInfoBlock").html(html);
            } else {
                $("#producturl").addClass('error-input');
                $("#goodInfoBlock").html('<div class="warn-txt">获取宝贝失败!</div>');
            }
        });

    },

    publishTextFeed: function() {


    },

    publishPhotoFeed: function() {

    },

    publishGoodFeed: function() {

    },

    render: function() {
        // var self = this;
        // this.collection.each(function(feed) {
        //     self.addFeed(feed);
        // });
    }
});
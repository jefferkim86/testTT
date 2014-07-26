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
        $("#producturl").on("blur", function(e) {
            var target = e.currentTarget;
            var http = $(target).val();
            self.getGood(http);
        });

    },

    submitForm: function(e) {
        e.preventDefault();
        $('#form1').submit();
    },
    /*
     * @desc 如果一个标签，需要在之后加一个逗号。。 
     **/
    selectTag: function(e) {
        var target = e.currentTarget;
        $("#tags li").removeClass('cur');
        $(target).addClass('cur');
        var tagVal = $(target).attr("tagVal");
        console.log(tagVal);
        $("#J-tagVal").val(tagVal+",");
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
                $("#goodInfoBlock").html('<span>' + data.msg + '</span>');
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
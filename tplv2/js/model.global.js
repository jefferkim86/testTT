(function(a) {
    a.fn.disable = function() {
        return a(this).find("*").each(function() {
            a(this).attr("disabled", "disabled")
        })
    };
    a.fn.enable = function() {
        return a(this).find("*").each(function() {
            a(this).removeAttr("disabled")
        })
    }
})(jQuery); (function(a) {
    a.isChange = {
        Set: function(c, d) {
            a(window).bind("beforeunload",
            function() {
                if (b(c, d)) {
                    return "你还有没保存的数据.要退出吗"
                }
            });
            function b(f, g) {
                var e = false;
                if (typeof(g) == "function") {
                    if (g()) {
                        return true
                    }
                }
                a(f).each(function() {
                    var h = a(this).attr("_value");
                    if (typeof(h) == "undefined") {
                        h = ""
                    }
                    if (h != a(this).val()) {
                        e = true
                    }
                });
                return e
            }
        },
        unSet: function(b) {
            a(b).submit(function() {
                a(window).unbind("beforeunload")
            })
        }
    }
})(jQuery);
var qsearch = "添加标签,写一个回车一下";
$(document).ready(function() {
    var a = 16;
    $("#post-tag-input").val(qsearch);
    $("#post-tag").click(function() {
        $("#post-tag-input").focus()
    });
    $("#post-tag-input").focus(function() {
        if ($(this).val() == qsearch) {
            $(this).val("")
        }
    }).blur(function() {
        if ($(this).val() == "") {
            $(this).val(qsearch)
        }
        addtag()
    }).keyup(function(c) {
        $(this).val(b($(this).val(), a));
        if (c.keyCode == "13") {
            addtag()
        }
    });
    function b(g, c) {
        if (!g || !c) {
            return ""
        }
        var d = 0;
        var f = 0;
        var e = "";
        for (f = 0; f < g.length; f++) {
            if (g.charCodeAt(f) > 255) {
                d += 2
            } else {
                d++
            }
            if (d > c) {
                return e
            }
            e += g.charAt(f)
        }
        return g
    }
    $(".globox .trg:even").addClass("alt-row");
    $("#preview").click(function() {
        textbody.exec("Preview")
    });
    $("#cancel").click(function() {
        window.history.go( - 1)
    });
    textbody = $("#textarea").xheditor({
        loadCSS: skinpath + "/css/editor.css",
        urlBase: urlpath + "/",
        internalStyle: false
    })
});
function addtag(a) {
    if (a != undefined) {
        b = a
    } else {
        var b = $("#post-tag-input").val()
    }
    if (b != "" && b != qsearch) {
        $("#post-tag-list").append('<li tag="' + b + '"><span>' + b + '</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
        $("#post-tag-input").val("")
    }
}
function postoff() {
    $("#pb-submiting-tip,#submit_baseinfo,#chgpwd,#cancel").toggle()
}
function setTags() {
    var a = "";
    $("#post-tag-list li").each(function() {
        a += $(this).attr("tag") + ","
    });
    $("#tag").val(a)
}
function delAttach(a) {
    $.dialog({
        content: "确认删除附件？",
        lock: true,
        yesFn: function() {
            $.post(urlpath + "/index.php?c=add&a=delattach", {
                id: a
            },
            function(b) {
                if (b == "ok") {
                    $("#attach_" + a).hide();
                    tips("已删除")
                } else {
                    tips("请稍后再试")
                }
            })
        },
        noFn: true
    })
}
function delAttachIMAGE(a) {
    $.dialog({
        content: "确认删除附件？",
        lock: true,
        okFn: function() {
            $.post(urlpath + "/index.php?c=add&a=delattach", {
                id: a
            },
            function(b) {
                if (b == "ok") {
                    $("#attach_" + a).remove()
                } else {
                    tips("请稍后再试")
                }
            })
        },
        noFn: true
    })
}
function remTags(a) {
    $(a).parent().remove()
}
function tuiTag(a, b) {
    $("#post-tag-list").append('<li tag="' + a + '"><span>' + a + '</span><a href="javascript:;" onclick="remTags(this)" title="删除">x</a></li>');
    $(b).parent().remove()
}
function iattachBigImg(a) {
    var a = a.split("|");
    if ($("#blog-types").val() == 1) {
        $("#attach").val(a[1])
    }
    textbody.pasteHTML('<a href="' + a[0] + '" target="_blank"><img src="' + a[1] + '" alt="" class="feedimg"/></a>')
}
function iattachImg(a) {
    if ($("#blog-types").val() == 1) {
        $("#attach").val(a)
    }
    textbody.pasteHTML('<img src="' + a + '" alt="" class="feedimg"/>')
}
function iattach(a, b) {
    var a = a.split("|");
    if (a[0] == "img") {
        if (a[2] == undefined) {
            parent.textbody.pasteHTML('<img src="' + a[1] + '" />')
        } else {
            parent.textbody.pasteHTML('<a href="' + a[1] + '" target="_blank"><img src="' + a[2] + '" alt="" /></a>')
        }
    } else {
        if (a[0] == "mp3" || a[0] == "mid" || a[0] == "midi" || a[0] == "wma") {
            parent.textbody.pasteHTML("[music]" + a[1] + a[2] + "[/muisc]")
        } else {
            parent.textbody.pasteHTML('<a href="' + a[2] + '">' + a[1] + "</a>")
        }
    }
};
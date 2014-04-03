/**
* Function: Jquery's validator defined methods
*
* Author: qingsongwang
*
* Time: 2014年3月24日15:13:15
*/

//判断姓名是否符合是2-4个汉字，例如：汪青松 ，青松
jQuery.validator.addMethod("isName", function(value, element) {   
    var tel = /[\u4E00-\u9FA5]{2,4}/;
    return this.optional(element) || (tel.test(value));
}, "请正确填写您的姓名");

//判断学号，例如：1004031010
jQuery.validator.addMethod("isStuid", function(value, element) {   
    var tel = /^\d{10}$/;
    return this.optional(element) || (tel.test(value));
}, "请正确填写您的学号，如1004031010");

//判断手机号，例如：13013088***
jQuery.validator.addMethod("isTel", function(value, element) {   
    var tel = /^(13[0-9]|15[0|3|6|7|8|9]|18[8|9])\d{8}$/;
    return this.optional(element) || (tel.test(value));
}, "请正确填写您的手机号");

!function(n,e){"object"==typeof exports&&"undefined"!=typeof module?module.exports=e():"function"==typeof define&&define.amd?define(e):(n.__vee_validate_locale__ar=n.__vee_validate_locale__ar||{},n.__vee_validate_locale__ar.js=e())}(this,function(){"use strict";var n,r=function(n){var e,t,r,u={Byte:"بايت",KB:"كيلوبايت",GB:"جيجابايت",PB:"بيتابايت"};return(e=n,t=1024,r=0==(e=Number(e)*t)?0:Math.floor(Math.log(e)/Math.log(t)),1*(e/Math.pow(t,r)).toFixed(2)+" "+["Byte","KB","MB","GB","TB","PB","EB","ZB","YB"][r]).replace(/(Byte|KB|GB|PB)/,function(n){return u[n]})},e={name:"ar",messages:{_default:function(n){return"قيمة الحقل "+n+" غير صحيحة."},after:function(n,e){return n+" يجب ان يكون بعد "+e[0]+"."},alpha:function(n){return n+" يجب ان يحتوي على حروف فقط."},alpha_dash:function(n){return n+" قد يحتوي على حروف او الرموز - و _."},alpha_num:function(n){return n+" قد يحتوي فقط على حروف وارقام."},alpha_spaces:function(n){return n+" قد يحتوي فقط على حروف ومسافات."},before:function(n,e){return n+" يجب ان يكون قبل "+e[0]+"."},between:function(n,e){return"قيمة "+n+" يجب ان تكون ما بين "+e[0]+" و "+e[1]+"."},confirmed:function(n){return n+" لا يماثل التأكيد."},credit_card:function(n){return"الحقل "+n+" غير صحيح."},date_between:function(n,e){return n+" يجب ان يكون ما بين "+e[0]+" و "+e[1]+"."},date_format:function(n,e){return n+" يجب ان يكون على هيئة "+e[0]+"."},decimal:function(n,e){void 0===e&&(e=[]);var t=e[0];return void 0===t&&(t="*"),n+" يجب ان يكون قيمة رقمية وقد يحتوي على "+("*"===t?"":t)+" ارقام عشرية."},digits:function(n,e){return n+" يجب ان تحتوي فقط على ارقام والا يزيد عددها عن "+e[0]+" رقم."},dimensions:function(n,e){return n+" يجب ان تكون بمقاس "+e[0]+" بكسل في "+e[1]+" بكسل."},email:function(n){return n+" يجب ان يكون بريدا اليكتروني صحيح."},excluded:function(n){return"الحقل "+n+" غير صحيح."},ext:function(n){return"نوع ملف "+n+" غير صحيح."},image:function(n){return n+" يجب ان تكون صورة."},included:function(n){return"الحقل "+n+" يجب ان يكون قيمة صحيحة."},integer:function(n){return"الحقل "+n+" يجب ان يكون عدداً صحيحاً"},ip:function(n){return n+" يجب ان يكون ip صحيح."},length:function(n,e){var t=e[0],r=e[1];return r?"طول الحقل "+n+" يجب ان يكون ما بين "+t+" و "+r+".":"طول الحقل "+n+" يجب ان يكون "+t+"."},max:function(n,e){return"الحقل "+n+" يجب ان يحتوي على "+e[0]+" حروف على الأكثر."},max_value:function(n,e){return"قيمة الحقل "+n+" يجب ان تكون اصغر من "+e[0]+" او تساويها."},mimes:function(n){return"نوع ملف "+n+" غير صحيح."},min:function(n,e){return"الحقل "+n+" يجب ان يحتوي على "+e[0]+" حروف على الأقل."},min_value:function(n,e){return"قيمة الحقل "+n+" يجب ان تكون اكبر من "+e[0]+" او تساويها."},numeric:function(n){return n+" يمكن ان يحتوي فقط على ارقام."},regex:function(n){return"الحقل "+n+" غير صحيح."},required:function(n){return n+" مطلوب."},size:function(n,e){var t=e[0];return n+" يجب ان يكون اقل من "+r(t)+"."},url:function(n){return"الحقل "+n+" يجب ان يكون رابطاً صحيحاً."}},attributes:{}};return"undefined"!=typeof VeeValidate&&VeeValidate.Validator.localize(((n={})[e.name]=e,n)),e});
!function(a,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(a.__vee_validate_locale__lv=a.__vee_validate_locale__lv||{},a.__vee_validate_locale__lv.js=t())}(this,function(){"use strict";var a,t={name:"lv",messages:{_default:function(a){return"Laukā "+a+" ievadītā vērtība nav korekta."},after:function(a,t){var e=t[0];return"Lauka "+a+" vērtībai jābūt lielākai par "+(t[1]?"vai vienādai ar ":"")+e+"."},alpha:function(a){return" Laukā "+a+" var ievadīt tikai burtus."},alpha_dash:function(a){return"Laukā "+a+" var ievadīt tikai burtus, ciparus, domuzīmes un pasvītras."},alpha_num:function(a){return"Laukā "+a+" var ievadīt tikai burtus un ciparus."},alpha_spaces:function(a){return"Laukā "+a+" var ievadīt tikai burtus un atstarpes."},before:function(a,t){var e=t[0];return"Lauka "+a+" vērtībai jābūt mazākai par "+(t[1]?"vai vienādai ar ":"")+e+"."},between:function(a,t){return"Lauka "+a+" vērtībai jābūt intervālā starp "+t[0]+" un "+t[1]+"."},confirmed:function(a){return"Apstiprinājuma lauka "+a+" vērtība nav korekta."},credit_card:function(a){return"Laukā "+a+" ievadīta nekorekta vērtība."},date_between:function(a,t){return"Lauka "+a+" vērtībai jābut intervālā starp "+t[0]+" un "+t[1]+"."},date_format:function(a,t){return"Laukam "+a+" vērtībai jābūt formātā "+t[0]+"."},decimal:function(a,t){void 0===t&&(t=[]);var e=t[0];return void 0===e&&(e="*"),"Laukā "+a+" var ievadīt ciparus un drīkst izmantot "+(e&&"*"!==e?e:"")+" decimālpunktus."},digits:function(a,t){return"Lauka "+a+" vērtību veido precīzs "+t[0]+" ciparu skaits"},dimensions:function(a,t){return"Lauka  "+a+" izmērs ir "+t[0]+" pikseļu  platumā un "+t[1]+" pikseļu augstumā."},email:function(a){return"Lauka "+a+" vērtībai jābūt derīgai e-pasta adresei."},excluded:function(a){return"Laukā "+a+" jāievada derīga vērtība."},ext:function(a){return"Lauka "+a+" vērtībai jābūt failam."},image:function(a){return"Lauka "+a+" vērtībai jābūt attēlam."},included:function(a){return"Lauka "+a+" vērtībai jābūt derīgai."},integer:function(a){return"Lauka "+a+" vērtībai jābūt veselam skaitlim."},ip:function(a){return"Kā "+a+" vērtībai jābūt IP adresei."},length:function(a,t){var e=t[0],r=t[1];return r?"Lauka "+a+" garumam jābūt intervālā starp "+e+" un "+r+".":"Lauka "+a+" garumam jābūt "+e+"."},max:function(a,t){return"Laukā "+a+" nevar ievadīt vairāk nekā "+t[0]+" rakstzīmes."},max_value:function(a,t){return"Lauka "+a+" vērtībai jābūt "+t[0]+" vai mazākai."},mimes:function(a){return"Lauka "+a+" vērtībai jābūt failam."},min:function(a,t){return"Laukā "+a+" jāievada vismaz "+t[0]+" rakstzīmes."},min_value:function(a,t){return"Laukā "+a+" izmanto minimālo vērtību "+t[0]+" vai lielāku."},numeric:function(a){return"Laukā "+a+" var ievadīt tikai ciparus."},regex:function(a){return"Lauka "+a+" formāts nav korekts."},required:function(a){return"Lauks "+a+" ir obligāti aizpildāms."},size:function(a,t){var e,r,i,u=t[0];return"Lauka "+a+" lielumam jābut mazākam nekā "+(e=u,r=1024,i=0==(e=Number(e)*r)?0:Math.floor(Math.log(e)/Math.log(r)),1*(e/Math.pow(r,i)).toFixed(2)+" "+["Byte","KB","MB","GB","TB","PB","EB","ZB","YB"][i])+"."},url:function(a){return"Laukā "+a+" ievadītā URL vērtība nav korekta."}},attributes:{}};return"undefined"!=typeof VeeValidate&&VeeValidate.Validator.localize(((a={})[t.name]=t,a)),t});
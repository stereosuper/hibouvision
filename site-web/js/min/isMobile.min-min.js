!function(e){var i=/iPhone/i,n=/iPod/i,o=/iPad/i,t=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,d=/Android/i,s=/(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,b=/(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,r=/Windows Phone/i,h=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,p=/BlackBerry/i,a=/BB10/i,l=/Opera Mini/i,f=/(CriOS|Chrome)(?=.*\bMobile\b)/i,u=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,c=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),w=function(e,i){return e.test(i)},A=function(e){var A=e||navigator.userAgent,v=A.split("[FBAN");return"undefined"!=typeof v[1]&&(A=v[0]),v=A.split("Twitter"),"undefined"!=typeof v[1]&&(A=v[0]),this.apple={phone:w(i,A),ipod:w(n,A),tablet:!w(i,A)&&w(o,A),device:w(i,A)||w(n,A)||w(o,A)},this.amazon={phone:w(s,A),tablet:!w(s,A)&&w(b,A),device:w(s,A)||w(b,A)},this.android={phone:w(s,A)||w(t,A),tablet:!w(s,A)&&!w(t,A)&&(w(b,A)||w(d,A)),device:w(s,A)||w(b,A)||w(t,A)||w(d,A)},this.windows={phone:w(r,A),tablet:w(h,A),device:w(r,A)||w(h,A)},this.other={blackberry:w(p,A),blackberry10:w(a,A),opera:w(l,A),firefox:w(u,A),chrome:w(f,A),device:w(p,A)||w(a,A)||w(l,A)||w(u,A)||w(f,A)},this.seven_inch=w(c,A),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window?this:void 0},v=function(){var e=new A;return e.Class=A,e};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=A:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=v():"function"==typeof define&&define.amd?define("isMobile",[],e.isMobile=v()):e.isMobile=v()}(this);
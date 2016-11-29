/*


*/

var oDilame;
var tredirLocations={'argentina' : 'AR', 'bolivia' : 'BO', 'brazil' : 'BR', 'chile' : 'CL', 'colombia' : 'CO', 'costa rica' : 'CR', 'cuba' : 'CU', 'dominica' : 'DO', 'dominican republic' : 'DO', 'ecuador' : 'EC', 'guatemala' : 'GT', 'honduras' : 'HN', 'mexico' : 'MX', 'nicaragua' : 'NI', 'panama' : 'PA', 'peru' : 'PE', 'puerto rico' : 'PR', 'paraguay' : 'PY', 'el salvador' : 'SV', 'uruguay' : 'UY', 'venezuela' : 'VE'};
var DILAMEparameters = {};
var readyToTrack = false;

function DILAME( initializationParams ) {
	DILAMEparameters = initializationParams;
	if ( !isInitialized() ) return false;
	
 	// Content Tracking Object
	dilameDebug("DILAME initialization");
	oDilame = this;
	this.page = trackPage;
	this.action = trackAction;
	
	// Initialize Omniture
	cto = new CTO();
	// OMNITURE - pageview
	cto.track();

	// Initialize Coremetrics
        cmSetClientID("51050000|" + DILAMEparameters.id , true, "data.coremetrics.com", DILAMEparameters.URL);
	
}

function dilameDebug(str)
{
	if(!dimgdebug)
		return false
	if(typeof(console)!="undefined" && console.debug)
		console.debug("DILAME :: " + str)
}

/* Implementation Sample
  dilame.page( "pregunta", ["intellectual_id=134132421","question=3"] );
*/
function trackPage(s,d)
{
	if ( !isInitialized() ) return false;
	( isset(s,false,"trackPage :: No page defined") )? s=s:s="no-page";
	( isset(d,false,"trackPage :: No additional attributes defined") )? d=d:d=[];
	( isset(country,false,"trackPage :: No page defined") )? country=country:country="";
	
	dilameDebug("trackPage: " + s);	
	
	// COREMETRICS
            cmCreatePageviewTag(
                DILAMEparameters.pageID,
                DILAMEparameters.catID,
                '',
                '',
                getCoremetricsAttributes() + convertArrayToCMParameter(d)
            );	
	
	readyToTrack=true;	
}


/* Implementation Sample
  dilame.action( "abrirPregunta" , "personaje" , ["intellectual_id=134132421","question=3"] );
*/
function trackAction(a,c,d) {
	dilameDebug("trackAction: " + a);
	if ( !isReadyToTrack() ) return false;
	if ( !isInitialized() ) return false;
	( isset(a,false,"trackAction :: No action defined") )? a=a:a="no-action";
	( isset(c,false,"trackAction :: No Action Category defined") )? c=c:c="";
	
	dilameDebug("trackAction: a=" + a + "  c=" + c + " d=" + d);
	
	ctoTrackAjax(c +":"+ a);
	
	// COREMETRIC > cmCreateElementTag( Element ID, Element Category, Attribute string )
	var cmAdditionalParamters = getCoremetricsAttributes() +"-_-"+ getQuerystring() + convertArrayToCMParameter(d);
	cmCreateElementTag( a , c, cmAdditionalParamters );
}

function convertArrayToCMParameter( arrParameters ){
	var cmParameters = "";
	if(arrParameters && arrParameters.length>0){
		cmParameters = "-_-"+ arrParameters.join("-_-"); 
	}
	return cmParameters;
}

function ctoTrackAjax(pageName) {
    cto.ajaxStart(); 
    cto.pageName = pageName;
    //Optionally modify previously defined properties.
    cto.ajaxEnd(); //Submit Tracking Data
}


function getCoremetricsAttributes() {
	return "sitename="+ DILAMEparameters.sitename + "-_-" +
                "category=DFAM" + "-_-" +
                "BU=FAM" + "-_-" +
                "country=" + DILAMEparameters.baseCountry +(tredirLocations[country]?tredirLocations[country]:"LA") + "-_-" +
                "emid=" + getEmid() + "-_-" +
                "swid=" + getSwid() + "-_-" +
                getMetaKeywordsDescription();
}

function getEmid(){
	return ( isset( DILAMEparameters.emid ) )? MD5(DILAMEparameters.emid):"";
}

function getSwid(){
	return ( isset( DILAMEparameters.swid ) )?DILAMEparameters.swid:"";
}


/*
  Only is ready if the trackPage method was called
*/
function isReadyToTrack(){
	return readyToTrack;
}

function isInitialized(){
	var err=false;
	if( !isset( DILAMEparameters.basepath ,true,"DILAME :: DILAMEparameters :: basepath is unset") ) err=true;
	if( !isset( DILAMEparameters.id ,true,"DILAME :: DILAMEparameters :: id is unset") ) err=true;
	if( !isset( DILAMEparameters.URL ,true,"DILAME :: DILAMEparameters :: URL is unset") ) err=true;
	if( !isset( DILAMEparameters.pageID ,true,"DILAME :: DILAMEparameters :: pageID is unset") ) err=true;
	if( !isset( DILAMEparameters.catID ,true,"DILAME :: DILAMEparameters :: catID is unset") ) err=true;
	if( !isset( DILAMEparameters.sitename ,true,"DILAME :: DILAMEparameters :: sitename is unset") ) err=true;
	// if( !isset( DILAMEparameters.description ,true,"DILAME :: DILAMEparameters :: description is unset") ) err=true;
	// if( !isset( DILAMEparameters.keywords ,true,"DILAME :: DILAMEparameters :: keywords is unset") ) err=true;
	dilameDebug("isInitialized :: err:" + err);
	return !err;
}

function isset( varToCheck, useAlert, message ){
	if( varToCheck === undefined || varToCheck === null || varToCheck=="") {
		if(useAlert){
			console.error("DILAME :: " + message);
			alert(message);
		} else {
			console.warn("DILAME :: " + message);
		}
		return false;
	}
	return true;
}

function getQuerystring() {
	var querystringAttributes = '';
	var querystring = location.search.substring(1);
	var querystringArray = querystring.split("&");
	if (querystringArray.length > 0) {
		for (var i = 0; i < querystringArray.length; i++) {
			querystringArray[i] = decodeURIComponent(querystringArray[i]);
		}
		querystringAttributes = '-_-' + querystringArray.join("-_-");
	}
	return querystringAttributes;
}

function getMetaKeywordsDescription() {
	var keywords="";
	var description="";
	var metas = document.getElementsByTagName('meta');
	if (metas) {
		for (var x=0,y=metas.length; x<y; x++) {
			if (metas[x].name.toLowerCase() == "keywords") {
				keywords += metas[x].content;
			}
			if (metas[x].name.toLowerCase() == "description") {
				description = metas[x].content;
			}
		}
	}
	
	if( !isset( keywords ,true,"DILAME :: There are no META keywords set") ) err=true;
	if( !isset( description ,true,"DILAME :: There are no META description set") ) err=true;
	
	keywords = keywords.replace(/,/gi,";");

	return "keywords=" + keywords + "-_-" + "description=" + description;
}


// MD5 Crypto - - - - - - - - - - - - - - - - - - - - - - - - - - 
var MD5 = function (string) {

   function RotateLeft(lValue, iShiftBits) {
           return (lValue<<iShiftBits) | (lValue>>>(32-iShiftBits));
   }

   function AddUnsigned(lX,lY) {
           var lX4,lY4,lX8,lY8,lResult;
           lX8 = (lX & 0x80000000);
           lY8 = (lY & 0x80000000);
           lX4 = (lX & 0x40000000);
           lY4 = (lY & 0x40000000);
           lResult = (lX & 0x3FFFFFFF)+(lY & 0x3FFFFFFF);
           if (lX4 & lY4) {
                   return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
           }
           if (lX4 | lY4) {
                   if (lResult & 0x40000000) {
                           return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
                   } else {
                           return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
                   }
           } else {
                   return (lResult ^ lX8 ^ lY8);
           }
   }

   function F(x,y,z) { return (x & y) | ((~x) & z); }
   function G(x,y,z) { return (x & z) | (y & (~z)); }
   function H(x,y,z) { return (x ^ y ^ z); }
   function I(x,y,z) { return (y ^ (x | (~z))); }

   function FF(a,b,c,d,x,s,ac) {
           a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac));
           return AddUnsigned(RotateLeft(a, s), b);
   };

   function GG(a,b,c,d,x,s,ac) {
           a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac));
           return AddUnsigned(RotateLeft(a, s), b);
   };

   function HH(a,b,c,d,x,s,ac) {
           a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac));
           return AddUnsigned(RotateLeft(a, s), b);
   };

   function II(a,b,c,d,x,s,ac) {
           a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac));
           return AddUnsigned(RotateLeft(a, s), b);
   };

   function ConvertToWordArray(string) {
           var lWordCount;
           var lMessageLength = string.length;
           var lNumberOfWords_temp1=lMessageLength + 8;
           var lNumberOfWords_temp2=(lNumberOfWords_temp1-(lNumberOfWords_temp1 % 64))/64;
           var lNumberOfWords = (lNumberOfWords_temp2+1)*16;
           var lWordArray=Array(lNumberOfWords-1);
           var lBytePosition = 0;
           var lByteCount = 0;
           while ( lByteCount < lMessageLength ) {
                   lWordCount = (lByteCount-(lByteCount % 4))/4;
                   lBytePosition = (lByteCount % 4)*8;
                   lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount)<<lBytePosition));
                   lByteCount++;
           }
           lWordCount = (lByteCount-(lByteCount % 4))/4;
           lBytePosition = (lByteCount % 4)*8;
           lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80<<lBytePosition);
           lWordArray[lNumberOfWords-2] = lMessageLength<<3;
           lWordArray[lNumberOfWords-1] = lMessageLength>>>29;
           return lWordArray;
   };

   function WordToHex(lValue) {
           var WordToHexValue="",WordToHexValue_temp="",lByte,lCount;
           for (lCount = 0;lCount<=3;lCount++) {
                   lByte = (lValue>>>(lCount*8)) & 255;
                   WordToHexValue_temp = "0" + lByte.toString(16);
                   WordToHexValue = WordToHexValue + WordToHexValue_temp.substr(WordToHexValue_temp.length-2,2);
           }
           return WordToHexValue;
   };

   function Utf8Encode(string) {
           string = string.replace(/\r\n/g,"\n");
           var utftext = "";

           for (var n = 0; n < string.length; n++) {

                   var c = string.charCodeAt(n);

                   if (c < 128) {
                           utftext += String.fromCharCode(c);
                   }
                   else if((c > 127) && (c < 2048)) {
                           utftext += String.fromCharCode((c >> 6) | 192);
                           utftext += String.fromCharCode((c & 63) | 128);
                   }
                   else {
                           utftext += String.fromCharCode((c >> 12) | 224);
                           utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                           utftext += String.fromCharCode((c & 63) | 128);
                   }

           }

           return utftext;
   };

   var x=Array();
   var k,AA,BB,CC,DD,a,b,c,d;
   var S11=7, S12=12, S13=17, S14=22;
   var S21=5, S22=9 , S23=14, S24=20;
   var S31=4, S32=11, S33=16, S34=23;
   var S41=6, S42=10, S43=15, S44=21;

   string = Utf8Encode(string);

   x = ConvertToWordArray(string);

   a = 0x67452301; b = 0xEFCDAB89; c = 0x98BADCFE; d = 0x10325476;

   for (k=0;k<x.length;k+=16) {
           AA=a; BB=b; CC=c; DD=d;
           a=FF(a,b,c,d,x[k+0], S11,0xD76AA478);
           d=FF(d,a,b,c,x[k+1], S12,0xE8C7B756);
           c=FF(c,d,a,b,x[k+2], S13,0x242070DB);
           b=FF(b,c,d,a,x[k+3], S14,0xC1BDCEEE);
           a=FF(a,b,c,d,x[k+4], S11,0xF57C0FAF);
           d=FF(d,a,b,c,x[k+5], S12,0x4787C62A);
           c=FF(c,d,a,b,x[k+6], S13,0xA8304613);
           b=FF(b,c,d,a,x[k+7], S14,0xFD469501);
           a=FF(a,b,c,d,x[k+8], S11,0x698098D8);
           d=FF(d,a,b,c,x[k+9], S12,0x8B44F7AF);
           c=FF(c,d,a,b,x[k+10],S13,0xFFFF5BB1);
           b=FF(b,c,d,a,x[k+11],S14,0x895CD7BE);
           a=FF(a,b,c,d,x[k+12],S11,0x6B901122);
           d=FF(d,a,b,c,x[k+13],S12,0xFD987193);
           c=FF(c,d,a,b,x[k+14],S13,0xA679438E);
           b=FF(b,c,d,a,x[k+15],S14,0x49B40821);
           a=GG(a,b,c,d,x[k+1], S21,0xF61E2562);
           d=GG(d,a,b,c,x[k+6], S22,0xC040B340);
           c=GG(c,d,a,b,x[k+11],S23,0x265E5A51);
           b=GG(b,c,d,a,x[k+0], S24,0xE9B6C7AA);
           a=GG(a,b,c,d,x[k+5], S21,0xD62F105D);
           d=GG(d,a,b,c,x[k+10],S22,0x2441453);
           c=GG(c,d,a,b,x[k+15],S23,0xD8A1E681);
           b=GG(b,c,d,a,x[k+4], S24,0xE7D3FBC8);
           a=GG(a,b,c,d,x[k+9], S21,0x21E1CDE6);
           d=GG(d,a,b,c,x[k+14],S22,0xC33707D6);
           c=GG(c,d,a,b,x[k+3], S23,0xF4D50D87);
           b=GG(b,c,d,a,x[k+8], S24,0x455A14ED);
           a=GG(a,b,c,d,x[k+13],S21,0xA9E3E905);
           d=GG(d,a,b,c,x[k+2], S22,0xFCEFA3F8);
           c=GG(c,d,a,b,x[k+7], S23,0x676F02D9);
           b=GG(b,c,d,a,x[k+12],S24,0x8D2A4C8A);
           a=HH(a,b,c,d,x[k+5], S31,0xFFFA3942);
           d=HH(d,a,b,c,x[k+8], S32,0x8771F681);
           c=HH(c,d,a,b,x[k+11],S33,0x6D9D6122);
           b=HH(b,c,d,a,x[k+14],S34,0xFDE5380C);
           a=HH(a,b,c,d,x[k+1], S31,0xA4BEEA44);
           d=HH(d,a,b,c,x[k+4], S32,0x4BDECFA9);
           c=HH(c,d,a,b,x[k+7], S33,0xF6BB4B60);
           b=HH(b,c,d,a,x[k+10],S34,0xBEBFBC70);
           a=HH(a,b,c,d,x[k+13],S31,0x289B7EC6);
           d=HH(d,a,b,c,x[k+0], S32,0xEAA127FA);
           c=HH(c,d,a,b,x[k+3], S33,0xD4EF3085);
           b=HH(b,c,d,a,x[k+6], S34,0x4881D05);
           a=HH(a,b,c,d,x[k+9], S31,0xD9D4D039);
           d=HH(d,a,b,c,x[k+12],S32,0xE6DB99E5);
           c=HH(c,d,a,b,x[k+15],S33,0x1FA27CF8);
           b=HH(b,c,d,a,x[k+2], S34,0xC4AC5665);
           a=II(a,b,c,d,x[k+0], S41,0xF4292244);
           d=II(d,a,b,c,x[k+7], S42,0x432AFF97);
           c=II(c,d,a,b,x[k+14],S43,0xAB9423A7);
           b=II(b,c,d,a,x[k+5], S44,0xFC93A039);
           a=II(a,b,c,d,x[k+12],S41,0x655B59C3);
           d=II(d,a,b,c,x[k+3], S42,0x8F0CCC92);
           c=II(c,d,a,b,x[k+10],S43,0xFFEFF47D);
           b=II(b,c,d,a,x[k+1], S44,0x85845DD1);
           a=II(a,b,c,d,x[k+8], S41,0x6FA87E4F);
           d=II(d,a,b,c,x[k+15],S42,0xFE2CE6E0);
           c=II(c,d,a,b,x[k+6], S43,0xA3014314);
           b=II(b,c,d,a,x[k+13],S44,0x4E0811A1);
           a=II(a,b,c,d,x[k+4], S41,0xF7537E82);
           d=II(d,a,b,c,x[k+11],S42,0xBD3AF235);
           c=II(c,d,a,b,x[k+2], S43,0x2AD7D2BB);
           b=II(b,c,d,a,x[k+9], S44,0xEB86D391);
           a=AddUnsigned(a,AA);
           b=AddUnsigned(b,BB);
           c=AddUnsigned(c,CC);
           d=AddUnsigned(d,DD);
   		}

   	var temp = WordToHex(a)+WordToHex(b)+WordToHex(c)+WordToHex(d);

   	return temp.toLowerCase();
}

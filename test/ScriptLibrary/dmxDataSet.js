/*
 HTML5 Data Bindings
 Version: 1.0.0
 (c) 2013 DMXzone.com
 @build 24-06-2013 15:11:45
*/
(function(c){if(c.dmxDataBindings){var b=function(a){if(!a)return error("No options are set for dataset!",this,a),!1;if(!a.id)return error("ID for dataset is required!"),!1;if(!(this instanceof b))return new b(a);this.cfg=c.extend({preventInitialLoad:!1,callback:null},a);this.id=a.id;this.data={};this.state="loading";this.init()};c.extend(b,{get:function(a){return b.dataSets[a]}});b.dataSets={};b.prototype={init:function(){b.dataSets[this.id]=this;this.fixCallbacks();this.cfg.dataSet&&this.set(this.cfg.dataSet);
!this.cfg.preventInitialLoad&&this.cfg.url&&this.load(this.cfg)},fixCallbacks:function(){var a=this;c.each("beforeSend complete error success update callback".split(" "),function(c,b){var d=a.cfg[b];typeof d=="string"&&(a.cfg[b]=function(){(new Function(d)).call();if(typeof MM_returnValue!=="undefined"&&MM_returnValue!==null)return MM_returnValue})})},load:function(a){var b=this;"string"==typeof a&&(a={url:a});c.extend(!0,this.cfg,a);c.ajax(this.cfg).done(function(a){b.cfg.root?b.set(a[b.cfg.root]):
b.set(a);c.isFunction(b.cfg.callback)&&b.cfg.callback.call(this)}).fail(function(){b.state="error"})},set:function(a){if("string"==typeof a)try{this.data=c.parseJSON(a),this.state="ready"}catch(b){this.state="error";c.isFunction(this.cfg.error)&&this.cfg.error.call(this);return}else this.data=a,this.state="ready";c.dmxDataBindings.globalScope.add(this.id,this.data);c.isFunction(this.cfg.update)&&this.cfg.update.call(this)}};c.dmxDataSet=b}else alert("DMXzone Data Bindings is required!")})(jQuery);

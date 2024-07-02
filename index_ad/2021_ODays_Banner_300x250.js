(function (cjs, an) {

var p; // shortcut to reference prototypes
var lib={};var ss={};var img={};
lib.ssMetadata = [];


(lib.AnMovieClip = function(){
	this.actionFrames = [];
	this.ignorePause = false;
	this.gotoAndPlay = function(positionOrLabel){
		cjs.MovieClip.prototype.gotoAndPlay.call(this,positionOrLabel);
	}
	this.play = function(){
		cjs.MovieClip.prototype.play.call(this);
	}
	this.gotoAndStop = function(positionOrLabel){
		cjs.MovieClip.prototype.gotoAndStop.call(this,positionOrLabel);
	}
	this.stop = function(){
		cjs.MovieClip.prototype.stop.call(this);
	}
}).prototype = p = new cjs.MovieClip();
// symbols:
// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop, this.reversed));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.Welleli = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AHlA8QgSAAgQgIIgMgHIgMgGQgKgEgMAAQgSAAgNAIQgPAJgKAFQgLADgOAAQgTAAgQgIQgPgKgJgDQgJgEgNAAQgSAAgNAIQgPAJgKAFQgKADgPAAIAAAAQgTAAgQgIQgPgKgIgDQgLgEgMAAQgSAAgNAIQgOAJgKAFQgLADgPAAIAAAAQgSAAgQgIQgPgKgIgDQgLgEgMAAQgSAAgNAIQgOAJgLAFQgKADgPAAIAAAAQgTAAgQgIIgLgHIgMgGQgLgEgMAAQgRAAgOAIQgOAJgKAFQgLADgPAAQgSAAgQgIQgPgKgJgDQgKgEgNAAQgSAAgMAIQgPAJgKAFQgLADgOAAIgBAAQgBAAAAAAQgBAAAAAAQgBgBAAAAQAAgBAAgBQAAgBAAgBQAAAAABgBQAAAAABAAQAAgBABAAQATABAMgIIAZgOQALgDAOAAIABAAQAUgBAOAJIAYANQAKAEAMgBQASABANgIIAMgGIANgIQALgDAOAAQAUgBAPAJIAXANQALAEAMgBQASABANgIIALgGIAOgIQAKgDAPAAIAAAAQAUgBAPAJIALAHIAMAGQALAEALgBIAAAAQASABANgIIALgGIAOgIQAKgDAPAAIAAAAQAUgBAPAJIALAHIAMAGQALAEAMgBQASABANgIIALgGIANgIQALgDAPAAIAAAAQAVgBANAJIAYANQALAEAMgBQARABAOgIIALgGIANgIQALgDAPAAQAUgBAOAJIAYANQAKAEANgBQABAAAAABQABAAAAAAQABABAAAAQAAABAAABQAAABAAABQAAAAgBABQAAAAgBAAQAAAAgBAAgAHlARQgUABgOgJIgYgMQgKgDgMAAQgSgBgNAHQgPAKgKAEQgLADgOAAQgUABgPgJQgPgJgJgDQgJgDgNAAQgSgBgNAHQgPAKgKAEQgKADgPAAIAAAAQgUABgPgJQgPgJgIgDQgLgDgMAAQgSgBgNAHQgOAKgKAEQgLADgPAAIAAAAQgTABgPgJQgPgJgIgDQgLgDgMAAQgSgBgNAHQgOAKgLAEQgKADgPAAIAAAAQgUABgPgJIgXgMQgLgDgMAAQgRgBgOAHQgOAKgKAEQgLADgPAAQgUABgOgJQgPgJgJgDQgKgDgNAAQgSgBgMAHQgPAKgKAEQgLADgOAAIgBAAQgBAAAAAAQgBAAAAAAQgBgBAAAAQAAgBAAgBQAAgBAAgBQAAAAABgBQAAAAABAAQAAAAABAAQATAAAMgIIAZgNQALgDAOAAIABAAQATAAAPAIIAYAMQAKAEAMAAQASAAANgIIAMgFIANgIQALgDAOAAQATAAAQAIIAXAMQALAEAMAAQASAAANgIIALgFIAOgIQAKgDAPAAIAAAAQATAAAQAIIALAGIAMAGQALAEALAAIAAAAIAAAAQASAAANgIIALgFIAOgIQAKgDAPAAIAAAAQATAAAQAIIALAGIAMAGQALAEAMAAQASAAANgIIALgFIANgIQALgDAPAAIAAAAQATAAAPAIIAYAMQALAEAMAAQARAAAOgIIALgFIANgIQALgDAPAAQASAAAQAIIAYAMQAKAEANAAQABAAAAAAQABAAAAAAQABABAAAAQAAABAAABQAAABAAABQAAAAgBABQAAAAgBAAQAAAAgBAAgAHlgbQgSAAgQgJIgMgGIgMgGQgJgEgNgBQgQAAgPAIQgUAMgFACQgKAEgPAAQgTAAgQgJQgPgJgJgDQgJgEgNgBQgRAAgOAIIgLAHQgIAFgGACQgJAEgQAAIAAAAQgTAAgQgJQgPgJgIgDQgKgEgNgBQgRAAgOAIQgTAMgFACQgLAEgPAAIAAAAQgSAAgQgJQgPgJgIgDQgKgEgNgBQgRAAgOAIIgLAHQgHAFgHACQgJAEgQAAIAAAAQgTAAgQgJIgLgGIgMgGQgKgEgNgBQgQAAgPAIQgTAMgFACQgLAEgPAAQgSAAgQgJQgPgJgJgDQgJgEgOgBQgQAAgOAIIgMAHQgHAFgGACQgKAEgPAAIgBAAQgBAAAAAAQgBAAAAgBQgBAAAAgBQAAgBAAAAQAAgBAAgBQAAgBABAAQAAgBABAAQAAAAABAAQARAAAOgHQAUgMAFgCQAMgFANABIABAAQATgBAPAJQATALAFACQAJAEANAAQAQAAAPgHQAUgMAFgCQAMgFANABQATgBAQAJQAUAMADABQAKAEANAAQARAAAOgHIALgHQAHgFAHgCQALgFAOABIAAAAQATgBAQAJIAXANQAKAEAMAAIAAAAQARAAAOgHIALgHQAHgFAHgCQALgFAOABIAAAAQATgBAQAJIAXANQAKAEANAAQARAAAOgHQATgMAFgCQANgFANABIAAAAQATgBAPAJQAUALAEACQAKAEANAAQAQAAAPgHQATgMAFgCQANgFANABQASgBAQAJQAUAMAEABQAJAEAOAAQABAAAAAAQABAAAAABQABAAAAABQAAABAAABQAAAAAAABQAAABgBAAQAAABgBAAQAAAAgBAAg");
	this.shape.setTransform(0.0496,0.0465,0.6611,0.6611);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(144));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-32.3,-3.9,64.69999999999999,8);


(lib.Tween30 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgMAwIAAgkIglg7IAeAAIATAjIAUgjIAeAAIgkA7IAAAkg");
	this.shape.setTransform(5.8821,-0.0663,1.3245,1.3245);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgqAwIAAhfIAxAAQAPgBALAKQAHAHgBAIQAAAHgEAGQgEAHgHACQAIABAGAGQAFAHAAAIQAAANgJAHQgKAHgRAAgAgPAbIATAAQANAAAAgJQAAgJgNAAIgTAAgAgQgIIAQgBQANAAAAgIQAAgIgMAAIgRAAg");
	this.shape_1.setTransform(-6.8001,-0.1389,1.3245,1.3245);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#EBC580").s().p("AirB4IAAjvIFXAAIAADvg");
	this.shape_2.setTransform(0.0211,-0.0001,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-22.7,-15.8,45.5,31.700000000000003);


(lib.Tween29 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgMAwIAAgkIglg7IAeAAIATAjIAUgjIAeAAIgkA7IAAAkg");
	this.shape.setTransform(5.8821,-0.0663,1.3245,1.3245);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgqAwIAAhfIAxAAQAPgBALAKQAHAHgBAIQAAAHgEAGQgEAHgHACQAIABAGAGQAFAHAAAIQAAANgJAHQgKAHgRAAgAgPAbIATAAQANAAAAgJQAAgJgNAAIgTAAgAgQgIIAQgBQANAAAAgIQAAgIgMAAIgRAAg");
	this.shape_1.setTransform(-6.8001,-0.1389,1.3245,1.3245);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#EBC580").s().p("AirB4IAAjvIFXAAIAADvg");
	this.shape_2.setTransform(0.0211,-0.0001,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-22.7,-15.8,45.5,31.700000000000003);


(lib.Tween27 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgpAhIAPgRQANALARAAQALAAAAgGQAAgGgPgEQgSgEgHgFQgLgGAAgOQAAgNAKgJQAKgIAQAAQAWgBASANIgOATQgLgJgPgBQgKAAAAAGQAAAEAEACQADACAJACQASAEAIAGQAKAGAAANQAAAPgLAIQgKAIgSAAQgZAAgTgQg");
	this.shape.setTransform(39.4582,0.0504,1.3245,1.3245);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgNAwIAAhfIAaAAIAABfg");
	this.shape_1.setTransform(30.1535,0.0219,1.3245,1.3245);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AANAwIgSgdIgMAAIAAAdIgaAAIAAhfIAtAAQASgBANALQAJAKgBANQABAJgGAIQgFAIgKAEIAXAhgAgQgBIAQAAQAPAAAAgLQAAgMgPAAIgQAAg");
	this.shape_2.setTransform(20.3852,-0.0227,1.3245,1.3245);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AAZAwIgHgRIgkAAIgHARIgbAAIAohgIAZAAIApBggAgKALIAUAAIgKgbg");
	this.shape_3.setTransform(5.7163,-0.0443,1.3245,1.3245);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AAWAwIgog0IAAA0IgbAAIAAhfIAZAAIAoAyIAAgyIAZAAIAABfg");
	this.shape_4.setTransform(-9.1182,0.0219,1.3245,1.3245);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AAOAwIgTgdIgMAAIAAAdIgaAAIAAhfIAsAAQASgBAOALQAJAKAAANQAAAKgGAHQgFAIgJAEIAWAhgAgQgBIAQAAQAOAAABgLQAAgMgPAAIgQAAg");
	this.shape_5.setTransform(-23.0918,-0.0227,1.3245,1.3245);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AgBAyQgUgBgPgOQgOgOgBgVQAAgTAPgPQAPgPAUAAIABAAQAVAAAPAOQAPAOABAVIAAAAQgBAWgQAOQgPAOgUAAIgBAAgAgQgRQgHAHAAAKIAAAAQgBAKAHAIQAHAIAKAAIAAAAQAKAAAIgHQAHgHAAgKIAAgCQAAgJgHgHQgHgIgKAAIgBgBQgJABgHAHg");
	this.shape_6.setTransform(-38.158,-0.0081,1.3245,1.3245);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#EBC580").s().p("AmgB4IAAjvINBAAIAADvg");
	this.shape_7.setTransform(0.0209,-0.0112,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-55.3,-15.8,110.6,31.700000000000003);


(lib.Tween26 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#EBC580").s().p("AnBGNIAAsZIODAAIAAMZg");
	this.shape.setTransform(0.0029,-0.0001,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-59.6,-52.5,119.2,105.1);


(lib.Tween25 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#EBC580").s().p("AnBGNIAAsZIODAAIAAMZg");
	this.shape.setTransform(0.0029,-0.0001,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-59.6,-52.5,119.2,105.1);


(lib.Tween24 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AhcDQQgrgSgfgeQgfgfgSgpQgRgqAAgtIAAgBQgBgsASgpQARgqAhgfQAfgfArgSQAtgSAvAAQAwAAAsASQApARAhAfQAgAfARAoQARArAAAsIAAABQABAtgSAqQgRApghAgQgfAegrASQgrARgxAAQgxAAgrgRgAgshrQgqAUgPAqQgIAXAAAWIAAAAQAAAWAIAXQAIAUAOARQAPARAUAIQAWALAWgBQAXAAAWgJQAUgJAPgRQAPgQAHgUQAJgXgBgWIAAgBQABgVgJgXQgIgVgOgQQgOgPgVgLQgWgJgXAAQgXAAgVAJg");
	this.shape.setTransform(-0.0302,-0.023,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-30.9,-29.9,61.8,59.8);


(lib.Tween23 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AhcDQQgrgSgfgeQgfgfgSgpQgRgqAAgtIAAgBQgBgsASgpQARgqAhgfQAfgfArgSQAtgSAvAAQAwAAAsASQApARAhAfQAgAfARAoQARArAAAsIAAABQABAtgSAqQgRApghAgQgfAegrASQgrARgxAAQgxAAgrgRgAgshrQgqAUgPAqQgIAXAAAWIAAAAQAAAWAIAXQAIAUAOARQAPARAUAIQAWALAWgBQAXAAAWgJQAUgJAPgRQAPgQAHgUQAJgXgBgWIAAgBQABgVgJgXQgIgVgOgQQgOgPgVgLQgWgJgXAAQgXAAgVAJg");
	this.shape.setTransform(-0.0302,-0.023,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-30.9,-29.9,61.8,59.8);


(lib.Tween22 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AhCBFIAAiJIA3AAQAkAAAVATQAVATAAAeQAAAegVAUQgWATgkAAgAgbAkIAQAAQARAAAKgKQALgJAAgRQAAgPgLgJQgKgKgRAAIgQAAg");
	this.shape.setTransform(0.0117,-0.0083,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-8.8,-9.2,17.700000000000003,18.4);


(lib.Tween21 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AhCBFIAAiJIA3AAQAkAAAVATQAVATAAAeQAAAegVAUQgWATgkAAgAgbAkIAQAAQARAAAKgKQALgJAAgRQAAgPgLgJQgKgKgRAAIgQAAg");
	this.shape.setTransform(0.0117,-0.0083,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-8.8,-9.2,17.700000000000003,18.4);


(lib.Tween20 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AAkBGIgKgZIg1AAIgKAZIgoAAIA7iLIAkAAIA8CLgAgQAPIAfAAIgPgng");
	this.shape.setTransform(-0.026,-0.0083,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-10.4,-9.3,20.8,18.700000000000003);


(lib.Tween19 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AAkBGIgKgZIg1AAIgKAZIgoAAIA7iLIAkAAIA8CLgAgQAPIAfAAIgPgng");
	this.shape.setTransform(-0.026,-0.0083,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-10.4,-9.3,20.8,18.700000000000003);


(lib.Tween18 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgTBGIAAg0Ig1hXIAsAAIAcAzIAdgzIAsAAIg2BWIAAA1g");
	this.shape.setTransform(0.0009,0.008,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-9.6,-9.2,19.299999999999997,18.5);


(lib.Tween17 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgTBGIAAg0Ig1hXIAsAAIAcAzIAdgzIAsAAIg2BWIAAA1g");
	this.shape.setTransform(0.0009,0.008,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-9.6,-9.2,19.299999999999997,18.5);


(lib.Tween16 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("Ag8AxIAWgaQATARAZAAQAQAAAAgKQAAgEgFgDQgFgDgNgDQgagGgLgIQgPgJgBgUQAAgUAPgMQAOgNAZAAQAggBAZAUIgTAbQgSgNgUgBQgOAAAAAJQAAAFAFACQAEADAOADQAaAGAMAJQAOAKAAASQAAAVgQANQgPAMgZAAIgFAAQghAAgbgXg");
	this.shape.setTransform(-0.0255,0.0238,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-8.1,-9.5,16.2,19.1);


(lib.Tween15 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("Ag8AxIAWgaQATARAZAAQAQAAAAgKQAAgEgFgDQgFgDgNgDQgagGgLgIQgPgJgBgUQAAgUAPgMQAOgNAZAAQAggBAZAUIgTAbQgSgNgUgBQgOAAAAAJQAAAFAFACQAEADAOADQAaAGAMAJQAOAKAAASQAAAVgQANQgPAMgZAAIgFAAQghAAgbgXg");
	this.shape.setTransform(-0.0255,0.0238,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-8.1,-9.5,16.2,19.1);


(lib.Tween6 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#A1B1C5").s().p("AAVBkIAAhQQAAgMgGgHQgGgGgJAAQgHAAgHAGQgGAHAAAMIAABQIgzAAIAAjHIAzAAIAABIQAHgJAKgIQAKgHAPAAQAYAAANAPQANAPAAAYIAABhg");
	this.shape.setTransform(54.325,-1.15);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#A1B1C5").s().p("AgYBIQgNgGgLgLQgJgJgHgQQgGgOAAgQIAAAAQAAgPAGgOQAHgPAJgKQALgKAOgHQAPgGAQAAQAWAAAPAJQAPAJAKAQIgjAaQgFgHgGgFQgHgEgJAAQgGAAgFADQgFADgEAEQgDAFgDAGQgCAHAAAFIAAAAQAAAFACAIQACAGAEAFQADADAHAEQAFADAFAAQAJAAAHgEIANgMIAiAaQgKAOgQALQgPAJgYAAQgPAAgPgGg");
	this.shape_1.setTransform(37.675,1.475);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#A1B1C5").s().p("AgZBkIAAiTIAzAAIAACTgAgag9IAAgmIA1AAIAAAmg");
	this.shape_2.setTransform(25.275,-1.15);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#A1B1C5").s().p("AgZBkIAAjHIAzAAIAADHg");
	this.shape_3.setTransform(16.575,-1.15);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#A1B1C5").s().p("AgUBUQgOgMAAgaIAAg8IgQAAIAAgqIAQAAIAAgmIAzAAIAAAmIAiAAIAAAqIgiAAIAAAxQABAIADAEQADADAIAAIAKgBIAJgEIAAApQgIAEgIACQgIADgMAAQgWAAgNgLg");
	this.shape_4.setTransform(5.75,-0.275);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#A1B1C5").s().p("AAVBkIAAhQQAAgMgGgHQgGgGgJAAQgHAAgHAGQgGAHAAAMIAABQIgzAAIAAjHIAzAAIAABIQAHgKAKgHQAKgHAPAAQAYAAANAPQANAPAAAYIAABhg");
	this.shape_5.setTransform(-8.925,-1.15);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#A1B1C5").s().p("AgYBIQgNgGgLgLQgJgJgHgQQgGgOAAgQIAAAAQAAgPAGgOQAHgPAJgKQALgKAOgHQAPgGAQAAQAWAAAPAJQAQAJAJAQIgjAaQgFgHgGgFQgHgEgJAAQgGAAgFADQgFADgEAEQgDAFgDAGQgCAEAAAIIAAAAQAAAIACAFQACAGAEAFQADAEAHADQAFADAFAAQAJAAAHgEQAGgFAHgHIAiAaQgLAPgPAKQgPAJgYAAQgPAAgPgGg");
	this.shape_6.setTransform(-25.575,1.475);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#A1B1C5").s().p("AgZBkIAAiTIAzAAIAACTgAgag9IAAgmIA1AAIAAAmg");
	this.shape_7.setTransform(-37.975,-1.15);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#A1B1C5").s().p("AgeBIQgSgFgPgLIATggQALAIAPAFQALAEAMAAQANAAAAgIIAAgBQAAgEgGgCQgFgDgLgDIgVgHQgJgDgHgGQgIgEgDgIQgEgJAAgKIAAAAQAAgMAEgKQAFgJAHgGQAIgGALgDQAKgEAMAAQARAAAPAFQAQAEAMAJIgRAhQgKgGgNgEQgMgEgIAAQgEAAgEACQgDACAAADIAAABQAAAEAGADIAlANQAKAEAGAFQAIAEADAIQAEAGAAAMIAAABQAAAMgEAJQgEAKgIAGQgHAGgMADQgKAEgOAAQgRAAgSgGg");
	this.shape_8.setTransform(-49.775,1.475);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#A1B1C5").s().p("AgwBMIAAiUIAzAAIAAAeQAGgQALgIQAKgKATABIAAA3IgEAAQgUAAgMAMQgKAMAAAaIAAAug");
	this.shape_9.setTransform(-62.225,1.3202);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#A1B1C5").s().p("AgaBJQgPgHgKgJQgKgKgGgOQgGgPAAgRIAAgBQAAgOAGgPQAFgPAKgKQAKgKANgHQANgGAQAAQATAAAOAHQANAFAKAMQAJAMAEAPQAFAOAAAPIAAAMIhhAAQADANAIAFQAIAGALAAQAKAAAHgDQAIgEAIgIIAcAYQgKAOgQAIQgPAIgWAAQgQAAgPgFgAgPgfQgHAHgCANIAyAAQgCgNgGgHQgHgHgLAAQgKAAgFAHg");
	this.shape_10.setTransform(-77.275,1.45);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#A1B1C5").s().p("AABBkQgGgBgFgDIgKgHIgIgIIAAASIgzAAIAAjIIAzAAIAABIIAIgJIAKgIIALgFQAIgCAGAAQANAAAMAGQAMAFAJAKQAIAKAGAOQAFAOAAASIAAAAQAAASgFAPQgGAPgIAJQgKALgLAFQgMAFgMAAQgGAAgJgCgAgLgGQgFACgEAEIgHAKQgCAGAAAIIAAAAQAAAIACAGIAHALQAEAEAFADQAGACAFAAQAMAAAJgJQAJgKAAgPIAAAAQAAgPgJgJQgJgJgMAAQgFAAgGADg");
	this.shape_11.setTransform(-94.725,-0.975);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#A1B1C5").s().p("Ag6BXQgNgOAAgaIAAhgIA0AAIAABPQgBANAGAGQAGAHAIAAQAJAAAGgHQAGgGAAgNIAAhPIA0AAIAACUIg0AAIAAgVQgHAKgLAHQgJAHgQAAQgXAAgNgPgAAIg+IAAgnIAtAAIAAAngAgyg+IAAgnIAsAAIAAAng");
	this.shape_12.setTransform(-113.45,-0.975);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#EBC580").s().p("A2FErIAApVMAsLAAAIAAJVg");

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-141.4,-29.9,282.8,59.8);


(lib.Tween4 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#A1B1C5").s().p("AgUBTQgNgLAAgbIAAg7IgRAAIAAgqIARAAIAAgmIAyAAIAAAmIAiAAIAAAqIgiAAIAAAxQAAAJAEACQAEAEAGAAIAKgBIAKgEIAAApQgGAEgKACQgKADgKAAQgWAAgNgMg");
	this.shape.setTransform(14.5,-0.25);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#A1B1C5").s().p("AgwBMIAAiUIAzAAIAAAeQAGgPALgJQALgJASAAIAAA4IgEAAQgVAAgKAMQgLAKAAAbIAAAug");
	this.shape_1.setTransform(2.825,1.3487);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#A1B1C5").s().p("AgaBIQgNgFgMgKQgKgLgGgOQgGgOAAgRIAAgBQAAgPAGgPQAFgOAKgLQAJgKAOgGQAOgGAPAAQAUAAANAHQAOAGAJAMQAIAJAFAQQAFAPAAAQIgBAKIhgAAQADANAIAFQAIAHALAAQAKgBAHgDQAIgEAIgIIAcAZQgMAOgOAHQgQAJgVAAQgQAAgPgGgAgPgfQgHAHgCAMIAyAAQgCgNgGgGQgHgIgLAAQgJAAgGAIg");
	this.shape_2.setTransform(-12.175,1.5);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#A1B1C5").s().p("AgZBlIAAiVIAzAAIAACVgAgag9IAAgnIA1AAIAAAng");
	this.shape_3.setTransform(-24.875,-1.125);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#A1B1C5").s().p("AgeBIQgSgFgPgLIATggQAOAKAMADQANAEAKAAQANAAAAgIIAAAAQAAgFgGgCIgRgGQgJgCgLgFQgIgCgIgHQgIgEgDgIQgEgGAAgNIAAAAQAAgMAEgJQAFgKAHgGQAKgHAJgCQAMgEAKAAQARAAAPAFQARAGALAHIgRAhQgNgHgKgDQgLgEgJAAQgGAAgCACQgDADAAACIAAABQAAAFAGACQAEACANAEIAUAHQAKAEAGAFQAIAEADAIQAEAHAAALIAAABQAAALgEALQgEAJgIAGQgIAHgLADQgLADgNAAQgTAAgQgGg");
	this.shape_4.setTransform(-36.675,1.475);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#A1B1C5").s().p("AgeBIQgSgFgPgLIATggQAOAKAMADQANAEAKAAQANAAAAgIIAAAAQAAgFgGgCIgQgGQgIgCgNgFQgHgCgJgHQgIgEgDgIQgEgIAAgLIAAAAQAAgMAEgJQAFgKAHgGQAKgHAJgCQANgEAJAAQARAAAPAFQASAGALAHIgSAhQgNgHgKgDQgLgEgJAAQgGAAgCACQgDADAAACIAAABQAAAFAGACIARAGIAUAHQAKAEAGAFQAHAEAEAIQAEAHAAALIAAABQAAANgEAJQgEAIgIAHQgJAHgKADQgLADgNAAQgTAAgQgGg");
	this.shape_5.setTransform(-51.075,1.475);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#A1B1C5").s().p("Ag6A+QgNgPAAgaIAAhgIAzAAIAABQQAAANAGAFQAFAHAJAAQAJAAAGgHQAGgGAAgMIAAhQIAzAAIAACUIgzAAIAAgUQgHAIgLAIQgKAHgPAAQgXAAgNgOg");
	this.shape_6.setTransform(-67.075,1.625);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#A1B1C5").s().p("AATBlIgdgzIgNAQIAAAjIg0AAIAAjJIA0AAIAABlIAngxIA6AAIgzA7IA0Bag");
	this.shape_7.setTransform(-83.5,-1.125);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#A1B1C5").s().p("AgfBIQgQgHgKgKQgLgLgGgOQgGgNAAgQIAAgBQAAgQAHgOQAGgNAKgLQANgLANgGQAPgGAQAAQASAAAPAGQAOAGALALQALALAGANQAGAOAAAQIAAAAQAAAQgGAOQgHAPgKAKQgLAKgPAHQgOAGgSAAQgRAAgOgGgAgMgeQgGADgDAEQgFAFgBAGQgDAGAAAGIAAAAQAAAGADAHQACAGAEAEQAEAFAGACQAFADAGAAQAIAAAFgDQAGgCAEgFQAEgEACgGQACgGAAgGIAAgBQAAgGgCgGQgCgFgFgGQgFgEgFgDQgFgCgHAAQgGgBgGADg");
	this.shape_8.setTransform(-101.825,1.5);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#A1B1C5").s().p("AghBmIAAhrIgQAAIAAgpIAQAAIAAgDQAAgaANgNQAGgGAKgEQAIgDANAAIATACIAPADIAAAlIgKgDIgJgBQgPAAgBAPIAAADIAiAAIAAAoIghAAIAABrg");
	this.shape_9.setTransform(-116.3,-1.225);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#EBC580").s().p("A2FErIAApVMAsLAAAIAAJVg");
	this.shape_10.setTransform(0,0.025);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-141.4,-29.9,282.8,59.9);


(lib.Tween2 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#A1B1C5").s().p("AgUBUQgNgMAAgbIAAg7IgRAAIAAgqIARAAIAAgmIAyAAIAAAmIAiAAIAAAqIgiAAIAAAxQAAAIAEAEQAEADAGABQAGgBAEgBIAKgEIAAAqQgHADgJADQgJACgLAAQgVAAgOgLg");
	this.shape.setTransform(-2.175,-0.3);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#A1B1C5").s().p("AATBkIgcgyIgOAPIAAAjIgzAAIAAjHIAzAAIAABkIAngxIA6AAIgyA7IAzBZg");
	this.shape_1.setTransform(-16.15,-1.15);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#A1B1C5").s().p("AgpBKQgJgDgGgFQgHgHgEgIQgEgJABgKIAAgBQAAgMAEgJQADgIAJgFQAHgGALgDQAKgDANAAIATACIAPADIAAgCQAAgMgHgFQgHgHgOAAQgNAAgIACIgTAGIgLglQAOgFAMgDQARgEAPABQATAAAPAEQANAFAJAJQAIAJAEALQADALABARIAABUIgzAAIAAgPQgKAJgIAEQgKAFgOABQgLgBgJgDgAgPAPQgGAEAAAIIAAABQAAAIAFAEQAFAFAIgBQALAAAHgGQAGgHAAgLIAAgHIgJgDIgLgBQgKAAgGAGg");
	this.shape_2.setTransform(-34.15,1.5);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#A1B1C5").s().p("AhPBiIAAjAIAzAAIAAAUIAIgJIAKgHIALgFQAJgCAFAAQANAAAMAFQAMAGAJAKQAIAJAGAPQAFAPAAARIAAABQAAARgFAOQgGAQgIAJQgKALgLAEQgMAGgMAAQgGAAgJgCIgLgFIgKgHIgIgIIAAA+gAgLgzQgFADgEAEQgFAGgCAFQgCAFAAAIIAAABQAAAIACAFQACAGAFAEQAEAFAFACQAGADAFAAQANAAAIgKQAJgIAAgPIAAgBQAAgPgJgJQgIgJgNAAQgFAAgGACg");
	this.shape_3.setTransform(-51.175,3.475);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#A1B1C5").s().p("ABCBMIAAhQQAAgNgEgFQgHgHgIAAQgKAAgFAHQgGAGAAAMIAABQIgyAAIAAhQQgBgMgFgGQgFgHgJAAQgKAAgFAHQgGAFAAANIAABQIg0AAIAAiUIA0AAIAAAVQAHgKAKgHQALgHAPAAQAPAAAJAGQALAGAHAMQAJgLALgHQANgGAPAAQAYAAANAOQANAOAAAaIAABhg");
	this.shape_4.setTransform(-74.4,1.275);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#A1B1C5").s().p("AgfBIQgQgGgKgKQgMgNgFgNQgFgOgBgPIAAgBQAAgPAHgOQAFgOALgLQALgLAPgFQAPgHAQAAQASAAAPAHQAOAFALALQALAKAGAOQAFANAAARIAAAAQABAQgHAOQgGAPgKAKQgLALgPAGQgPAGgRAAQgQAAgPgGgAgMgeQgFADgEAEQgEAFgDAGQgCAGAAAGIAAAAQAAAHACAGQADAGAEAEQAFAGAFABQAGADAFAAQAHAAAGgCQAGgDAEgFQADgEACgGQADgHAAgFIAAgBQAAgFgDgHQgCgHgEgEQgEgDgGgEQgEgCgIAAQgHAAgFACg");
	this.shape_5.setTransform(-96.95,1.45);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#A1B1C5").s().p("AATBkIgdgyIgNAPIAAAjIgzAAIAAjHIAzAAIAABkIAngxIA6AAIgzA7IA0BZg");
	this.shape_6.setTransform(-113.025,-1.15);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#EBC580").s().p("A2FErIAApVMAsLAAAIAAJVg");

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-141.4,-29.9,282.8,59.8);


(lib.Tween1 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#A1B1C5").s().p("AgUBUQgNgMAAgbIAAg7IgRAAIAAgqIARAAIAAgmIAyAAIAAAmIAiAAIAAAqIgiAAIAAAxQAAAIAEAEQAEADAGABQAGgBAEgBIAKgEIAAAqQgHADgJADQgJACgLAAQgVAAgOgLg");
	this.shape.setTransform(-2.175,-0.3);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#A1B1C5").s().p("AATBkIgcgyIgOAPIAAAjIgzAAIAAjHIAzAAIAABkIAngxIA6AAIgyA7IAzBZg");
	this.shape_1.setTransform(-16.15,-1.15);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#A1B1C5").s().p("AgpBKQgJgDgGgFQgHgHgEgIQgEgJABgKIAAgBQAAgMAEgJQADgIAJgFQAHgGALgDQAKgDANAAIATACIAPADIAAgCQAAgMgHgFQgHgHgOAAQgNAAgIACIgTAGIgLglQAOgFAMgDQARgEAPABQATAAAPAEQANAFAJAJQAIAJAEALQADALABARIAABUIgzAAIAAgPQgKAJgIAEQgKAFgOABQgLgBgJgDgAgPAPQgGAEAAAIIAAABQAAAIAFAEQAFAFAIgBQALAAAHgGQAGgHAAgLIAAgHIgJgDIgLgBQgKAAgGAGg");
	this.shape_2.setTransform(-34.15,1.5);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#A1B1C5").s().p("AhPBiIAAjAIAzAAIAAAUIAIgJIAKgHIALgFQAJgCAFAAQANAAAMAFQAMAGAJAKQAIAJAGAPQAFAPAAARIAAABQAAARgFAOQgGAQgIAJQgKALgLAEQgMAGgMAAQgGAAgJgCIgLgFIgKgHIgIgIIAAA+gAgLgzQgFADgEAEQgFAGgCAFQgCAFAAAIIAAABQAAAIACAFQACAGAFAEQAEAFAFACQAGADAFAAQANAAAIgKQAJgIAAgPIAAgBQAAgPgJgJQgIgJgNAAQgFAAgGACg");
	this.shape_3.setTransform(-51.175,3.475);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#A1B1C5").s().p("ABCBMIAAhQQAAgNgEgFQgHgHgIAAQgKAAgFAHQgGAGAAAMIAABQIgyAAIAAhQQgBgMgFgGQgFgHgJAAQgKAAgFAHQgGAFAAANIAABQIg0AAIAAiUIA0AAIAAAVQAHgKAKgHQALgHAPAAQAPAAAJAGQALAGAHAMQAJgLALgHQANgGAPAAQAYAAANAOQANAOAAAaIAABhg");
	this.shape_4.setTransform(-74.4,1.275);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#A1B1C5").s().p("AgfBIQgQgGgKgKQgMgNgFgNQgFgOgBgPIAAgBQAAgPAHgOQAFgOALgLQALgLAPgFQAPgHAQAAQASAAAPAHQAOAFALALQALAKAGAOQAFANAAARIAAAAQABAQgHAOQgGAPgKAKQgLALgPAGQgPAGgRAAQgQAAgPgGgAgMgeQgFADgEAEQgEAFgDAGQgCAGAAAGIAAAAQAAAHACAGQADAGAEAEQAFAGAFABQAGADAFAAQAHAAAGgCQAGgDAEgFQADgEACgGQADgHAAgFIAAgBQAAgFgDgHQgCgHgEgEQgEgDgGgEQgEgCgIAAQgHAAgFACg");
	this.shape_5.setTransform(-96.95,1.45);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#A1B1C5").s().p("AATBkIgdgyIgNAPIAAAjIgzAAIAAjHIAzAAIAABkIAngxIA6AAIgzA7IA0BZg");
	this.shape_6.setTransform(-113.025,-1.15);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#EBC580").s().p("A2FErIAApVMAsLAAAIAAJVg");

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-141.4,-29.9,282.8,59.8);


(lib.Symbol4 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(0.5,1,1).p("AAAjDQALgPAKAAIAFAAQAMADADATQAEASgHAXQgGAXgMAOQgKANgKgBQAAAAgCAAIgBAAQgKgDgJgNQgLgOgFgTQgGgXAEgTQAEgSALgDQACgBADABQAJgXALAAQAOAAAHAXAgUjSQALABAJAOAhZifIAEgCQAKgCALAMQALANAFAVQAEASgCAQQgCAPgIAGIgEgEQgKgJgGgIQgGgHgJgOQgBAHAAAIQgEgKgBgGQgEgRABgQQADgQAIgFgAhXhCQgLgGgLgLQgPgQgFgQQgGgQAIgIIAEgCQAKgDANAGAh7iNQgDgVAKgGQALgGAQAPAhXhCIgEgKIgBgNIAAAAAgPATIgZAAIgqgXIgTgPQgKgLgGgIIgFgLQgDgKAAgDQAGAFANAIQAHAEANAGIAcANIABAAIABABIgCgBIgCgCQgOgOgFgIQgFgIgDgIAB8iNIAEACQAIAIgFAQQgGAQgPAQQgIAIgNAJIgIAQQgIALgLALIgEADIABgBIAdgNQAPgIAEgCQAOgIAFgFQAAAGgCAHIgGALQgFAIgKALIgUAPIgUALQgNAHgIAFIgiAAIABgBIAGgIIAIgIIAjgbAB8iNQADgVgKgGQgLgGgQAPAA5g+QgIgGgCgPQgCgPAEgTQAFgVALgNQALgMAKACIAEACQAIAFADAQQACAQgFARQAAAEgEALAA5g+IAFgEQAJgJAHgIQAEgFAKgQQACAHAAAHQAAAHgCAHIgDAKABliKQANgGAKADAgDhiQgJgDgEgMQgEgNACgSIADgRQAFgTAKgPAAAgQIABgCQAIgJANgKQAZgRAKgIAg4g+QALAIAYARQAOAKAHAJIAAACQgIAMgFAMIAAAAIAAACIgJgIIgigbAgNAKIgCAJAAIATIgXAAAAAhiIAABSAhKDpICVAAAhUDUICpAA");
	this.shape.setTransform(0.0337,-2.05);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f().s("#FFFFFF").ss(0.5).p("ABogBQAAAagaA2QgNAbgNAVIhnAAQgNgVgNgbQgag2AAgaQAAgWAOgRQASgQAHgHQAHgHgBgYIgDggIB7AAIgDAgQgBAYAHAHQAHAHASAQQAOARAAAWg");
	this.shape_1.setTransform(0.025,12.675);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_1},{t:this.shape}]}).wait(144));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-14.2,-26.4,28.5,52.8);


(lib.Symbol2 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(0.5,1,1).p("ABDijQAFgFgGgEIgegWQgDgBgCAAQgDABgCACIggAvQgCACABADQABADACABIAdAWQAFAEAEgGgAhXg/IBsiZQACgEAEAAQAEgBAEACICiBzQADACABAEQABAEgDAEIg6BSQABAOgJAMQgJANgRAHIhvCfIizh+IABgCIAng2IAxgNQA5gHArAbQAcASAcAEQAZADAUgJABOhNQAGAEAEgFIAhgvQAEgGgGgDIgegWQgCgCgDABQgDAAgBADIgiAvQgDAFAFAEgACNgpIAigvQADgFgFgEIgegVQgDgCgCABQgDAAgCACIghAvQgCADABACQABADACACIAeAVQAFAEAEgGgAALg5IASgaQACgCADgBQACAAADABIAeAWQAFADgDAGIgRAYIANAHQAZANAaACIAGgIQAEgFgGgFIgegVQgCgCgDABQgDAAgBADIgQAWAg6hGQAAgCACgCIAhgvQABgCADgBQADAAACACIAdAVQAGAEgEAFIgTAcQgXgJgXACgACNgIQgMABgLgBAA2geQgdgTgOgIAhXg/IAdgHAiPAPQAAgOAHgQQAOgiAjgOAgEDFIgSAZIgDgRIgQADIgEgRIgQADIgEgQIgQACIgDgQIgRACIgDgQIgRACIgDgQIgRACIgDgQIgQACIgEgQIgQACIgEgQIgQACIASgbAgChAIANAH");
	this.shape.setTransform(0.147,0.1944,2.9275,2.9275);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(123));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-59.8,-65.7,119.9,131.8);


(lib.Symbol1 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(0.5,1,1).p("AATiPIgEgBIgBAHQAAADgBABIgBAAQgGAJACAIQABAEgBAFQgBABAAAAQAAADgBACIgHAiQgEARgCASIgJBJIgCANIgIBMQgBAFAEAEQADAFAFAAIADAAQAFABAEgDQAEgEAAgFIABgJIAIgDIACgRIAJhQQAAgDADAAIABAAQADABAAADIgNBrQAAADgDAAIgBgBQgDAAABgDIABgKAAWhoQAAgHACgDQADgHgEgKIAAgBIgBgEIABgHIgEAAAARh/QABAAABABQAAABAAABQAAACgCAAQgCgBAAgCQAAgCACAAIACgQAAWhoIgPgCAALAsIAJhJQACgYAAgMIAAgiQAAgDAAgCAAEBqIAIgCAAEBqIAGgxIABgNIgbgDAACB8IACgSAAKA5IgcgD");
	this.shape.setTransform(-1.5505,0.2855,3.7541,3.7541,-44.9993);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(123));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-36.9,-44.9,75.69999999999999,89.8);


(lib.Group = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AhAhBIBygMIADAiIhLAIIACAWIBEgIIAEAfIhFAHIACAXIBNgIIADAiIhzAMg");
	this.shape.setTransform(186.8,10.775);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AhKhAIAlgEIBCBFIgIhLIAogEIAOCPIgjADIhFhHIAIBOIgnAEg");
	this.shape_1.setTransform(170.175,12.575);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgbhFIAogEIAPCPIgoAEg");
	this.shape_2.setTransform(157.5,13.975);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("Ag9hFIAngEIALBsIBFgIIAEAjIhtAMg");
	this.shape_3.setTransform(147.35,15.45);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AhKhAIAlgEIBCBFIgIhLIAogEIAOCPIgjADIhFhHIAIBOIgnAEg");
	this.shape_4.setTransform(131.125,16.825);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgXBIQgPgEgLgJQgMgJgHgNQgHgNgBgPIgBgBQgBgOAEgPQAFgOAJgLQAKgMANgHQAOgHAQgCQAQgCAPAFQAPAEALAJQALAJAHANQAIANABAPIAAABQACAOgFAOQgEAOgJAMQgKALgOAIQgNAHgRACIgJAAQgLAAgKgDgAgDgmQgIABgHAEQgGADgFAGQgEAGgCAHQgCAHABAHIAAABQABAHADAIQAEAGAFAFQAFAFAIACQAHADAHgBQAIgBAHgEQAGgEAEgFQAFgGACgIQACgHgBgHIAAAAQgBgIgEgHQgDgGgFgFQgGgFgHgDQgFgBgGAAIgDAAg");
	this.shape_5.setTransform(113.2598,18.762);

	this.text = new cjs.Text(" ", "bold 21px 'Gotham Black'", "#FFFFFF");
	this.text.lineHeight = 22;
	this.text.parent = this;
	this.text.setTransform(98.05,12.55,1,1,0,-5.7677,-6.2152);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AgcBIQgRgEgPgKIATgdQAYAOAYgCQAIgBAEgDQAEgDgBgFIAAAAIgBgEQgBgBAAAAQAAgBgBAAQAAAAgBgBQgBAAAAAAIgIgDIgLgCIgWgDQgLgCgHgEQgIgFgFgGQgFgHgBgLIAAAAQgBgKADgJQADgJAGgHQAHgHAKgEQAKgFANgBQARgCAPADQAPADANAIIgRAfQgKgGgLgCQgLgDgJABQgHABgDADQgEADABAEIAAAAIABAFQABABAEABIAHADIAMACQAMABALACQAKADAIAEQAHAFAFAGQAEAGABAKIAAABQABALgDAJQgDAJgHAHQgHAHgLAFQgKAEgNABIgMABQgMAAgNgDg");
	this.shape_6.setTransform(91.925,21.1183);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AgRgfIgrAEIgEgjIB9gOIAEAjIgrAFIALBsIgnAFg");
	this.shape_7.setTransform(76.4,22.475);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AhAhBIBygMIADAiIhLAIIACAWIBEgIIADAfIhEAHIADAXIBMgIIAEAiIh0AMg");
	this.shape_8.setTransform(62.8,24.275);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AhMhAIAogDIAGA6IArhAIAvgGIgwBFIBABKIgvAFIgpgxIgNASIAEAmIgoADg");
	this.shape_9.setTransform(47.7,25.9);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AgSBJQgOgEgLgJQgLgJgHgNQgHgNgCgQIAAgBQgCgOAFgPQAEgOAJgLQAJgMANgHQAOgHAQgCQAKgBAKABQAJABAIAEQAIADAGAFQAHAEAFAGIgbAbQgIgHgHgEQgIgDgKABQgHABgGADQgGAEgEAFQgEAGgCAHQgCAHABAHIAAABQABAIADAHQADAGAFAFQAFAFAHACQAGADAHgBQAGgBAEgCQAFgBADgDIAHgHIAGgHIAgASIgKAOIgMAMQgIAFgJADQgJAEgMABIgIABQgLAAgKgDg");
	this.shape_10.setTransform(31.2063,27.6755);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AgbhFIAogEIAOCPIgnAEg");
	this.shape_11.setTransform(18.8,29.075);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AgRgfIgsAEIgDgjIB+gOIADAjIgrAFIALBsIgnAFg");
	this.shape_12.setTransform(7.25,30.025);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.text},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.Group, new cjs.Rectangle(-1.9,0,198.8,43.7), null);


(lib.Ring = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(0.5,1,1).p("AhbirIg3AHIgXAjIAuAIIgjA4IA3AJAhOhbQgGAGgFAHQgEAFgDAFQgEAGgDAGQgEAHgDAIQgSAsAMAxQAQBAA6AiQA6AhBDgRQBCgQAkg5QAkg5gQg/QgQhAg6ghQg7gihCARQgzANghAlIgNhQIggAyIAiArAi7hkIAdAjIggAyIgTgxgAipiBIgSAdAhugpIhQAaAgbB/QAwAcA3gOQA4gOAdgwQAegvgNg0QgNg2gxgbQgwgcg4AOQg3ANgeAwQgeAvAOA1QANA1AxAcg");
	this.shape.setTransform(0.0105,0.0111);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(192));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-22,-18.2,44,36.4);


(lib.presented = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AgtAwIAAhfIAlAAQAZAAAOAOQAPANAAAUQAAAVgPANQgPAOgYAAgAgSAZIALgBQAIACAIgGQAIgGABgKIAAgEQABgJgHgHQgHgHgIAAIgPAAg");
	this.shape.setTransform(54.2083,0.011,1.3245,1.3245);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgmAwIABhfIBMAAIAAAWIgyAAIAAAPIAtAAIAAAUIgtAAIAAAQIAyAAIAAAWg");
	this.shape_1.setTransform(39.8705,0.0441,1.3245,1.3245);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgNAwIAAhIIgcAAIAAgXIBTAAIAAAXIgdAAIAABIg");
	this.shape_2.setTransform(26.8241,0.011,1.3245,1.3245);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AAWAwIgog0IAAA0IgaAAIAAhfIAYAAIAnAyIAAgyIAaAAIAABfg");
	this.shape_3.setTransform(12.8836,0.011,1.3245,1.3245);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgmAwIAAhfIBMAAIAAAWIgxAAIAAAPIAtAAIAAAUIgtAAIAAAQIAyAAIAAAWg");
	this.shape_4.setTransform(-1.388,0.0441,1.3245,1.3245);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgoAiIAOgSQANAMARAAQALAAAAgHQAAgFgQgEQgSgEgHgFQgLgGAAgOQABgOAKgIQAKgJAQAAQAVgBATANIgOATQgMgIgOgBQgKAAAAAGQAAADADACQAEACAJACQASAEAIAGQAKAHAAAMQAAAPgLAIQgLAIgRAAIgDAAQgXAAgRgPg");
	this.shape_5.setTransform(-14.9642,-0.0526,1.3245,1.3245);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AgmAwIAAhfIBMAAIAAAWIgyAAIAAAPIAtAAIAAAUIgtAAIAAAQIAzAAIAAAWg");
	this.shape_6.setTransform(-27.6795,0.0441,1.3245,1.3245);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AANAwIgSgdIgMAAIAAAdIgaAAIAAheIAsAAQASgCANAMQAKAIgBAOQAAAKgFAHQgGAIgJADIAXAigAgQAAIAQAAQAOAAAAgMQAAgLgOAAIgQAAg");
	this.shape_7.setTransform(-41.2226,-0.0336,1.3245,1.3245);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgnAwIAAhfIAnAAQATAAALAJQAKAJABAQQAAAPgMAJQgLAJgSAAIgMAAIAAAcgAgNAAIANAAQAOAAAAgMQAAgMgPAAIgMAAg");
	this.shape_8.setTransform(-54.8981,0.011,1.3245,1.3245);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#EBC580").s().p("AoUB4IAAjvIQpAAIAADvg");
	this.shape_9.setTransform(0.0359,0.011,1.3245,1.3245);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).to({state:[{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]},24).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-70.5,-15.8,141.1,31.700000000000003);


(lib.Kerze = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(0.6,1,1).p("AjtBMQAUAxAdAfQBlBuCniOQCpiNhbh1QgagigsgcQgFgDgEgDIgtgWIiQB5IAAABIhAhNAg2EqIgxApIgdgjIGqlmIAdAjIgxAoIg/A1IANAPQADAEAEAAQAFABADgDIAvgoQADgCAAgFQABgEgDgEIgNgPAlClRIAUASQAVAYABAbQAFBjAwAXQAYALAXgIQgPgHgNgQQgcgfAEgvQAvAEAaAhQAOAPADAQQAHgPgCgWQgGgtgvgpQgegag2gJgAhKg7IgkgrIiRB4IAPAwQACAFABAFICjiHICiiJAgkgOIgmgtAAID0IANAPQADAEgBAFQAAAEgEADIgtAnQgDADgFAAQgFgBgDgDIgMgPAgqEgIgMAKIAAAAIAMgKIAygsADTBKIjLCq");
	this.shape.setTransform(0.025,0);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(192));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-33.3,-34.8,66.69999999999999,69.69999999999999);


(lib.frwa = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(0.5,1,1).p("AgNh4QABgOgKgYQgUgzg7g9IgmAPIADAbQgCAagUALQAbgLAfAGQAtAJAbAmQAKAOAFAPQAJAagEAdQgEAWgKARQgIANgLALQgGADgFAEQglAagugIQgtgJgbglQgagnAHgtQAHgtAlgaQABgBABgBQAIgFAJgEIgSgaQgCgEgEAAQgEgBgEACQgDADAAADQgBAEACAEIARAYAgYhfQACANgDAOQgGAngfAWQggAVgmgIQgmgGgXghQgXggAGgnQAGgnAggVQAfgWAnAHQAmAHAXAhQAEAFADAGQAIAQACARgAiei/QgDABgCABAiDhuIBhgSAijhGICLgZACFDjQAUgWAFggQAHgtgbgnQgIgMgLgKACFDjQASgQAaAIQANAEAKAHIAcgfQgmhMgpgkIgegUQgBgBgBAAQgWgSgcgGQgWgEgUAEQgPADgNAHQgGADgGAEQglAagHAuQgHAtAbAmQAaAnAtAIQAtAJAlgaQABAAABgBQAIgGAHgHIASAaQACAEgBAEQAAADgDADQgEACgEgBQgDAAgDgEIgRgYACOCPQACANgCAOQgHAmgfAWQgfAWgngHQglgIgXggQgXggAHgnQAGgnAfgWQAegWAnAIQAmAHAXAhQAEAFADAGQAIAQACARgACFDjQgBABgCACIABAAQABgBABgCgAADCoICLgZAAjB/IBhgRAgDA0IgFgZQgCgLgKgGIgVgMAAZAqIgvhE");
	this.shape.setTransform(0.0019,-0.0107);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(144));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-23.8,-28.1,47.7,56.3);


(lib.ClipGroup = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(0,0,0,0);


(lib.ClipGroup_0 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_2 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("AqACCIAAkDIUBAAIAAEDg");
	mask.setTransform(64.075,13);

	// Ebene_3
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AJABnIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIAAAAIgBgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgDgCQgCgDADgCIBIg0IACgBIACABIBGAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBFAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBGAzIBGgzIACgBIACABIBIA0QADACgCADIgDACgAJAAdIhGgyIhGAyIgCABIgCgBIhGgyIhHAyIgCABIgCgBIhGgyIhGAyIgCABIgCgBIhGgyIhHAyIgCABIAAAAIgBgBIhGgyIhHAyIgCABIgCgBIhGgyIhGAyIgCABIgCgBIhGgyIhHAyIgCABIgCgBIhGgyIhGAyIgCABIgDgCQgCgDADgCIBIgzIACgBIACABIBGAyIBHgyIACgBIACABIBGAyIBGgyIACgBIACABIBGAyIBGgyIADgBIACABIBFAyIBHgyIACgBIACABIBGAyIBGgyIACgBIACABIBGAyIBGgyIADgBIACABIBGAyIBGgyIACgBIACABIBIAzQADACgCADIgDACgAJAgsIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIAAAAIgBgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgDgCQgCgDADgCIBIg0IACgBIACABIBGAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBFAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBGAzIBGgzIACgBIACABIBIA0QADACgCADIgDACg");
	this.shape.setTransform(64.075,14.975);

	var maskedShapeInstanceList = [this.shape];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.ClipGroup_0, new cjs.Rectangle(5.9,4.6,116.39999999999999,20.799999999999997), null);


(lib.ClipGroup_1 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_2 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("AqACCIAAkDIUBAAIAAEDg");
	mask.setTransform(64.075,13);

	// Ebene_3
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AJABnIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIAAgBIAAABIgBgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgDgCQgCgDADgCIBIg0IACgBIACABIBGAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBFAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBGAzIBGgzIACgBIACABIBIA0QADACgCADIgDACgAJAAdIhGgyIhGAyIgCABIgCgBIhGgyIhHAyIgCABIgCgBIhGgyIhGAyIgCABIgCgBIhGgyIhHAyIgCABIAAgBIAAABIgBgBIhGgyIhHAyIgCABIgCgBIhGgyIhGAyIgCABIgCgBIhGgyIhHAyIgCABIgCgBIhGgyIhGAyIgCABIgDgCQgCgDADgCIBIgzIACgBIACABIBGAyIBHgyIACgBIACABIBGAyIBGgyIACgBIACABIBGAyIBGgyIADgBIACABIBFAyIBHgyIACgBIACABIBGAyIBGgyIACgBIACABIBGAyIBGgyIADgBIACABIBGAyIBGgyIACgBIACABIBIAzQADACgCADIgDACgAJAgsIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIAAgBIAAABIgBgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgCgBIhGgzIhHAzIgCABIgCgBIhGgzIhGAzIgCABIgDgCQgCgDADgCIBIg0IACgBIACABIBGAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBFAzIBHgzIACgBIACABIBGAzIBGgzIACgBIACABIBGAzIBGgzIADgBIACABIBGAzIBGgzIACgBIACABIBIA0QADACgCADIgDACg");
	this.shape.setTransform(64.075,14.975);

	var maskedShapeInstanceList = [this.shape];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.ClipGroup_1, new cjs.Rectangle(5.9,4.6,116.39999999999999,20.799999999999997), null);


(lib.ClipGroup_2 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_2 (mask)
	var mask_1 = new cjs.Shape();
	mask_1._off = true;
	mask_1.graphics.p("AnBF7IAAr1IODAAIAAL1g");
	mask_1.setTransform(44.975,37.9);

	// Ebene_3
	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAAIgIAAQgHAAAAgIg");
	this.shape_1.setTransform(53.225,74.375);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_2.setTransform(69.725,66.225);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_3.setTransform(61.475,66.225);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_4.setTransform(53.225,66.225);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_5.setTransform(69.725,58.125);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_6.setTransform(61.475,58.125);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAAIgIAAQgHAAAAgIg");
	this.shape_7.setTransform(53.225,58.125);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQAIAAAAAHQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_8.setTransform(77.975,49.975);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_9.setTransform(69.725,49.975);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_10.setTransform(61.475,49.975);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_11.setTransform(53.225,49.975);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_12.setTransform(44.975,74.375);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_13.setTransform(36.725,74.375);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_14.setTransform(44.975,66.225);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_15.setTransform(36.725,66.225);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_16.setTransform(28.475,66.225);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgDADQgCACgDAAQgCAAgCgCg");
	this.shape_17.setTransform(20.225,66.225);

	this.shape_18 = new cjs.Shape();
	this.shape_18.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_18.setTransform(44.975,58.125);

	this.shape_19 = new cjs.Shape();
	this.shape_19.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_19.setTransform(36.725,58.125);

	this.shape_20 = new cjs.Shape();
	this.shape_20.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_20.setTransform(28.475,58.125);

	this.shape_21 = new cjs.Shape();
	this.shape_21.graphics.f("#FFFFFF").s().p("AgHAAQAAgCADgCQACgDACAAQAIAAAAAHQAAAIgIAAQgHAAAAgIg");
	this.shape_21.setTransform(20.225,58.125);

	this.shape_22 = new cjs.Shape();
	this.shape_22.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_22.setTransform(44.975,49.975);

	this.shape_23 = new cjs.Shape();
	this.shape_23.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_23.setTransform(36.725,49.975);

	this.shape_24 = new cjs.Shape();
	this.shape_24.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_24.setTransform(28.475,49.975);

	this.shape_25 = new cjs.Shape();
	this.shape_25.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgDADQgCACgDAAQgCAAgCgCg");
	this.shape_25.setTransform(20.225,49.975);

	this.shape_26 = new cjs.Shape();
	this.shape_26.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAAIgIAAQgCAAgCgCg");
	this.shape_26.setTransform(11.975,49.975);

	this.shape_27 = new cjs.Shape();
	this.shape_27.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAAIgIAAQgHAAAAgIg");
	this.shape_27.setTransform(77.975,41.875);

	this.shape_28 = new cjs.Shape();
	this.shape_28.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_28.setTransform(69.725,41.875);

	this.shape_29 = new cjs.Shape();
	this.shape_29.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_29.setTransform(61.475,41.875);

	this.shape_30 = new cjs.Shape();
	this.shape_30.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAAIgIAAQgHAAAAgIg");
	this.shape_30.setTransform(53.225,41.875);

	this.shape_31 = new cjs.Shape();
	this.shape_31.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQAIAAAAAHQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_31.setTransform(77.975,33.725);

	this.shape_32 = new cjs.Shape();
	this.shape_32.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_32.setTransform(69.725,33.725);

	this.shape_33 = new cjs.Shape();
	this.shape_33.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_33.setTransform(61.475,33.725);

	this.shape_34 = new cjs.Shape();
	this.shape_34.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_34.setTransform(53.225,33.725);

	this.shape_35 = new cjs.Shape();
	this.shape_35.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgGAHgBQAIABAAAGQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_35.setTransform(69.725,25.6);

	this.shape_36 = new cjs.Shape();
	this.shape_36.graphics.f("#FFFFFF").s().p("AgHAAQAAgGAHgBQAIABAAAGQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_36.setTransform(61.475,25.6);

	this.shape_37 = new cjs.Shape();
	this.shape_37.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgGAHgBQAIABAAAGQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_37.setTransform(53.225,25.6);

	this.shape_38 = new cjs.Shape();
	this.shape_38.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_38.setTransform(69.725,17.475);

	this.shape_39 = new cjs.Shape();
	this.shape_39.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_39.setTransform(61.475,17.475);

	this.shape_40 = new cjs.Shape();
	this.shape_40.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAAIgIAAQgHAAAAgIg");
	this.shape_40.setTransform(53.225,17.475);

	this.shape_41 = new cjs.Shape();
	this.shape_41.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_41.setTransform(53.225,9.325);

	this.shape_42 = new cjs.Shape();
	this.shape_42.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_42.setTransform(44.975,41.875);

	this.shape_43 = new cjs.Shape();
	this.shape_43.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_43.setTransform(36.725,41.875);

	this.shape_44 = new cjs.Shape();
	this.shape_44.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_44.setTransform(28.475,41.875);

	this.shape_45 = new cjs.Shape();
	this.shape_45.graphics.f("#FFFFFF").s().p("AgHAAQAAgCADgCQACgDACAAQAIAAAAAHQAAAIgIAAQgHAAAAgIg");
	this.shape_45.setTransform(20.225,41.875);

	this.shape_46 = new cjs.Shape();
	this.shape_46.graphics.f("#FFFFFF").s().p("AgHAAQAAgCADgCQACgDACAAQAIAAAAAHQAAAIgIAAQgHAAAAgIg");
	this.shape_46.setTransform(11.975,41.875);

	this.shape_47 = new cjs.Shape();
	this.shape_47.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_47.setTransform(44.975,33.725);

	this.shape_48 = new cjs.Shape();
	this.shape_48.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_48.setTransform(36.725,33.725);

	this.shape_49 = new cjs.Shape();
	this.shape_49.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_49.setTransform(28.475,33.725);

	this.shape_50 = new cjs.Shape();
	this.shape_50.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAADgDADQgCACgDAAQgCAAgCgCg");
	this.shape_50.setTransform(20.225,33.725);

	this.shape_51 = new cjs.Shape();
	this.shape_51.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQAIAAAAAHQAAAIgIAAQgCAAgCgCg");
	this.shape_51.setTransform(11.975,33.725);

	this.shape_52 = new cjs.Shape();
	this.shape_52.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgGAHgBQAIABAAAGQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_52.setTransform(44.975,25.6);

	this.shape_53 = new cjs.Shape();
	this.shape_53.graphics.f("#FFFFFF").s().p("AgHAAQAAgGAHgBQAIABAAAGQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_53.setTransform(36.725,25.6);

	this.shape_54 = new cjs.Shape();
	this.shape_54.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgGAHgBQAIABAAAGQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_54.setTransform(28.475,25.6);

	this.shape_55 = new cjs.Shape();
	this.shape_55.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgGAHgBQAIABAAAGQAAADgDADQgCACgDAAQgCAAgCgCg");
	this.shape_55.setTransform(20.225,25.6);

	this.shape_56 = new cjs.Shape();
	this.shape_56.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_56.setTransform(44.975,17.475);

	this.shape_57 = new cjs.Shape();
	this.shape_57.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_57.setTransform(36.725,17.475);

	this.shape_58 = new cjs.Shape();
	this.shape_58.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCACQgDADgDAAQgHAAAAgIg");
	this.shape_58.setTransform(28.475,17.475);

	this.shape_59 = new cjs.Shape();
	this.shape_59.graphics.f("#FFFFFF").s().p("AgHAAQAAgCADgCQACgDACAAQAIAAAAAHQAAAIgIAAQgHAAAAgIg");
	this.shape_59.setTransform(20.225,17.475);

	this.shape_60 = new cjs.Shape();
	this.shape_60.graphics.f("#FFFFFF").s().p("AgEAGQgDgDAAgDQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgCAAgCgCg");
	this.shape_60.setTransform(44.975,9.325);

	this.shape_61 = new cjs.Shape();
	this.shape_61.graphics.f("#FFFFFF").s().p("AgHAAQAAgHAHAAQADAAADADQACACAAACQAAADgCADQgDACgDAAQgHAAAAgIg");
	this.shape_61.setTransform(36.725,9.325);

	var maskedShapeInstanceList = [this.shape_1,this.shape_2,this.shape_3,this.shape_4,this.shape_5,this.shape_6,this.shape_7,this.shape_8,this.shape_9,this.shape_10,this.shape_11,this.shape_12,this.shape_13,this.shape_14,this.shape_15,this.shape_16,this.shape_17,this.shape_18,this.shape_19,this.shape_20,this.shape_21,this.shape_22,this.shape_23,this.shape_24,this.shape_25,this.shape_26,this.shape_27,this.shape_28,this.shape_29,this.shape_30,this.shape_31,this.shape_32,this.shape_33,this.shape_34,this.shape_35,this.shape_36,this.shape_37,this.shape_38,this.shape_39,this.shape_40,this.shape_41,this.shape_42,this.shape_43,this.shape_44,this.shape_45,this.shape_46,this.shape_47,this.shape_48,this.shape_49,this.shape_50,this.shape_51,this.shape_52,this.shape_53,this.shape_54,this.shape_55,this.shape_56,this.shape_57,this.shape_58,this.shape_59,this.shape_60,this.shape_61];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_1;
	}

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_61},{t:this.shape_60},{t:this.shape_59},{t:this.shape_58},{t:this.shape_57},{t:this.shape_56},{t:this.shape_55},{t:this.shape_54},{t:this.shape_53},{t:this.shape_52},{t:this.shape_51},{t:this.shape_50},{t:this.shape_49},{t:this.shape_48},{t:this.shape_47},{t:this.shape_46},{t:this.shape_45},{t:this.shape_44},{t:this.shape_43},{t:this.shape_42},{t:this.shape_41},{t:this.shape_40},{t:this.shape_39},{t:this.shape_38},{t:this.shape_37},{t:this.shape_36},{t:this.shape_35},{t:this.shape_34},{t:this.shape_33},{t:this.shape_32},{t:this.shape_31},{t:this.shape_30},{t:this.shape_29},{t:this.shape_28},{t:this.shape_27},{t:this.shape_26},{t:this.shape_25},{t:this.shape_24},{t:this.shape_23},{t:this.shape_22},{t:this.shape_21},{t:this.shape_20},{t:this.shape_19},{t:this.shape_18},{t:this.shape_17},{t:this.shape_16},{t:this.shape_15},{t:this.shape_14},{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1}]}).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.ClipGroup_2, new cjs.Rectangle(11.2,8.6,67.6,66.60000000000001), null);


(lib.Tween39 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.instance = new lib.Tween16("synched",0);
	this.instance.setTransform(-41.95,32.35,0.9591,0.9591);

	this.instance_1 = new lib.Tween18("synched",0);
	this.instance_1.setTransform(-60.15,32.4,0.9591,0.9591);

	this.instance_2 = new lib.Tween20("synched",0);
	this.instance_2.setTransform(-77.85,32.35,0.9591,0.9591);

	this.instance_3 = new lib.Tween22("synched",0);
	this.instance_3.setTransform(-97.7,32.35,0.9591,0.9591);

	this.instance_4 = new lib.Tween24("synched",0);
	this.instance_4.setTransform(-70.05,-13.5,0.9591,0.9591);

	this.instance_5 = new lib.Tween26("synched",0);
	this.instance_5.setTransform(-70.05,0,0.9591,0.9591);

	this.instance_6 = new lib.presented();
	this.instance_6.setTransform(-8.55,-35.4,0.9591,0.9591,0,0,0,-71,-0.2);

	this.instance_7 = new lib.Tween30("synched",0);
	this.instance_7.setTransform(-8.55,0,0.9591,0.9591,0,0,0,-23.2,0);

	this.instance_8 = new lib.Tween27("synched",0);
	this.instance_8.setTransform(-9.45,35.5,0.8257,0.9591,0,0,0,-55.5,0.3);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance_8},{t:this.instance_7},{t:this.instance_6},{t:this.instance_5},{t:this.instance_4},{t:this.instance_3},{t:this.instance_2},{t:this.instance_1},{t:this.instance}]}).wait(1));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-127.2,-50.4,254.5,100.9);


(lib.Symbol5 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.instance = new lib.ClipGroup();
	this.instance.setTransform(0.45,-74.1,2.3461,2.3461,0,0,0,54.8,21.8);

	this.shape = new cjs.Shape();
	this.shape.graphics.f("#E4C689").s().p("AgZAiIAAgOIAZgTIAFgGQACgCAAgDQAAgDgCgCQgCgCgDABQgDAAgDABIgGAHIgNgKIAGgGIAGgFIAGgDIAIgBQAGAAAEACQAFACACACQAEAEABADQACAFAAADIgBAHIgDAGIgFAEIgGAGIgKAIIAaAAIAAAPg");
	this.shape.setTransform(122.0016,-1.8245,2.3461,2.3461);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#E4C689").s().p("AgZAiIAAgOIAZgTIAFgGQACgCAAgDQAAgDgCgCQgCgCgDABQgDAAgDABIgGAHIgMgKIAFgGIAGgFIAHgDIAHgBQAGAAAEACQAFACACACQAEADABAEQACADAAAFIgBAHIgDAGIgLAKIgKAIIAaAAIAAAPg");
	this.shape_1.setTransform(106.283,-1.8245,2.3461,2.3461);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#E4C689").s().p("AgMAgQgEgDgFgFQgEgEgCgGQgCgHAAgHIAAAAQAAgFACgHQABgFAFgGQAEgGAGgBQAFgDAGgBQAHAAAGADQAGADADAFQAEAFACAGQACAFAAAHQAAAHgCAHQgCAGgEAEQgFAFgEADQgHADgGgBQgHABgFgDgAgEgQIgEAEIgCAFIgBAHIABAHIACAGIAEAEIAEABQADAAACgBQADgCABgCIACgGIABgHIAAAAIgBgGIgCgGIgEgEIgFgBg");
	this.shape_2.setTransform(89.7432,-1.7072,2.3461,2.3461);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#E4C689").s().p("AgZAiIAAgOIAYgTIAGgGQACgCAAgDQAAgDgCgCQgCgCgDABQgDAAgDABIgGAHIgNgKIAGgGIAGgFIAGgDIAIgBQAGAAAEACQAFACACACQAEAEABADQACAEAAAEIgBAHIgDAGIgFAEIgQAOIAaAAIAAAPg");
	this.shape_3.setTransform(72.8515,-1.8245,2.3461,2.3461);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#E4C689").s().p("AgIAJIAAgRIARAAIAAARg");
	this.shape_4.setTransform(60.5346,3.9821,2.3461,2.3461);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#E4C689").s().p("AgBAhIAAgxIgLADIgDgOIASgFIANAAIAABBg");
	this.shape_5.setTransform(50.0359,-1.7072,2.3461,2.3461);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#E4C689").s().p("AgIAJIAAgRIARAAIAAARg");
	this.shape_6.setTransform(42.7045,3.9821,2.3461,2.3461);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#E4C689").s().p("AgKAhQgFgCgDgCQgEgCgCgEQgCgDAAgFQAAgGADgEQADgEAFgBQgDgCgDgEQgDgDAAgFIAAgBQAAgFACgCQACgDADgDIAIgEQAEgCAFAAQAFAAAFACIAIAEQADADACADQACAEAAADIAAABQAAAFgDADQgCAEgEACIAEABIAEAEIACAEIABAGIAAAAQAAAFgCADQgDAEgDACQgDACgFACIgLABQgFABgFgCgAgGAIQgCACAAADQAAADACACQACACAEABQAFgBACgCQACgCAAgDQAAgDgCgCQgCgCgFAAQgEAAgCACgAgFgSQgCADAAADQAAADACABQADADACAAQADAAADgCQACgCAAgDQAAgDgCgDQgCgCgEAAQgDAAgCACg");
	this.shape_7.setTransform(30.6222,-1.7072,2.3461,2.3461);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#E4C689").s().p("AAAAhIAAgxIgMADIgDgOIASgFIANAAIAABBg");
	this.shape_8.setTransform(17.191,-1.7072,2.3461,2.3461);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#E4C689").s().p("AgXAIIAAgPIAuAAIAAAPg");
	this.shape_9.setTransform(2.1761,-0.8274,2.3461,2.3461);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#E4C689").s().p("AgIAJIAAgRIARAAIAAARg");
	this.shape_10.setTransform(-12.5668,3.9618,2.3459,2.3459);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#E4C689").s().p("AgKAhQgEgCgEgEQgDgFgCgFQgDgGAAgJQAAgEACgJQADgIACgEQAEgFAGgCQAGgDAHgBQAHABAEACQAFABAFAEIgJANIgFgEQgDgBgEAAQgGAAgCAEQgDADAAAHIAFgEQADgBAEAAIAIABIAIAEIAEAFIACAJQAAAHgCAEQgCAEgDADQgFAEgEABQgEACgGgBQgGAAgFgBgAgFAGQgDACAAAEQAAADADADQADADADAAQAEAAACgDQADgCAAgEIAAAAQAAgEgDgCQgDgDgEAAQgDAAgCADg");
	this.shape_11.setTransform(-24.4723,-1.727,2.3459,2.3459);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#E4C689").s().p("AgBAhIAAgxIgLADIgDgOIASgFIANAAIAABBg");
	this.shape_12.setTransform(-38.1959,-1.727,2.3459,2.3459);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#E4C689").s().p("AgJAKQAJAAAAgJIgHAAIAAgRIARAAIAAAPQAAAEgBAEQgBADgDADIgFADIgIABg");
	this.shape_13.setTransform(-52.682,5.7212,2.3459,2.3459);

	this.shape_14 = new cjs.Shape();
	this.shape_14.graphics.f("#E4C689").s().p("AAPAhIgbgjIAAAjIgSAAIAAhBIARAAIAaAiIAAgiIASAAIAABBg");
	this.shape_14.setTransform(-66.8748,-1.6684,2.3459,2.3459);

	this.shape_15 = new cjs.Shape();
	this.shape_15.graphics.f("#E4C689").s().p("AAJAhIgMgUIgIAAIAAAUIgSAAIAAhBIAeAAQAHAAAGABQAFADADADQAGAGAAAJQAAAIgEAEQgDAFgGADIAPAXgAgLAAIALAAQAEAAADgDQACgCAAgDIAAgBQAAgEgCgCQgCgBgFAAIgLAAg");
	this.shape_15.setTransform(-85.3488,-1.6684,2.3459,2.3459);

	this.shape_16 = new cjs.Shape();
	this.shape_16.graphics.f("#E4C689").s().p("AgaAhIAAhBIA0AAIAAAPIgiAAIAAAKIAfAAIAAAOIgfAAIAAAKIAiAAIAAAQg");
	this.shape_16.setTransform(-103.5297,-1.6684,2.3459,2.3459);

	this.shape_17 = new cjs.Shape();
	this.shape_17.graphics.f("#E4C689").s().p("AgcAhIAAhBIAgAAQAGAAAFABQAEACADADQACABABADIABAGQAAAGgDAEQgDAEgEABQAGABAEAEQADAFAAAGQAAAIgGAFQgIAFgLAAgAgLASIANAAQAFAAACgBQAAgBABAAQAAgBAAAAQABgBAAAAQAAgBAAgBIAAAAQAAgBAAAAQAAgBgBAAQAAgBAAAAQgBgBAAAAQgCgCgFAAIgNAAgAgLgGIALAAQAEAAACgBQABgBAAAAQAAgBABAAQAAgBAAAAQAAgBAAgBQAAAAAAgBQAAgBAAAAQgBgBAAAAQAAgBgBAAQgCgCgEAAIgLAAg");
	this.shape_17.setTransform(-121.1827,-1.6684,2.3459,2.3459);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_17,p:{scaleX:2.3459,scaleY:2.3459,x:-121.1827,y:-1.6684}},{t:this.shape_16,p:{scaleX:2.3459,scaleY:2.3459,x:-103.5297,y:-1.6684}},{t:this.shape_15,p:{scaleX:2.3459,scaleY:2.3459,x:-85.3488,y:-1.6684}},{t:this.shape_14,p:{scaleX:2.3459,scaleY:2.3459,x:-66.8748,y:-1.6684}},{t:this.shape_13,p:{scaleX:2.3459,scaleY:2.3459,x:-52.682,y:5.7212}},{t:this.shape_12,p:{scaleX:2.3459,scaleY:2.3459,x:-38.1959,y:-1.727}},{t:this.shape_11,p:{scaleX:2.3459,scaleY:2.3459,x:-24.4723,y:-1.727}},{t:this.shape_10,p:{scaleX:2.3459,scaleY:2.3459,x:-12.5668,y:3.9618}},{t:this.shape_9,p:{x:2.1761,y:-0.8274}},{t:this.shape_8,p:{x:17.191,y:-1.7072}},{t:this.shape_7,p:{x:30.6222,y:-1.7072}},{t:this.shape_6,p:{x:42.7045,y:3.9821}},{t:this.shape_5,p:{x:50.0359,y:-1.7072}},{t:this.shape_4,p:{x:60.5346,y:3.9821}},{t:this.shape_3,p:{x:72.8515,y:-1.8245}},{t:this.shape_2,p:{x:89.7432,y:-1.7072}},{t:this.shape_1,p:{x:106.283,y:-1.8245}},{t:this.shape,p:{x:122.0016,y:-1.8245}},{t:this.instance}]}).to({state:[{t:this.shape_17,p:{scaleX:2.346,scaleY:2.346,x:-121.1756,y:-1.6585}},{t:this.shape_16,p:{scaleX:2.346,scaleY:2.346,x:-103.522,y:-1.6585}},{t:this.shape_15,p:{scaleX:2.346,scaleY:2.346,x:-85.3406,y:-1.6585}},{t:this.shape_14,p:{scaleX:2.346,scaleY:2.346,x:-66.8659,y:-1.6585}},{t:this.shape_13,p:{scaleX:2.346,scaleY:2.346,x:-52.6726,y:5.7314}},{t:this.shape_12,p:{scaleX:2.346,scaleY:2.346,x:-38.1861,y:-1.7171}},{t:this.shape_11,p:{scaleX:2.346,scaleY:2.346,x:-24.462,y:-1.7171}},{t:this.shape_10,p:{scaleX:2.346,scaleY:2.346,x:-12.5561,y:3.9719}},{t:this.shape_9,p:{x:2.1761,y:-0.8274}},{t:this.shape_8,p:{x:17.191,y:-1.7072}},{t:this.shape_7,p:{x:30.6222,y:-1.7072}},{t:this.shape_6,p:{x:42.7045,y:3.9821}},{t:this.shape_5,p:{x:50.0359,y:-1.7072}},{t:this.shape_4,p:{x:60.5346,y:3.9821}},{t:this.shape_3,p:{x:72.8515,y:-1.8245}},{t:this.shape_2,p:{x:89.7432,y:-1.7072}},{t:this.shape_1,p:{x:106.2829,y:-1.8245}},{t:this.shape,p:{x:122.0016,y:-1.8245}},{t:this.instance}]},196).to({state:[{t:this.shape_17,p:{scaleX:2.346,scaleY:2.346,x:-121.1713,y:-1.6525}},{t:this.shape_16,p:{scaleX:2.346,scaleY:2.346,x:-103.5174,y:-1.6525}},{t:this.shape_15,p:{scaleX:2.346,scaleY:2.346,x:-85.3356,y:-1.6525}},{t:this.shape_14,p:{scaleX:2.346,scaleY:2.346,x:-66.8605,y:-1.6525}},{t:this.shape_13,p:{scaleX:2.346,scaleY:2.346,x:-52.667,y:5.7375}},{t:this.shape_12,p:{scaleX:2.346,scaleY:2.346,x:-38.1802,y:-1.7111}},{t:this.shape_11,p:{scaleX:2.346,scaleY:2.346,x:-24.4559,y:-1.7111}},{t:this.shape_10,p:{scaleX:2.346,scaleY:2.346,x:-12.5497,y:3.978}},{t:this.shape_9,p:{x:2.1806,y:-0.8234}},{t:this.shape_8,p:{x:17.1956,y:-1.7032}},{t:this.shape_7,p:{x:30.627,y:-1.7032}},{t:this.shape_6,p:{x:42.7095,y:3.9861}},{t:this.shape_5,p:{x:50.041,y:-1.7032}},{t:this.shape_4,p:{x:60.5398,y:3.9861}},{t:this.shape_3,p:{x:72.8568,y:-1.8205}},{t:this.shape_2,p:{x:89.7488,y:-1.7032}},{t:this.shape_1,p:{x:106.2888,y:-1.8205}},{t:this.shape,p:{x:122.0076,y:-1.8205}},{t:this.instance}]},12).wait(32));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-128,-9.8,256.1,19.6);


(lib.ClipGroup_3 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_2 (mask)
	var mask_2 = new cjs.Shape();
	mask_2._off = true;
	mask_2.graphics.p("A6dJBIAAyBMA07AAAIAASBg");
	mask_2.setTransform(169.425,57.7);

	// Ebene_3
	this.instance = new lib.Group();
	this.instance.setTransform(168.45,68.2,1,1,0,0,0,97.5,21.9);

	var maskedShapeInstanceList = [this.instance];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask_2;
	}

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.ClipGroup_3, new cjs.Rectangle(69,46.3,198.8,43.7), null);


(lib.Stoerer = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Stoerer_svg
	this.instance = new lib.ClipGroup_3();
	this.instance.setTransform(-1.9,33.2,1,1,0,0,0,169.4,57.7);

	this.shape = new cjs.Shape();
	this.shape.graphics.f("#1D1D1B").s().p("A1oiUMArRgEjIAAJMMgrRAEjg");
	this.shape.setTransform(-1.875,43.525);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape},{t:this.instance}]}).wait(139));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-171.3,-24.5,338.9,115.4);


(lib.Group_1 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.instance = new lib.ClipGroup_1();
	this.instance.setTransform(64,13,1,1,0,0,0,64,13);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.Group_1, new cjs.Rectangle(0,0,128.2,26), null);


(lib.Group_2 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.instance = new lib.ClipGroup_0();
	this.instance.setTransform(64,13,1,1,0,0,0,64,13);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.Group_2, new cjs.Rectangle(0,0,128.2,26), null);


(lib.Punkte = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// Ebene_1
	this.instance = new lib.ClipGroup_2();
	this.instance.setTransform(45,37.9,1,1,0,0,0,45,37.9);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

	this._renderFirstFrame();

}).prototype = getMCSymbolPrototype(lib.Punkte, new cjs.Rectangle(0,0,90,75.8), null);


(lib.Zackeli = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	// FlashAICB
	this.instance = new lib.Group_2();
	this.instance.setTransform(-15.65,-71.05,1,1,90,0,0,64,13);
	this.instance.alpha = 0.5;

	this.instance_1 = new lib.Group_1();
	this.instance_1.setTransform(5.6,-71.05,1,1,90,0,0,64,13);
	this.instance_1.alpha = 0.5;

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance_1},{t:this.instance}]}).wait(144));

	this._renderFirstFrame();

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-28.6,-135,47.2,128.1);


// stage content:
(lib._2021_ODays_Banner_300x250_3 = function(mode,startPosition,loop,reversed) {
if (loop == null) { loop = true; }
if (reversed == null) { reversed = false; }
	var props = new Object();
	props.mode = mode;
	props.startPosition = startPosition;
	props.labels = {};
	props.loop = loop;
	props.reversed = reversed;
	cjs.MovieClip.apply(this,[props]);

	this.actionFrames = [334];
	// timeline functions:
	this.frame_334 = function() {
		if (!this.looped) this.looped = 1;
		
		if (this.looped++ == 2) this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).wait(334).call(this.frame_334).wait(1));

	// MergedLayer_4
	this.instance = new lib.Tween25("synched",0);
	this.instance.setTransform(77.75,97.25,0.0491,0.0491,0,0,0,1,0);
	this.instance.alpha = 0;

	this.instance_1 = new lib.Tween23("synched",0);
	this.instance_1.setTransform(77.75,83.8,0.0948,0.0948,0,0,0,0.6,0.6);
	this.instance_1.alpha = 0;

	this.instance_2 = new lib.Tween26("synched",0);
	this.instance_2.setTransform(77.7,97.25,1.095,1.095);

	this.instance_3 = new lib.Tween24("synched",0);
	this.instance_3.setTransform(77.7,83.75,1.094,1.094);

	this.instance_4 = new lib.presented();
	this.instance_4.setTransform(139.15,61.85,0.0203,0.9591,0,0,0,-69,-0.2);

	this.instance_5 = new lib.Tween21("synched",0);
	this.instance_5.setTransform(50.05,129.65,0.0271,0.0261,0,0,0,-1.9,1.9);

	this.instance_6 = new lib.Tween19("synched",0);
	this.instance_6.setTransform(69.9,129.65,0.0231,0.0256,0,0,0,0,1.9);

	this.instance_7 = new lib.Tween17("synched",0);
	this.instance_7.setTransform(87.6,129.7,0.0248,0.0258,0,0,0,-2,1.9);

	this.instance_8 = new lib.Tween29("synched",0);
	this.instance_8.setTransform(139.15,97.25,0.0625,0.9591,0,0,0,-22.4,0);

	this.instance_9 = new lib.Tween15("synched",0);
	this.instance_9.setTransform(105.85,129.65,0.0297,0.0252,0,0,0,1.7,4);

	this.instance_10 = new lib.Tween27("synched",0);
	this.instance_10.setTransform(139.15,132.75,0.0259,0.9591,0,0,0,-54.1,0.3);

	this.instance_11 = new lib.Tween22("synched",0);
	this.instance_11.setTransform(50.05,129.6,0.9591,0.9591);

	this.instance_12 = new lib.Tween30("synched",0);
	this.instance_12.setTransform(139.2,97.25,0.9591,0.9591,0,0,0,-23.2,0);

	this.instance_13 = new lib.Tween20("synched",0);
	this.instance_13.setTransform(69.9,129.6,0.9591,0.9591);

	this.instance_14 = new lib.Tween18("synched",0);
	this.instance_14.setTransform(87.6,129.65,0.9591,0.9591);

	this.instance_15 = new lib.Tween16("synched",0);
	this.instance_15.setTransform(105.8,129.6,0.9591,0.9591);

	this.instance_16 = new lib.Tween39("synched",0);
	this.instance_16.setTransform(147.75,97.25);
	this.instance_16._off = true;

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.instance}]}).to({state:[{t:this.instance}]},179).to({state:[{t:this.instance}]},1).to({state:[{t:this.instance}]},1).to({state:[{t:this.instance}]},1).to({state:[{t:this.instance}]},1).to({state:[{t:this.instance},{t:this.instance_1,p:{regX:0.6,regY:0.6,scaleX:0.0948,scaleY:0.0948,y:83.8,alpha:0,x:77.75}}]},1).to({state:[{t:this.instance},{t:this.instance_1,p:{regX:0.2,regY:0.2,scaleX:0.2375,scaleY:0.2375,y:83.75,alpha:0.1406,x:77.75}}]},1).to({state:[{t:this.instance},{t:this.instance_1,p:{regX:0,regY:0.1,scaleX:0.3803,scaleY:0.3803,y:83.75,alpha:0.2891,x:77.7}}]},1).to({state:[{t:this.instance_2,p:{scaleX:1.095,scaleY:1.095,x:77.7}},{t:this.instance_1,p:{regX:0.1,regY:0.1,scaleX:0.523,scaleY:0.523,y:83.75,alpha:0.4297,x:77.75}}]},1).to({state:[{t:this.instance_2,p:{scaleX:1.0678,scaleY:1.0678,x:77.7}},{t:this.instance_1,p:{regX:0,regY:0.1,scaleX:0.6658,scaleY:0.6658,y:83.75,alpha:0.5703,x:77.65}}]},1).to({state:[{t:this.instance_2,p:{scaleX:1.0406,scaleY:1.0406,x:77.65}},{t:this.instance_1,p:{regX:0,regY:0,scaleX:0.8085,scaleY:0.8085,y:83.7,alpha:0.7109,x:77.65}}]},1).to({state:[{t:this.instance_2,p:{scaleX:1.0134,scaleY:1.0134,x:77.7}},{t:this.instance_1,p:{regX:0,regY:0,scaleX:0.9512,scaleY:0.9512,y:83.7,alpha:0.8594,x:77.65}}]},1).to({state:[{t:this.instance_4,p:{regX:-69,scaleX:0.0203,x:139.15}},{t:this.instance_2,p:{scaleX:0.9863,scaleY:0.9863,x:77.75}},{t:this.instance_3,p:{scaleX:1.094,scaleY:1.094,x:77.7,y:83.75}}]},1).to({state:[{t:this.instance_4,p:{regX:-70.5,scaleX:0.1376,x:139.15}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:1.0603,scaleY:1.0603,x:77.75,y:83.7}}]},1).to({state:[{t:this.instance_4,p:{regX:-70.8,scaleX:0.255,x:139.1}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:1.0265,scaleY:1.0265,x:77.8,y:83.75}}]},1).to({state:[{t:this.instance_4,p:{regX:-70.8,scaleX:0.3723,x:139.15}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9928,scaleY:0.9928,x:77.8,y:83.7}},{t:this.instance_5,p:{regX:-1.9,regY:1.9,scaleX:0.0271,scaleY:0.0261,y:129.65,x:50.05}}]},1).to({state:[{t:this.instance_4,p:{regX:-70.9,scaleX:0.4897,x:139.1}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_5,p:{regX:-1.6,regY:0.7,scaleX:0.1602,scaleY:0.1593,y:129.7,x:50.05}}]},1).to({state:[{t:this.instance_4,p:{regX:-70.9,scaleX:0.607,x:139.05}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_5,p:{regX:-1.7,regY:0.4,scaleX:0.2934,scaleY:0.2926,y:129.7,x:50.05}},{t:this.instance_6,p:{regY:1.9,scaleX:0.0231,scaleY:0.0256,y:129.65,regX:0,x:69.9}}]},1).to({state:[{t:this.instance_8,p:{regX:-22.4,scaleX:0.0625,x:139.15}},{t:this.instance_4,p:{regX:-70.8,scaleX:0.7244,x:139.15}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_5,p:{regX:-1.8,regY:0.2,scaleX:0.4265,scaleY:0.4259,y:129.7,x:50.05}},{t:this.instance_6,p:{regY:0.7,scaleX:0.1568,scaleY:0.159,y:129.7,regX:0,x:69.9}},{t:this.instance_7,p:{regX:-2,regY:1.9,scaleX:0.0248,scaleY:0.0258,x:87.6,y:129.7}}]},1).to({state:[{t:this.instance_8,p:{regX:-23.2,scaleX:0.2418,x:139.1}},{t:this.instance_4,p:{regX:-71,scaleX:0.8417,x:139.05}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_5,p:{regX:-1.8,regY:0.1,scaleX:0.5596,scaleY:0.5592,y:129.65,x:50.05}},{t:this.instance_6,p:{regY:0.1,scaleX:0.2905,scaleY:0.2923,y:129.65,regX:-0.1,x:69.85}},{t:this.instance_7,p:{regX:-1.9,regY:0.3,scaleX:0.1583,scaleY:0.1591,x:87.55,y:129.7}},{t:this.instance_9,p:{regX:1.7,regY:4,scaleX:0.0297,scaleY:0.0252,x:105.85,y:129.65}}]},1).to({state:[{t:this.instance_8,p:{regX:-23.1,scaleX:0.4211,x:139.05}},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_5,p:{regX:-1.9,regY:0.1,scaleX:0.6928,scaleY:0.6925,y:129.65,x:50}},{t:this.instance_6,p:{regY:0.2,scaleX:0.4242,scaleY:0.4257,y:129.7,regX:0,x:69.9}},{t:this.instance_7,p:{regX:-1.9,regY:0.1,scaleX:0.2918,scaleY:0.2925,x:87.6,y:129.7}},{t:this.instance_9,p:{regX:0.3,regY:1.9,scaleX:0.1624,scaleY:0.1586,x:105.85,y:129.65}}]},1).to({state:[{t:this.instance_10,p:{regX:-54.1,scaleX:0.0259,x:139.15}},{t:this.instance_8,p:{regX:-22.9,scaleX:0.6005,x:139.15}},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_5,p:{regX:-1.8,regY:0.1,scaleX:0.8259,scaleY:0.8258,y:129.7,x:50}},{t:this.instance_6,p:{regY:0.1,scaleX:0.5579,scaleY:0.559,y:129.65,regX:-0.1,x:69.85}},{t:this.instance_7,p:{regX:-1.9,regY:0.2,scaleX:0.4252,scaleY:0.4258,x:87.6,y:129.75}},{t:this.instance_9,p:{regX:0,regY:2,scaleX:0.2952,scaleY:0.292,x:105.8,y:129.7}}]},1).to({state:[{t:this.instance_10,p:{regX:-55.3,scaleX:0.1592,x:139}},{t:this.instance_8,p:{regX:-22.9,scaleX:0.7798,x:139.15}},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_11},{t:this.instance_6,p:{regY:0,scaleX:0.6916,scaleY:0.6924,y:129.65,regX:0,x:69.95}},{t:this.instance_7,p:{regX:-1.9,regY:0.2,scaleX:0.5587,scaleY:0.5591,x:87.6,y:129.75}},{t:this.instance_9,p:{regX:0.1,regY:2,scaleX:0.428,scaleY:0.4254,x:105.85,y:129.65}}]},1).to({state:[{t:this.instance_10,p:{regX:-55.4,scaleX:0.2925,x:138.85}},{t:this.instance_12},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_11},{t:this.instance_6,p:{regY:0.1,scaleX:0.8254,scaleY:0.8257,y:129.7,regX:0,x:69.9}},{t:this.instance_7,p:{regX:-2,regY:0.1,scaleX:0.6921,scaleY:0.6924,x:87.55,y:129.7}},{t:this.instance_9,p:{regX:0,regY:2,scaleX:0.5608,scaleY:0.5588,x:105.8,y:129.65}}]},1).to({state:[{t:this.instance_10,p:{regX:-55.4,scaleX:0.4258,x:138.75}},{t:this.instance_12},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_11},{t:this.instance_13},{t:this.instance_7,p:{regX:-1.9,regY:0.1,scaleX:0.8256,scaleY:0.8257,x:87.65,y:129.8}},{t:this.instance_9,p:{regX:0.1,regY:2,scaleX:0.6935,scaleY:0.6922,x:105.85,y:129.65}}]},1).to({state:[{t:this.instance_10,p:{regX:-55.6,scaleX:0.5591,x:138.55}},{t:this.instance_12},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_11},{t:this.instance_13},{t:this.instance_14},{t:this.instance_9,p:{regX:0,regY:2,scaleX:0.8263,scaleY:0.8257,x:105.8,y:129.7}}]},1).to({state:[{t:this.instance_10,p:{regX:-55.5,scaleX:0.6924,x:138.45}},{t:this.instance_12},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_11},{t:this.instance_13},{t:this.instance_14},{t:this.instance_15}]},1).to({state:[{t:this.instance_10,p:{regX:-55.5,scaleX:0.8257,x:138.3}},{t:this.instance_12},{t:this.instance_4,p:{regX:-71,scaleX:0.9591,x:139.2}},{t:this.instance_2,p:{scaleX:0.9591,scaleY:0.9591,x:77.7}},{t:this.instance_3,p:{scaleX:0.9591,scaleY:0.9591,x:77.7,y:83.75}},{t:this.instance_11},{t:this.instance_13},{t:this.instance_14},{t:this.instance_15}]},1).to({state:[{t:this.instance_16}]},26).to({state:[{t:this.instance_16}]},13).wait(90));
	this.timeline.addTween(cjs.Tween.get(this.instance).wait(179).to({startPosition:0},0).wait(1).to({regX:0,scaleX:0.1798,scaleY:0.1798,x:77.7,alpha:0.1289},0).wait(1).to({regX:0.1,scaleX:0.3105,scaleY:0.3105,x:77.75,alpha:0.25},0).wait(1).to({regX:0,scaleX:0.4413,scaleY:0.4413,x:77.7,alpha:0.3789},0).wait(1).to({scaleX:0.5721,scaleY:0.5721,alpha:0.5},0).wait(1).to({scaleX:0.7028,scaleY:0.7028,x:77.65,alpha:0.6289},0).wait(1).to({scaleX:0.8335,scaleY:0.8335,x:77.6,alpha:0.75},0).wait(1).to({scaleX:0.9643,scaleY:0.9643,x:77.65,alpha:0.8789},0).to({_off:true},1).wait(148));
	this.timeline.addTween(cjs.Tween.get(this.instance_16).wait(232).to({_off:false},0).to({regY:0.1,scaleX:0.5814,scaleY:0.5814,x:94.55,y:50.1},13,cjs.Ease.cubicInOut).wait(90));

	// Symbol_5
	this.instance_17 = new lib.Symbol5();
	this.instance_17.setTransform(148.1,180.2);
	this.instance_17.alpha = 0;
	this.instance_17._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_17).wait(204).to({_off:false},0).to({alpha:1},14,cjs.Ease.cubicInOut).wait(14).to({scaleX:0.5814,scaleY:0.5814,x:94.75,y:98.3},13,cjs.Ease.cubicInOut).wait(90));

	// Stoerer
	this.instance_18 = new lib.Stoerer();
	this.instance_18.setTransform(152.25,151.9,8.4681,8.4681,0,0,0,-1.2,35.8);
	this.instance_18.alpha = 0;
	this.instance_18._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_18).wait(236).to({_off:false},0).to({regX:-1.7,regY:35.7,scaleX:0.8697,scaleY:0.8697,x:148,y:151,alpha:1},8).to({regY:35.8,scaleX:0.925,scaleY:0.925,y:151.05},6).wait(20).to({regX:-1.6,scaleX:1.0989,scaleY:1.0989,x:148.05,y:151.1},8,cjs.Ease.cubicInOut).to({regX:-1.7,scaleX:0.925,scaleY:0.925,x:148,y:151.05},9,cjs.Ease.cubicInOut).wait(18).to({regX:-1.6,scaleX:1.0989,scaleY:1.0989,x:148.05,y:151.1},8,cjs.Ease.cubicInOut).to({regX:-1.7,scaleX:0.925,scaleY:0.925,x:148,y:151.05},9,cjs.Ease.cubicInOut).wait(13));

	// Ring
	this.instance_19 = new lib.Ring();
	this.instance_19.setTransform(360.15,5.85,1.4857,1.5697,-123.7548);
	this.instance_19._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_19).wait(174).to({_off:false},0).to({scaleX:1.526,scaleY:1.6123,rotation:-159.0024,x:80.05,y:-2.95},19,cjs.Ease.cubicInOut).to({rotation:-99.0028,x:110.95,y:0.05},23,cjs.Ease.cubicInOut).to({regX:-0.1,regY:0.1,scaleX:1.5259,scaleY:1.6122,rotation:-159.0028,x:240.1,y:49},49,cjs.Ease.cubicInOut).wait(1).to({regX:0,regY:0,rotation:-156.9426,x:240.0934,y:49.5349},0).wait(1).to({scaleY:1.6121,rotation:-154.8951,x:240.2858,y:49.9669},0).wait(1).to({scaleY:1.6122,rotation:-152.87,x:240.4763,y:50.3941},0).wait(1).to({rotation:-150.8764,x:240.6639,y:50.8145},0).wait(1).to({rotation:-148.9225,x:240.848,y:51.2264},0).wait(1).to({rotation:-147.015,x:241.0279,y:51.6285},0).wait(1).to({rotation:-145.1597,x:241.203,y:52.0194},0).wait(1).to({rotation:-143.361,x:241.373,y:52.3983},0).wait(1).to({rotation:-141.622,x:241.5374,y:52.7645},0).wait(1).to({rotation:-139.9449,x:241.6962,y:53.1177},0).wait(1).to({rotation:-138.3309,x:241.8491,y:53.4575},0).wait(1).to({rotation:-136.7802,x:241.9961,y:53.7839},0).wait(1).to({rotation:-135.2925,x:242.1373,y:54.097},0).wait(1).to({rotation:-133.867,x:242.2726,y:54.397},0).wait(1).to({rotation:-132.5023,x:242.4023,y:54.6841},0).wait(1).to({rotation:-131.1969,x:242.5265,y:54.9588},0).wait(1).to({rotation:-129.9489,x:242.6452,y:55.2213},0).wait(1).to({rotation:-128.7564,x:242.7588,y:55.4722},0).wait(1).to({rotation:-127.6174,x:242.8673,y:55.7117},0).wait(1).to({rotation:-126.5297,x:242.9711,y:55.9405},0).wait(1).to({rotation:-125.4912,x:243.0701,y:56.1589},0).wait(1).to({rotation:-124.4999,x:243.1648,y:56.3674},0).wait(1).to({rotation:-123.5539,x:243.2551,y:56.5664},0).wait(1).to({rotation:-122.651,x:243.3414,y:56.7562},0).wait(1).to({rotation:-121.7895,x:243.4238,y:56.9374},0).wait(1).to({rotation:-120.9675,x:243.5024,y:57.1103},0).wait(1).to({rotation:-120.1832,x:243.5775,y:57.2752},0).wait(1).to({rotation:-119.4351,x:243.6491,y:57.4325},0).wait(1).to({rotation:-118.7216,x:243.7175,y:57.5825},0).wait(1).to({rotation:-118.0411,x:243.7827,y:57.7256},0).wait(1).to({rotation:-117.3922,x:243.8449,y:57.862},0).wait(1).to({rotation:-116.7736,x:243.9042,y:57.9921},0).wait(1).to({rotation:-116.184,x:243.9608,y:58.1161},0).wait(1).to({rotation:-115.6222,x:244.0147,y:58.2342},0).wait(1).to({rotation:-115.087,x:244.066,y:58.3467},0).wait(1).to({rotation:-114.5774,x:244.115,y:58.4539},0).wait(1).to({rotation:-114.0924,x:244.1615,y:58.5559},0).wait(1).to({rotation:-113.6309,x:244.2059,y:58.6529},0).wait(1).to({rotation:-113.1921,x:244.248,y:58.7452},0).wait(1).to({rotation:-112.775,x:244.2881,y:58.8329},0).wait(1).to({rotation:-112.3789,x:244.3262,y:58.9161},0).wait(1).to({rotation:-112.003,x:244.3623,y:58.9952},0).wait(1).to({rotation:-111.6466,x:244.3966,y:59.0701},0).wait(1).to({rotation:-111.3088,x:244.4291,y:59.1412},0).wait(1).to({rotation:-110.9891,x:244.4599,y:59.2084},0).wait(1).to({rotation:-110.6869,x:244.489,y:59.2719},0).wait(1).to({rotation:-110.4014,x:244.5164,y:59.332},0).wait(1).to({rotation:-110.1323,x:244.5424,y:59.3886},0).wait(1).to({rotation:-109.8788,x:244.5668,y:59.4419},0).wait(1).to({rotation:-109.6405,x:244.5897,y:59.492},0).wait(1).to({rotation:-109.4169,x:244.6112,y:59.539},0).wait(1).to({rotation:-109.2075,x:244.6314,y:59.583},0).wait(1).to({rotation:-109.0119,x:244.6502,y:59.6241},0).wait(1).to({rotation:-108.8297,x:244.6678,y:59.6625},0).wait(1).to({rotation:-108.6603,x:244.6841,y:59.6981},0).wait(1).to({rotation:-108.5035,x:244.6992,y:59.7311},0).wait(1).to({rotation:-108.3589,x:244.7132,y:59.7615},0).wait(1).to({rotation:-108.2261,x:244.726,y:59.7894},0).wait(1).to({rotation:-108.1047,x:244.7377,y:59.8149},0).wait(1).to({rotation:-107.9945,x:244.7483,y:59.8381},0).wait(1).to({rotation:-107.8951,x:244.7579,y:59.859},0).wait(1).to({rotation:-107.8062,x:244.7664,y:59.8777},0).wait(1).to({rotation:-107.7275,x:244.774,y:59.8942},0).wait(1).to({rotation:-107.6588,x:244.7806,y:59.9087},0).wait(1).to({rotation:-107.5998,x:244.7863,y:59.9211},0).wait(1).to({rotation:-107.5502,x:244.7911,y:59.9315},0).wait(1).to({rotation:-107.5098,x:244.795,y:59.94},0).wait(1).to({rotation:-107.4784,x:244.798,y:59.9466},0).wait(1).to({rotation:-107.4557,x:244.9,y:60},0).wait(1));

	// Kerze
	this.instance_20 = new lib.Kerze();
	this.instance_20.setTransform(483.5,175.05,1.0068,1.0068,-18.7807,0,0,0.2,0);
	this.instance_20._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_20).wait(184).to({_off:false},0).to({regY:-0.1,scaleX:1.2762,scaleY:1.2762,rotation:56.2185,x:188.5,y:251.9},21,cjs.Ease.cubicInOut).to({regY:0,scaleX:1.2761,scaleY:1.2761,rotation:26.2188,x:230,y:260},33,cjs.Ease.cubicInOut).wait(1).to({regX:0,scaleX:1.2762,scaleY:1.2762,rotation:26.29,x:229.7502,y:259.9044},0).wait(1).to({rotation:26.3802,x:229.7504,y:259.9099},0).wait(1).to({rotation:26.4904,x:229.7507,y:259.9167},0).wait(1).to({rotation:26.6217,x:229.751,y:259.9248},0).wait(1).to({rotation:26.775,x:229.7514,y:259.9342},0).wait(1).to({rotation:26.9515,x:229.7518,y:259.945},0).wait(1).to({rotation:27.1524,x:229.7524,y:259.9574},0).wait(1).to({scaleX:1.2761,scaleY:1.2761,rotation:27.3791,x:229.7529,y:259.9713},0).wait(1).to({scaleX:1.2762,scaleY:1.2762,rotation:27.633,x:229.7536,y:259.987},0).wait(1).to({scaleX:1.2761,scaleY:1.2761,rotation:27.9158,x:229.7543,y:260.0044},0).wait(1).to({scaleX:1.2762,scaleY:1.2762,rotation:28.229,x:229.7552,y:260.0236},0).wait(1).to({rotation:28.5746,x:229.7561,y:260.0449},0).wait(1).to({rotation:28.9546,x:229.7571,y:260.0683},0).wait(1).to({scaleX:1.2761,scaleY:1.2761,rotation:29.3712,x:229.7582,y:260.0939},0).wait(1).to({rotation:29.8269,x:229.7595,y:260.122},0).wait(1).to({rotation:30.3243,x:229.7608,y:260.1527},0).wait(1).to({rotation:30.8665,x:229.7624,y:260.1861},0).wait(1).to({rotation:31.4566,x:229.764,y:260.2225},0).wait(1).to({rotation:32.0983,x:229.7659,y:260.262},0).wait(1).to({rotation:32.7956,x:229.7679,y:260.3051},0).wait(1).to({scaleX:1.2762,scaleY:1.2762,rotation:33.5527,x:229.7702,y:260.3518},0).wait(1).to({scaleX:1.2761,scaleY:1.2761,rotation:34.3747,x:229.7727,y:260.4026},0).wait(1).to({scaleX:1.2762,scaleY:1.2762,rotation:35.2668,x:229.7754,y:260.4577},0).wait(1).to({scaleX:1.2761,scaleY:1.2761,rotation:36.235,x:229.7784,y:260.5176},0).wait(1).to({rotation:37.2857,x:229.7818,y:260.5826},0).wait(1).to({rotation:38.426,x:229.7855,y:260.6533},0).wait(1).to({rotation:39.6635,x:229.7897,y:260.73},0).wait(1).to({rotation:41.0061,x:229.7942,y:260.8133},0).wait(1).to({rotation:42.462,x:229.7993,y:260.9038},0).wait(1).to({rotation:44.0391,x:229.805,y:261.0019},0).wait(1).to({rotation:45.7445,x:229.8113,y:261.1082},0).wait(1).to({rotation:47.5832,x:229.8182,y:261.223},0).wait(1).to({rotation:49.557,x:229.8258,y:261.3464},0).wait(1).to({rotation:51.6626,x:229.8342,y:261.4782},0).wait(1).to({rotation:53.8894,x:229.8433,y:261.618},0).wait(1).to({regX:0.2,regY:-0.1,rotation:56.218,x:230.05,y:261.95},0).wait(1).to({regX:0,regY:0,rotation:54.9706,x:230.2128,y:261.7214},0).wait(1).to({rotation:53.7062,x:230.6314,y:261.6418},0).wait(1).to({rotation:52.4337,x:231.0527,y:261.5618},0).wait(1).to({rotation:51.1623,x:231.4738,y:261.482},0).wait(1).to({rotation:49.9014,x:231.8915,y:261.4029},0).wait(1).to({rotation:48.6598,x:232.3029,y:261.3251},0).wait(1).to({rotation:47.4453,x:232.7054,y:261.249},0).wait(1).to({rotation:46.2648,x:233.0968,y:261.1751},0).wait(1).to({rotation:45.1233,x:233.4752,y:261.1037},0).wait(1).to({rotation:44.025,x:233.8395,y:261.0351},0).wait(1).to({rotation:42.9724,x:234.1887,y:260.9694},0).wait(1).to({rotation:41.9669,x:234.5223,y:260.9067},0).wait(1).to({rotation:41.0091,x:234.8402,y:260.8469},0).wait(1).to({rotation:40.0986,x:235.1425,y:260.7902},0).wait(1).to({rotation:39.2345,x:235.4293,y:260.7364},0).wait(1).to({rotation:38.4156,x:235.7013,y:260.6854},0).wait(1).to({rotation:37.6402,x:235.9588,y:260.6371},0).wait(1).to({rotation:36.9066,x:236.2025,y:260.5915},0).wait(1).to({rotation:36.2129,x:236.433,y:260.5483},0).wait(1).to({rotation:35.5571,x:236.6509,y:260.5075},0).wait(1).to({rotation:34.9375,x:236.8568,y:260.469},0).wait(1).to({rotation:34.3521,x:237.0514,y:260.4327},0).wait(1).to({rotation:33.7991,x:237.2352,y:260.3983},0).wait(1).to({rotation:33.2768,x:237.4089,y:260.3659},0).wait(1).to({rotation:32.7835,x:237.5729,y:260.3352},0).wait(1).to({rotation:32.3178,x:237.7278,y:260.3063},0).wait(1).to({rotation:31.8782,x:237.874,y:260.279},0).wait(1).to({rotation:31.4632,x:238.012,y:260.2533},0).wait(1).to({rotation:31.0716,x:238.1422,y:260.229},0).wait(1).to({rotation:30.7023,x:238.2651,y:260.2061},0).wait(1).to({rotation:30.354,x:238.381,y:260.1845},0).wait(1).to({rotation:30.0258,x:238.4902,y:260.1641},0).wait(1).to({rotation:29.7166,x:238.5931,y:260.1449},0).wait(1).to({rotation:29.4255,x:238.6899,y:260.1269},0).wait(1).to({rotation:29.1517,x:238.7811,y:260.1099},0).wait(1).to({rotation:28.8943,x:238.8667,y:260.094},0).wait(1).to({rotation:28.6526,x:238.9472,y:260.079},0).wait(1).to({rotation:28.4259,x:239.0226,y:260.0649},0).wait(1).to({rotation:28.2135,x:239.0933,y:260.0518},0).wait(1).to({rotation:28.0149,x:239.1594,y:260.0394},0).wait(1).to({rotation:27.8293,x:239.2212,y:260.0279},0).wait(1).to({rotation:27.6563,x:239.2788,y:260.0172},0).wait(1).to({rotation:27.4953,x:239.3324,y:260.0072},0).wait(1).to({rotation:27.3459,x:239.3821,y:259.998},0).wait(1).to({rotation:27.2076,x:239.4282,y:259.9894},0).wait(1).to({rotation:27.08,x:239.4707,y:259.9815},0).wait(1).to({rotation:26.9626,x:239.5098,y:259.9742},0).wait(1).to({rotation:26.8551,x:239.5456,y:259.9676},0).wait(1).to({rotation:26.7571,x:239.5782,y:259.9615},0).wait(1).to({rotation:26.6683,x:239.6078,y:259.956},0).wait(1).to({rotation:26.5883,x:239.6344,y:259.951},0).wait(1).to({rotation:26.5168,x:239.6582,y:259.9466},0).wait(1).to({rotation:26.4535,x:239.6793,y:259.9427},0).wait(1).to({rotation:26.3982,x:239.6977,y:259.9393},0).wait(1).to({rotation:26.3506,x:239.7135,y:259.9363},0).wait(1).to({rotation:26.3105,x:239.7269,y:259.9338},0).wait(1).to({rotation:26.2775,x:239.7379,y:259.9318},0).wait(1).to({rotation:26.2515,x:239.7466,y:259.9302},0).wait(1).to({rotation:26.2322,x:239.753,y:259.929},0).wait(1).to({regX:0.2,regY:-0.1,rotation:26.2194,x:240,y:259.9},0).wait(1));

	// FlashAICB
	this.instance_21 = new lib.Tween6("synched",0);
	this.instance_21.setTransform(140.6,-83);
	this.instance_21._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_21).wait(121).to({_off:false},0).to({x:141,y:206},18,cjs.Ease.cubicInOut).wait(38).to({startPosition:0},0).to({x:-186},13,cjs.Ease.cubicInOut).wait(145));

	// Zackeli
	this.instance_22 = new lib.Zackeli();
	this.instance_22.setTransform(70,3.95,1.8884,1.8884);
	this.instance_22._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_22).wait(117).to({_off:false},0).to({y:176},23,cjs.Ease.cubicInOut).wait(31).to({x:-256},16,cjs.Ease.cubicInOut).wait(148));

	// Symbol_4
	this.instance_23 = new lib.Symbol4();
	this.instance_23.setTransform(359.65,84.45,3.437,3.437,-0.9857);
	this.instance_23._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_23).wait(108).to({_off:false},0).to({scaleX:3.4367,scaleY:3.4367,rotation:31.9719,x:217.6,y:95.3},26,cjs.Ease.cubicInOut).to({scaleX:3.437,scaleY:3.437,rotation:-24.0288,x:158.95,y:95.6},27,cjs.Ease.cubicInOut).to({regX:0.1,regY:-0.1,scaleX:3.4369,scaleY:3.4369,rotation:20.9716,x:190,y:97.85},13,cjs.Ease.cubicInOut).to({rotation:-1.0188,x:-160.1,y:99.8},20,cjs.Ease.cubicInOut).wait(141));

	// FlashAICB
	this.instance_24 = new lib.Tween4("synched",0);
	this.instance_24.setTransform(141,340.05);
	this.instance_24._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_24).wait(42).to({_off:false},0).to({y:126.05},30,cjs.Ease.cubicInOut).wait(39).to({startPosition:0},0).to({x:-184},22,cjs.Ease.cubicInOut).wait(202));

	// frwa
	this.instance_25 = new lib.frwa();
	this.instance_25.setTransform(386.45,54.35,2.1881,2.1881,-41.6955,0,0,0.1,0);
	this.instance_25._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_25).wait(59).to({_off:false},0).to({scaleX:2.1882,scaleY:2.1882,rotation:-71.6943,x:110,y:44},16,cjs.Ease.cubicInOut).to({scaleX:2.188,scaleY:2.188,rotation:-47.6945,x:85.55,y:49.85},21,cjs.Ease.cubicInOut).to({scaleX:2.1881,scaleY:2.1881,rotation:-71.6939,x:79,y:46},18,cjs.Ease.cubicInOut).to({regX:0,rotation:-41.6951,x:-138.15,y:37},21,cjs.Ease.cubicInOut).wait(200));

	// Welleli
	this.instance_26 = new lib.Welleli();
	this.instance_26.setTransform(580.3,197,3.4729,3.4729,0,0,0,0.1,0);
	this.instance_26._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_26).wait(39).to({_off:false},0).to({x:248.85,y:220},28,cjs.Ease.cubicInOut).wait(44).to({x:-212.5,y:221.7},25,cjs.Ease.cubicInOut).wait(141).to({regY:0.1,scaleX:1,scaleY:1,x:-212.6,y:221.85},0).wait(58));

	// FlashAICB
	this.instance_27 = new lib.Tween1("synched",0);
	this.instance_27.setTransform(-146,44.1);

	this.instance_28 = new lib.Tween2("synched",0);
	this.instance_28.setTransform(141,44);
	this.instance_28._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_27).to({_off:true,x:141,y:44},8,cjs.Ease.cubicInOut).wait(327));
	this.timeline.addTween(cjs.Tween.get(this.instance_28).to({_off:false},8,cjs.Ease.cubicInOut).wait(43).to({startPosition:0},0).to({x:-199},16,cjs.Ease.cubicInOut).wait(268));

	// Stift
	this.instance_29 = new lib.Symbol1();
	this.instance_29.setTransform(90,210);

	this.timeline.addTween(cjs.Tween.get(this.instance_29).to({rotation:74.9998,x:100.95,y:151.8},24,cjs.Ease.cubicInOut).to({rotation:0,x:70,y:170},27,cjs.Ease.cubicInOut).to({rotation:59.9996,x:-140,y:148.7},16,cjs.Ease.cubicInOut).wait(268));

	// Schoko
	this.instance_30 = new lib.Symbol2();
	this.instance_30.setTransform(202.65,120);

	this.timeline.addTween(cjs.Tween.get(this.instance_30).to({rotation:-45,x:222.65,y:189.95},24,cjs.Ease.cubicInOut).to({regX:0.1,regY:0.1,rotation:14.9996,x:190,y:150.05},27,cjs.Ease.cubicInOut).to({scaleX:0.9999,scaleY:0.9999,rotation:-53.4823,x:-80,y:200.9},26,cjs.Ease.cubicInOut).wait(200).to({scaleX:1,scaleY:1,rotation:0,x:-79.95,y:200.85},0).wait(58));

	// FlashAICB
	this.instance_31 = new lib.Punkte();
	this.instance_31.setTransform(10.45,50.75,3.5744,3.5744,0,0,0,44.7,37.8);
	this.instance_31.alpha = 0.6016;

	this.timeline.addTween(cjs.Tween.get(this.instance_31).wait(51).to({x:-161.9,y:51.2},16,cjs.Ease.cubicInOut).wait(268));

	this._renderFirstFrame();

}).prototype = p = new lib.AnMovieClip();
p.nominalBounds = new cjs.Rectangle(-1138.1,-233.7,2719.3999999999996,852.2);
// library properties:
lib.properties = {
	id: '587F5E10EE5D45449A3AE90A271ECF89',
	width: 300,
	height: 250,
	fps: 24,
	color: "#9AB0C7",
	opacity: 1.00,
	manifest: [],
	preloads: []
};



// bootstrap callback support:

(lib.Stage = function(canvas) {
	createjs.Stage.call(this, canvas);
}).prototype = p = new createjs.Stage();

p.setAutoPlay = function(autoPlay) {
	this.tickEnabled = autoPlay;
}
p.play = function() { this.tickEnabled = true; this.getChildAt(0).gotoAndPlay(this.getTimelinePosition()) }
p.stop = function(ms) { if(ms) this.seek(ms); this.tickEnabled = false; }
p.seek = function(ms) { this.tickEnabled = true; this.getChildAt(0).gotoAndStop(lib.properties.fps * ms / 1000); }
p.getDuration = function() { return this.getChildAt(0).totalFrames / lib.properties.fps * 1000; }

p.getTimelinePosition = function() { return this.getChildAt(0).currentFrame / lib.properties.fps * 1000; }

an.bootcompsLoaded = an.bootcompsLoaded || [];
if(!an.bootstrapListeners) {
	an.bootstrapListeners=[];
}

an.bootstrapCallback=function(fnCallback) {
	an.bootstrapListeners.push(fnCallback);
	if(an.bootcompsLoaded.length > 0) {
		for(var i=0; i<an.bootcompsLoaded.length; ++i) {
			fnCallback(an.bootcompsLoaded[i]);
		}
	}
};

an.compositions = an.compositions || {};
an.compositions['587F5E10EE5D45449A3AE90A271ECF89'] = {
	getStage: function() { return exportRoot.stage; },
	getLibrary: function() { return lib; },
	getSpriteSheet: function() { return ss; },
	getImages: function() { return img; }
};

an.compositionLoaded = function(id) {
	an.bootcompsLoaded.push(id);
	for(var j=0; j<an.bootstrapListeners.length; j++) {
		an.bootstrapListeners[j](id);
	}
}

an.getComposition = function(id) {
	return an.compositions[id];
}


an.makeResponsive = function(isResp, respDim, isScale, scaleType, domContainers) {		
	var lastW, lastH, lastS=1;		
	window.addEventListener('resize', resizeCanvas);		
	resizeCanvas();		
	function resizeCanvas() {			
		var w = lib.properties.width, h = lib.properties.height;			
		var iw = window.innerWidth, ih=window.innerHeight;			
		var pRatio = window.devicePixelRatio || 1, xRatio=iw/w, yRatio=ih/h, sRatio=1;			
		if(isResp) {                
			if((respDim=='width'&&lastW==iw) || (respDim=='height'&&lastH==ih)) {                    
				sRatio = lastS;                
			}				
			else if(!isScale) {					
				if(iw<w || ih<h)						
					sRatio = Math.min(xRatio, yRatio);				
			}				
			else if(scaleType==1) {					
				sRatio = Math.min(xRatio, yRatio);				
			}				
			else if(scaleType==2) {					
				sRatio = Math.max(xRatio, yRatio);				
			}			
		}
		domContainers[0].width = w * pRatio * sRatio;			
		domContainers[0].height = h * pRatio * sRatio;
		domContainers.forEach(function(container) {				
			container.style.width = w * sRatio + 'px';				
			container.style.height = h * sRatio + 'px';			
		});
		stage.scaleX = pRatio*sRatio;			
		stage.scaleY = pRatio*sRatio;
		lastW = iw; lastH = ih; lastS = sRatio;            
		stage.tickOnUpdate = false;            
		stage.update();            
		stage.tickOnUpdate = true;		
	}
}
an.handleSoundStreamOnTick = function(event) {
	if(!event.paused){
		var stageChild = stage.getChildAt(0);
		if(!stageChild.paused || stageChild.ignorePause){
			stageChild.syncStreamSounds();
		}
	}
}
an.handleFilterCache = function(event) {
	if(!event.paused){
		var target = event.target;
		if(target){
			if(target.filterCacheList){
				for(var index = 0; index < target.filterCacheList.length ; index++){
					var cacheInst = target.filterCacheList[index];
					if((cacheInst.startFrame <= target.currentFrame) && (target.currentFrame <= cacheInst.endFrame)){
						cacheInst.instance.cache(cacheInst.x, cacheInst.y, cacheInst.w, cacheInst.h);
					}
				}
			}
		}
	}
}


})(createjs = createjs||{}, AdobeAn = AdobeAn||{});
var createjs, AdobeAn;
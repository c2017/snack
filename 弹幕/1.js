/*
制作一个弹幕demo

@param 参数是一个对象
@param.box  显示弹幕的盒子选择器
@param.input  弹幕的输入框选择器
@param.add  弹幕添加按钮选择器
@param.clear 弹幕清除按钮选择器

 */
function Danmu(param){
	
	this.box=this.getDom(param.box);
	this.input=this.getDom(param.input);
	this.add=this.getDom(param.add);
	this.clear=this.getDom(param.clear);
	this.lists=this.listsF();
	this.height=param.height?param.height:this.getHeight();
	this.addflag=false;
	this.windowflag=false;

	this.start();
}

Danmu.prototype={

	// 获取弹幕父盒子
	getDom:function(selector){
		return document.querySelector(selector);
	},

	//开始
	start:function(){
		this.animation();
		this.inputF(); // 设置输入框方法
		this.addF();  // 添加弹幕
		this.clearF(); // 清除弹幕

		var that=this;
		window.onfocus=function(){
			if(that.windowflag){
				that.box.innerHTML="";
				that.windowflag=false;
			}
		}
		window.onblur=function(){
			that.windowflag=true;
		}

	},

	// 获取弹幕盒子的高度
	getHeight:function(){
		return parseInt(getComputedStyle(this.box,null)["height"]);
	},
	// 初始化弹幕
	listsF:function(){
		return ["aaaaa","bbbbb","ccccc","ddddd"];
	},
	// 清除弹幕
	clearF:function(){
		var that=this;
		this.clear.onclick=function(){
			that.lists=[];
			that.box.innerHTML="";
		}
	},

	// 添加弹幕
	addF:function(){
		var that=this;
		this.add.onclick=function(){
			that.lists.push(that.input.value);
			that.input.value="";
			that.addflag=true;
		}
	},

	addList:function(){
		this.lists.push(this.input.value);
		this.input.value="";
		this.addflag=true;
	},

	// 获取随机颜色
	randomColor:function(){
		var color="#";
		var str="abcdef012456789";
		while(color.length<7){
			color+=str[Math.floor(Math.random()*str.length)];
		}
		return color;
	},

	// 每一个span动画结束后被清除
	stop:function(dom){
		var that=this;
		dom.addEventListener("webkitAnimationEnd",function(){
			that.box.removeChild(dom);
		});
	},

	// 弹幕效果动画
	animation:function(){
		var that=this;
		setInterval(function(){
			if(that.lists.length<1){
				return;
			}
			var nub=that.addflag?that.lists.length-1:Math.floor(Math.random()*that.lists.length);
			that.addflag=false;
			var text=that.lists[nub];
			var span_top=Math.floor(Math.random()*parseInt(that.height/40))*40;
			var span=document.createElement("span");
			span.innerText=text;
			span.style.top=span_top+"px";
			span.style.color=that.randomColor();
			that.box.appendChild(span);
			// span.style.animation="spana 8s linear";
			that.stop(span);
		},1800);
	},

	// 输入框
	inputF:function(){
		var that=this;
		this.input.onfocus=function(){
			document.onkeyup=function(e){
				if(e.keyCode==13){
					that.addList();
					that.input.blur();
				}
			}
		}
		this.input.onblur=function(){
			document.onkeyup=null;
		}
	},


}
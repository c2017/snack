/**
 * Created by lenovo on 2017/2/24.
 */

/*
 * @param url (string) 操作上传图片的文件的地址
 *        currentObj （string[selector],obj）  文件域
 *        imgObj （string[selector],obj）  缩略图
 * @attr
 *
 * */
function Upload(url,currentObj,progressObj,imgObj){
    if(!url){
        alert("请传入正确的地址");
        return;
    }

    this.url=url;

    currentObj=currentObj||{};
    if(currentObj.nodeType=="INPUT"){
        this.currentObj=currentObj;
    }else if(typeof currentObj=="string"){
        this.currentObj=document.querySelector(currentObj);
    }

    progressObj=progressObj||{};
    if(progressObj.nodeType=="INPUT"){
        this.progressObj=progressObj;
    }else if(typeof progressObj=="string"){
        this.progressObj=document.querySelector(progressObj);
    }

    imgObj=imgObj||{};
    if(imgObj.nodeType=="INPUT"){
        this.imgObj=imgObj;
    }else if(typeof imgObj=="string"){
        this.imgObj=document.querySelector(imgObj);
    }

    this.size=1024*1024*3;
    this.type=["jpg","jpeg","png","gif"];
    this.uploadName="file";
    this.uploadStart=function(){};
}

Upload.prototype={
    up:function(callback){
        this.callback=callback||function(){};
        this.getCon();
    },
    getCon:function(){
        var that=this;
        this.currentObj.onchange=function(){
            that.data=this.files[0];
            var read=new FileReader();
            read.onload=function(e){
                that.imgObj.src=e.target.result;
            }
            read.readAsDataURL(that.data);

            if(that.check()){
                that.upfile();
            }
        };
    },
    check:function(){
        let size=this.data["size"];
        if(size>this.size){
            alert("文件太大");
            return false;
        }
        let extname=this.data["name"].substr(this.data["name"].lastIndexOf(".")+1).toLowerCase();

        let flag=false;
        for(let i=0;i<this.type.length;i++){
            if(extname==this.type[i]){
                flag=true;
                break;
            }
        }

        if(!flag){
            alert("文件格式错误");
            return false;
        }

        return true;
    },
    upfile:function(){
        var that=this;
        let ajax=new XMLHttpRequest();
        ajax.open("post",this.url);
        let form=new FormData();
        form.append(this.uploadName,this.data);
        ajax.upload.onloadstart=function(){
            that.uploadStart();
        };
        ajax.upload.onprogress=function(e){
            let scale=e.loaded/e.total*100;
            that.progressObj.style.width=scale+"%";
        };

        ajax.onload=function(){

            that.callback(ajax.response);
        };

        ajax.send(form);
    }
}


let boothApplyApp;
class BoothApplyApp {

	constructor(){
		this.canvas = document.querySelector("#map");
		this.ctx = this.canvas.getContext("2d");
		this.width = this.canvas.width;
		this.height = this.canvas.height;
		this.size = this.width/10;
		this.userColor = randomRGBColor();
		this.userType = type;
		this.init();
	}

	init(){
		this.mapLoading();
		this.addEvent();
	}

	addEvent(){
		this.canvas.addEventListener("click",this.canvasClick);
	}

	canvasClick = e =>{

		let x = Math.floor(e.offsetX/this.size);
		let y = Math.floor(e.offsetY/this.size);
		let unreachable = 10-type;
		if(x >= unreachable){
			alert('선택할 수 없는 위치입니다.');
			return;
		}
		this.mapLoading();
		let txt = [];
		for(let i = 0; i <= type; i++){
			this.fillRect(x+i,y,this.userColor);
			txt.push(`(${x+i+1},${y+1})`);
		}
		info_position.value = `${x+1},${y+1}`;
		document.querySelector("#info_locate").value = txt.join(',');
	}

	mapLoading(){
		this.ctx.clearRect(0,0,this.width,this.height);
		for(let y = 0; y < this.width; y++){
			for(let x = 0; x < this.height; x++){
				this.strokeRect(x,y);
			}
		}
	}

	strokeRect(x,y,color = "#a7a7a7"){
		this.ctx.strokeStyle = color;
		this.ctx.strokeRect(x * this.size, y * this.size, this.size,this.size);;
	}

	fillRect(x,y,color = "#a7a7a7"){
		this.ctx.fillStyle = color;
		this.ctx.fillRect(x * this.size, y * this.size, this.size,this.size);;
	}

	apply_submit(){
		if(!this.apply_validate()) return;
		let data = {};
		let age = Array.from(info_age.querySelectorAll("option")).filter(x=>{return x.selected}).map(a=>{return a.value*1});

		data.name = info_name.value;
		data.price = info_price.value;
		data.position = info_position.value;
		data.gender = info_gender.value;
		data.type = type;
		data.age = JSON.stringify(age,null,0);
		
		$.ajax({
			data:data,
			url:"/booth/apply",
			method:"POST",
			success : this.apply_result
		});
	}

	apply_result = (e) => {
		let result = JSON.parse(e).result;
		if(!result) alert("다른 부스와 겹치게 생성할 수 없습니다.");
		else {
			$(".booth_list_popup").fadeIn();
		}
	}

	apply_validate(){
		let name = info_name.value;
		let price = info_price.value;
		let position = info_position.value;
		let gender = info_gender.value;
		let age = Array.from(info_age.querySelectorAll("option")).filter(x=>{return x.selected}).map(a=>{return a.value*1});

		if(name.trim() == ""){
			alert("이름이 비어있읍니다.");
			return false;
		}
		if(price.trim() == ""){
			alert("이용료가 비어있읍니다.");
			return false;
		}
		if(position.trim() == ""){
			alert("위치를 선태케주세요.");
			return false;
		}
		if(age.length <= 0){
			alert("추천 연령대를 선태케주세요.");
			return false;
		}
		return true;
	}


}


window.addEventListener("load",()=>{

	boothApplyApp = new BoothApplyApp();

});

class Booth {
	constructor(lv,name,position,price){
		this.lv = lv;
		this.name = name;
		this.position = position;
		this.price = price;
		this.postList = [];
		for(let i = 0; i <= this.lv; i++){
			let x = this.position.split(",")[0]*1;
			let y = this.position.split(",")[1]*1;
			this.postList.push([x+i,y]);
		}
		this.backColor = randomRGBColor();
		this.fontColor = reversedRGBColor(this.backColor);
	}
}

function randomRGBColor(){
	return `rgb(${Math.floor(Math.random()*256)},${Math.floor(Math.random()*256)},${Math.floor(Math.random()*256)})`;
	// return `rgb(${Math.floor(Math.random()*56+200)},${Math.floor(Math.random()*56+200)},${Math.floor(Math.random()*56+200)})`;
}

function reversedRGBColor(rgb){
	// let colors = rgb.split(",").map(x=> 255 - x.replace(/[^\d+$]/g,"")*1);
	// return `rgb(${colors[0]},${colors[1]},${colors[2]})`;
	return `rgb(0,0,0)`;
}

function apply_submit(){
	boothApplyApp.apply_submit();
	return false;
}

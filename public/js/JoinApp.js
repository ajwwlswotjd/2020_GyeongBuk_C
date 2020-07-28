let joinApp = null;

class JoinApp {
	constructor(){
		this.init();
	}

	init(){
		this.addEvent();
	}

	addEvent(){
		$(".join_btn").on("click", this.btnClick);
	}

	btnClick = e => {
		let target = e.target.dataset.target;
		$(".join_btn").remove();
		$(`#${target}`).fadeIn();
	}
}

window.addEventListener("load",()=>{
	joinApp = new JoinApp();
});

function common_join(){
	return true;
}
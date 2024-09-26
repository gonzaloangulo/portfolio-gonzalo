const logomenu = document.querySelector('.logomenu'); 
const menu = document.querySelector('.menu_navegacion'); 

console.log(logomenu);
console.log(menu);

logomenu.addEventListener('click', ()=>{
	menu.classList.toggle("spread");
})

window.addEventListener('click', e=>{
	if(menu.classList.contains('spread')
		&& e.target != menu && e.target != logomenu	){

		menu.classList.toggle("spread");
	}
})